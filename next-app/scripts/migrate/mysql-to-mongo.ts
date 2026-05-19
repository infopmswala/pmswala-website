/* eslint-disable no-console */
import process from "node:process";
import mysql from "mysql2/promise";
import { connectMongo } from "../../lib/mongodb";
import { UserModel } from "../../models/User";
import { PageModel } from "../../models/Page";
import { PortfolioModel } from "../../models/Portfolio";
import { PaymentTransactionModel } from "../../models/PaymentTransaction";
import { WithdrawalRequestModel } from "../../models/WithdrawalRequest";

const isDryRun = process.argv.includes("--dry-run");
const isRun = process.argv.includes("--run");

if (!isDryRun && !isRun) {
  console.error("Use --dry-run or --run");
  process.exit(1);
}

async function main() {
  const mysqlHost = process.env.LEGACY_MYSQL_HOST || "127.0.0.1";
  const mysqlPort = Number(process.env.LEGACY_MYSQL_PORT || "3306");
  const mysqlUser = process.env.LEGACY_MYSQL_USER || "root";
  const mysqlPassword = process.env.LEGACY_MYSQL_PASSWORD || "";
  const mysqlDatabase = process.env.LEGACY_MYSQL_DATABASE || "pmswala_db";

  console.log("Starting migration bootstrap...");
  console.log(`Mode: ${isDryRun ? "dry-run" : "run"}`);
  console.log(`Legacy MySQL: ${mysqlHost}:${mysqlPort}/${mysqlDatabase}`);

  const sql = await mysql.createConnection({
    host: mysqlHost,
    port: mysqlPort,
    user: mysqlUser,
    password: mysqlPassword,
    database: mysqlDatabase
  });

  const [users] = await sql.query(
    "SELECT id, user_id, name, email, phone, password, status, kyc_status FROM td_users"
  );

  const [services] = await sql.query(
    "SELECT id, service_title AS title, service_slug AS slug, service_short_description AS summary, service_description AS contentHtml, service_image AS image, status FROM td_services"
  );

  const [blogs] = await sql.query(
    "SELECT id, title, slug, short_description AS summary, description AS contentHtml, image, status FROM td_blog"
  );

  const [informationPages] = await sql.query(
    "SELECT id, information_title AS title, information_title_slug AS slug, information_description AS contentHtml, status FROM td_information"
  );

  const [portfolios] = await sql.query(
    "SELECT id, title, slug, short_description AS summary, description, minimum_investment AS minInvestment, expected_return AS expectedReturn, status FROM td_portfolio"
  );

  const [paymentTransactions] = await sql.query(
    "SELECT id, user_id, purchase, amount, period, interest, maturity_date, payment_status, created_at, updated_at FROM td_payment_transactions"
  );

  const [withdrawals] = await sql.query(
    "SELECT id, user_id, payment_id, amount, status, message, created_at, updated_at FROM td_withdrawal_request"
  );

  await sql.end();

  const usersRows = users as Array<Record<string, unknown>>;
  const servicesRows = services as Array<Record<string, unknown>>;
  const blogRows = blogs as Array<Record<string, unknown>>;
  const infoRows = informationPages as Array<Record<string, unknown>>;
  const portfolioRows = portfolios as Array<Record<string, unknown>>;
  const txRows = paymentTransactions as Array<Record<string, unknown>>;
  const withdrawalRows = withdrawals as Array<Record<string, unknown>>;

  console.log(`Fetched users: ${usersRows.length}`);
  console.log(`Fetched services: ${servicesRows.length}`);
  console.log(`Fetched blogs: ${blogRows.length}`);
  console.log(`Fetched info pages: ${infoRows.length}`);
  console.log(`Fetched portfolios: ${portfolioRows.length}`);
  console.log(`Fetched payment transactions: ${txRows.length}`);
  console.log(`Fetched withdrawal requests: ${withdrawalRows.length}`);

  if (isDryRun) {
    console.log("Dry run completed. No Mongo writes executed.");
    return;
  }

  await connectMongo();

  const userOps = usersRows.map((row) => ({
    updateOne: {
      filter: { legacyId: Number(row.id) },
      update: {
        $set: {
          legacyId: Number(row.id),
          userCode: String(row.user_id || ""),
          name: String(row.name || ""),
          email: String(row.email || "").toLowerCase(),
          phone: String(row.phone || ""),
          // Keep legacy hash temporarily. Force-reset flow will replace it with bcrypt/argon2.
          passwordHash: String(row.password || ""),
          status: String(row.status || "1") === "1" ? "active" : "inactive",
          kycStatus: String(row.kyc_status || "pending")
        }
      },
      upsert: true
    }
  }));

  if (userOps.length) {
    await UserModel.bulkWrite(userOps);
  }

  const pageDocs: Array<Record<string, unknown>> = [];

  for (const row of servicesRows) {
    pageDocs.push({
      legacyId: Number(row.id),
      source: "service",
      title: String(row.title || ""),
      slug: String(row.slug || ""),
      summary: String(row.summary || ""),
      contentHtml: String(row.contentHtml || ""),
      image: String(row.image || ""),
      status: String(row.status || "1") === "1" ? "active" : "inactive"
    });
  }

  for (const row of blogRows) {
    pageDocs.push({
      legacyId: Number(row.id),
      source: "blog",
      title: String(row.title || ""),
      slug: String(row.slug || ""),
      summary: String(row.summary || ""),
      contentHtml: String(row.contentHtml || ""),
      image: String(row.image || ""),
      status: String(row.status || "1") === "1" ? "active" : "inactive"
    });
  }

  for (const row of infoRows) {
    pageDocs.push({
      legacyId: Number(row.id),
      source: "information",
      title: String(row.title || ""),
      slug: String(row.slug || ""),
      summary: "",
      contentHtml: String(row.contentHtml || ""),
      image: "",
      status: String(row.status || "1") === "1" ? "active" : "inactive"
    });
  }

  const seenSlugs = new Set<string>();
  const pageOps = pageDocs.map((doc) => {
    let slug = String(doc.slug || "").trim().toLowerCase();
    if (!slug) {
      slug = `page-${doc.source}-${doc.legacyId}`;
    }

    if (seenSlugs.has(slug)) {
      slug = `${slug}-${doc.source}-${doc.legacyId}`;
    }
    seenSlugs.add(slug);

    return {
      updateOne: {
        filter: { source: doc.source, legacyId: doc.legacyId },
        update: {
          $set: {
            ...doc,
            slug
          }
        },
        upsert: true
      }
    };
  });

  if (pageOps.length) {
    await PageModel.bulkWrite(pageOps);
  }

  const seenPortfolioSlugs = new Set<string>();
  const portfolioOps = portfolioRows.map((row) => {
    let slug = String(row.slug || "").trim().toLowerCase();
    if (!slug) slug = `portfolio-${row.id}`;
    if (seenPortfolioSlugs.has(slug)) slug = `${slug}-${row.id}`;
    seenPortfolioSlugs.add(slug);

    return {
      updateOne: {
        filter: { legacyId: Number(row.id) },
        update: {
          $set: {
            legacyId: Number(row.id),
            title: String(row.title || ""),
            slug,
            summary: String(row.summary || ""),
            description: String(row.description || ""),
            minInvestment: Number(row.minInvestment || 0),
            expectedReturn: Number(row.expectedReturn || 0),
            status: String(row.status || "1") === "1" ? "active" : "inactive"
          }
        },
        upsert: true
      }
    };
  });

  if (portfolioOps.length) {
    await PortfolioModel.bulkWrite(portfolioOps);
  }

  const portfolioMap = new Map<number, { title: string; slug: string; minInvestment: number }>();
  for (const row of portfolioRows) {
    portfolioMap.set(Number(row.id), {
      title: String(row.title || ""),
      slug: String(row.slug || ""),
      minInvestment: Number(row.minInvestment || 0)
    });
  }

  const txOps = txRows.map((row) => {
    const portfolioId = Number(row.purchase || 0);
    const snap = portfolioMap.get(portfolioId) || { title: "", slug: "", minInvestment: 0 };
    const rawStatus = String(row.payment_status || "").toLowerCase();
    const paymentStatus = rawStatus === "1" || rawStatus === "success" || rawStatus === "completed"
      ? "completed"
      : rawStatus === "2" || rawStatus === "failed"
        ? "failed"
        : "pending";

    return {
      updateOne: {
        filter: { legacyId: Number(row.id) },
        update: {
          $set: {
            legacyId: Number(row.id),
            legacyUserId: Number(row.user_id || 0),
            legacyPortfolioId: portfolioId,
            amount: Number(row.amount || 0),
            period: String(row.period || ""),
            interest: Number(row.interest || 0),
            maturityDate: row.maturity_date ? new Date(String(row.maturity_date)) : undefined,
            paymentStatus,
            portfolioSnapshot: snap,
            createdAt: row.created_at ? new Date(String(row.created_at)) : undefined,
            updatedAt: row.updated_at ? new Date(String(row.updated_at)) : undefined
          }
        },
        upsert: true
      }
    };
  });

  if (txOps.length) {
    await PaymentTransactionModel.bulkWrite(txOps);
  }

  const withdrawalOps = withdrawalRows.map((row) => {
    const rawStatus = String(row.status || "").toLowerCase();
    const status = rawStatus === "1" || rawStatus === "approved"
      ? "approved"
      : rawStatus === "2" || rawStatus === "rejected"
        ? "rejected"
        : "pending";

    return {
      updateOne: {
        filter: { legacyId: Number(row.id) },
        update: {
          $set: {
            legacyId: Number(row.id),
            legacyUserId: Number(row.user_id || 0),
            legacyPaymentId: Number(row.payment_id || 0),
            amount: Number(row.amount || 0),
            status,
            message: String(row.message || ""),
            createdAt: row.created_at ? new Date(String(row.created_at)) : undefined,
            updatedAt: row.updated_at ? new Date(String(row.updated_at)) : undefined
          }
        },
        upsert: true
      }
    };
  });

  if (withdrawalOps.length) {
    await WithdrawalRequestModel.bulkWrite(withdrawalOps);
  }

  console.log(`Upserted users: ${userOps.length}`);
  console.log(`Upserted pages: ${pageOps.length}`);
  console.log(`Upserted portfolios: ${portfolioOps.length}`);
  console.log(`Upserted payment transactions: ${txOps.length}`);
  console.log(`Upserted withdrawal requests: ${withdrawalOps.length}`);

  console.log("Migration completed successfully.");
}

main().catch((err) => {
  console.error("Migration failed:", err);
  process.exit(1);
});
