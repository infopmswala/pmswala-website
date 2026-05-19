import { NextResponse } from "next/server";
import mysql from "mysql2/promise";
import { requireAdmin } from "@/lib/admin-guard";
import { connectMongo } from "@/lib/mongodb";
import { UserModel } from "@/models/User";
import { PortfolioModel } from "@/models/Portfolio";
import { PaymentTransactionModel } from "@/models/PaymentTransaction";
import { WithdrawalRequestModel } from "@/models/WithdrawalRequest";
import { PageModel } from "@/models/Page";

function diffIds(sqlIds: number[], mongoIds: number[]) {
  const sqlSet = new Set(sqlIds);
  const mongoSet = new Set(mongoIds);

  const missingInMongo = sqlIds.filter((id) => !mongoSet.has(id));
  const extraInMongo = mongoIds.filter((id) => !sqlSet.has(id));

  return {
    missingInMongoCount: missingInMongo.length,
    extraInMongoCount: extraInMongo.length,
    missingInMongoSample: missingInMongo.slice(0, 50),
    extraInMongoSample: extraInMongo.slice(0, 50)
  };
}

async function getSqlIds(sql: mysql.Connection, query: string, field = "id") {
  const [rows] = await sql.query<Array<Record<string, unknown>>>(query);
  return rows.map((r) => Number(r[field] || 0)).filter((v) => Number.isFinite(v) && v > 0);
}

export async function GET() {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

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

  const [
    usersSql,
    portfolioSql,
    txSql,
    withdrawalsSql,
    servicesSql,
    blogsSql,
    infoSql
  ] = await Promise.all([
    getSqlIds(sql, "SELECT id FROM td_users"),
    getSqlIds(sql, "SELECT id FROM td_portfolio"),
    getSqlIds(sql, "SELECT id FROM td_payment_transactions"),
    getSqlIds(sql, "SELECT id FROM td_withdrawal_request"),
    getSqlIds(sql, "SELECT id FROM td_services"),
    getSqlIds(sql, "SELECT id FROM td_blog"),
    getSqlIds(sql, "SELECT id FROM td_information")
  ]);

  await sql.end();
  await connectMongo();

  const [
    usersMongo,
    portfolioMongo,
    txMongo,
    withdrawalsMongo,
    serviceMongo,
    blogMongo,
    infoMongo
  ] = await Promise.all([
    UserModel.find({}).select("legacyId").lean(),
    PortfolioModel.find({}).select("legacyId").lean(),
    PaymentTransactionModel.find({}).select("legacyId").lean(),
    WithdrawalRequestModel.find({}).select("legacyId").lean(),
    PageModel.find({ source: "service" }).select("legacyId").lean(),
    PageModel.find({ source: "blog" }).select("legacyId").lean(),
    PageModel.find({ source: "information" }).select("legacyId").lean()
  ]);

  const usersMongoIds = usersMongo.map((x) => Number(x.legacyId || 0)).filter((v) => v > 0);
  const portfolioMongoIds = portfolioMongo.map((x) => Number(x.legacyId || 0)).filter((v) => v > 0);
  const txMongoIds = txMongo.map((x) => Number(x.legacyId || 0)).filter((v) => v > 0);
  const withdrawalMongoIds = withdrawalsMongo
    .map((x) => Number(x.legacyId || 0))
    .filter((v) => v > 0);
  const serviceMongoIds = serviceMongo.map((x) => Number(x.legacyId || 0)).filter((v) => v > 0);
  const blogMongoIds = blogMongo.map((x) => Number(x.legacyId || 0)).filter((v) => v > 0);
  const infoMongoIds = infoMongo.map((x) => Number(x.legacyId || 0)).filter((v) => v > 0);

  const report = {
    users: diffIds(usersSql, usersMongoIds),
    portfolios: diffIds(portfolioSql, portfolioMongoIds),
    paymentTransactions: diffIds(txSql, txMongoIds),
    withdrawals: diffIds(withdrawalsSql, withdrawalMongoIds),
    pagesService: diffIds(servicesSql, serviceMongoIds),
    pagesBlog: diffIds(blogsSql, blogMongoIds),
    pagesInformation: diffIds(infoSql, infoMongoIds)
  };

  return NextResponse.json({
    generatedAt: new Date().toISOString(),
    report
  });
}
