/* eslint-disable no-console */
import process from "node:process";
import mysql from "mysql2/promise";
import { connectMongo } from "../../lib/mongodb";
import { UserModel } from "../../models/User";
import { PageModel } from "../../models/Page";

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

  await sql.end();

  const usersRows = users as Array<Record<string, unknown>>;
  const servicesRows = services as Array<Record<string, unknown>>;
  const blogRows = blogs as Array<Record<string, unknown>>;
  const infoRows = informationPages as Array<Record<string, unknown>>;

  console.log(`Fetched users: ${usersRows.length}`);
  console.log(`Fetched services: ${servicesRows.length}`);
  console.log(`Fetched blogs: ${blogRows.length}`);
  console.log(`Fetched info pages: ${infoRows.length}`);

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

  console.log(`Upserted users: ${userOps.length}`);
  console.log(`Upserted pages: ${pageOps.length}`);

  console.log("Migration completed successfully.");
}

main().catch((err) => {
  console.error("Migration failed:", err);
  process.exit(1);
});
