import mysql from "mysql2/promise";
import { connectMongo } from "./mongodb";
import { UserModel } from "../models/User";
import { PageModel } from "../models/Page";
import { PortfolioModel } from "../models/Portfolio";
import { PaymentTransactionModel } from "../models/PaymentTransaction";
import { WithdrawalRequestModel } from "../models/WithdrawalRequest";
import { MigrationReportModel } from "../models/MigrationReport";

export type MigrationMode = "dry-run" | "run";

export type MigrationSummary = {
  mode: MigrationMode;
  mysql: {
    users: number;
    services: number;
    blogs: number;
    infoPages: number;
    portfolios: number;
    paymentTransactions: number;
    withdrawals: number;
  };
  mongoWrites: {
    users: number;
    pages: number;
    portfolios: number;
    paymentTransactions: number;
    withdrawals: number;
  };
  completedAt: string;
};

export async function runMigration(mode: MigrationMode): Promise<MigrationSummary> {
  const mysqlHost = process.env.LEGACY_MYSQL_HOST || "127.0.0.1";
  const mysqlPort = Number(process.env.LEGACY_MYSQL_PORT || "3306");
  const mysqlUser = process.env.LEGACY_MYSQL_USER || "root";
  const mysqlPassword = process.env.LEGACY_MYSQL_PASSWORD || "";
  const mysqlDatabase = process.env.LEGACY_MYSQL_DATABASE || "pmswala_db";

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

  if (mode === "dry-run") {
    const summary: MigrationSummary = {
      mode,
      mysql: {
        users: usersRows.length,
        services: servicesRows.length,
        blogs: blogRows.length,
        infoPages: infoRows.length,
        portfolios: portfolioRows.length,
        paymentTransactions: txRows.length,
        withdrawals: withdrawalRows.length
      },
      mongoWrites: {
        users: 0,
        pages: 0,
        portfolios: 0,
        paymentTransactions: 0,
        withdrawals: 0
      },
      completedAt: new Date().toISOString()
    };

    await connectMongo();
    await MigrationReportModel.create({ mode, summary, status: "success" });
    return summary;
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
          passwordHash: String(row.password || ""),
          role: "user",
          passwordResetRequired: true,
          status: String(row.status || "1") === "1" ? "active" : "inactive",
          kycStatus: String(row.kyc_status || "pending")
        }
      },
      upsert: true
    }
  }));
  if (userOps.length) await UserModel.bulkWrite(userOps);

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
    if (!slug) slug = `page-${doc.source}-${doc.legacyId}`;
    if (seenSlugs.has(slug)) slug = `${slug}-${doc.source}-${doc.legacyId}`;
    seenSlugs.add(slug);

    return {
      updateOne: {
        filter: { source: doc.source, legacyId: doc.legacyId },
        update: { $set: { ...doc, slug } },
        upsert: true
      }
    };
  });
  if (pageOps.length) await PageModel.bulkWrite(pageOps);

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
  if (portfolioOps.length) await PortfolioModel.bulkWrite(portfolioOps);

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
    const paymentStatus =
      rawStatus === "1" || rawStatus === "success" || rawStatus === "completed"
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
  if (txOps.length) await PaymentTransactionModel.bulkWrite(txOps);

  const withdrawalOps = withdrawalRows.map((row) => {
    const rawStatus = String(row.status || "").toLowerCase();
    const status =
      rawStatus === "1" || rawStatus === "approved"
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
  if (withdrawalOps.length) await WithdrawalRequestModel.bulkWrite(withdrawalOps);

  const summary: MigrationSummary = {
    mode,
    mysql: {
      users: usersRows.length,
      services: servicesRows.length,
      blogs: blogRows.length,
      infoPages: infoRows.length,
      portfolios: portfolioRows.length,
      paymentTransactions: txRows.length,
      withdrawals: withdrawalRows.length
    },
    mongoWrites: {
      users: userOps.length,
      pages: pageOps.length,
      portfolios: portfolioOps.length,
      paymentTransactions: txOps.length,
      withdrawals: withdrawalOps.length
    },
    completedAt: new Date().toISOString()
  };

  await MigrationReportModel.create({ mode, summary, status: "success" });
  return summary;
}
