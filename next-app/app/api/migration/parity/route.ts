import { NextResponse } from "next/server";
import mysql from "mysql2/promise";
import { connectMongo } from "@/lib/mongodb";
import { UserModel } from "@/models/User";
import { PageModel } from "@/models/Page";
import { PortfolioModel } from "@/models/Portfolio";
import { PaymentTransactionModel } from "@/models/PaymentTransaction";
import { WithdrawalRequestModel } from "@/models/WithdrawalRequest";

type CountRow = { total: number };

async function getCount(sql: mysql.Connection, query: string) {
  const [rows] = await sql.query(query);
  const first = (rows as CountRow[])[0];
  return Number(first?.total || 0);
}

export async function GET() {
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

  const usersSql = await getCount(sql, "SELECT COUNT(*) AS total FROM td_users");
  const servicesSql = await getCount(sql, "SELECT COUNT(*) AS total FROM td_services");
  const blogsSql = await getCount(sql, "SELECT COUNT(*) AS total FROM td_blog");
  const informationSql = await getCount(sql, "SELECT COUNT(*) AS total FROM td_information");
  const portfolioSql = await getCount(sql, "SELECT COUNT(*) AS total FROM td_portfolio");
  const txSql = await getCount(sql, "SELECT COUNT(*) AS total FROM td_payment_transactions");
  const withdrawalsSql = await getCount(sql, "SELECT COUNT(*) AS total FROM td_withdrawal_request");

  await sql.end();
  await connectMongo();

  const [
    usersMongo,
    pagesMongo,
    pagesServiceMongo,
    pagesBlogMongo,
    pagesInformationMongo,
    portfolioMongo,
    txMongo,
    withdrawalsMongo
  ] = await Promise.all([
    UserModel.countDocuments(),
    PageModel.countDocuments(),
    PageModel.countDocuments({ source: "service" }),
    PageModel.countDocuments({ source: "blog" }),
    PageModel.countDocuments({ source: "information" }),
    PortfolioModel.countDocuments(),
    PaymentTransactionModel.countDocuments(),
    WithdrawalRequestModel.countDocuments()
  ]);

  const checks = [
    { entity: "users", mysql: usersSql, mongo: usersMongo },
    {
      entity: "pages_total",
      mysql: servicesSql + blogsSql + informationSql,
      mongo: pagesMongo
    },
    { entity: "pages_service", mysql: servicesSql, mongo: pagesServiceMongo },
    { entity: "pages_blog", mysql: blogsSql, mongo: pagesBlogMongo },
    {
      entity: "pages_information",
      mysql: informationSql,
      mongo: pagesInformationMongo
    },
    { entity: "portfolios", mysql: portfolioSql, mongo: portfolioMongo },
    { entity: "payment_transactions", mysql: txSql, mongo: txMongo },
    { entity: "withdrawal_requests", mysql: withdrawalsSql, mongo: withdrawalsMongo }
  ].map((item) => ({
    ...item,
    delta: item.mongo - item.mysql,
    match: item.mongo === item.mysql
  }));

  return NextResponse.json({
    summary: {
      allMatch: checks.every((c) => c.match),
      generatedAt: new Date().toISOString()
    },
    checks
  });
}
