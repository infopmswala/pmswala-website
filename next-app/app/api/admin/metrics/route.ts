import { NextResponse } from "next/server";
import { requireAdmin } from "@/lib/admin-guard";
import { connectMongo } from "@/lib/mongodb";
import { UserModel } from "@/models/User";
import { PortfolioModel } from "@/models/Portfolio";
import { PaymentTransactionModel } from "@/models/PaymentTransaction";
import { WithdrawalRequestModel } from "@/models/WithdrawalRequest";
import { ContactLeadModel } from "@/models/ContactLead";

export async function GET() {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  await connectMongo();

  const [
    totalUsers,
    activeUsers,
    totalPortfolios,
    totalTransactions,
    pendingTransactions,
    totalWithdrawals,
    pendingWithdrawals,
    contactLeads,
    txAmounts,
    withdrawalAmounts
  ] = await Promise.all([
    UserModel.countDocuments(),
    UserModel.countDocuments({ status: "active" }),
    PortfolioModel.countDocuments(),
    PaymentTransactionModel.countDocuments(),
    PaymentTransactionModel.countDocuments({ paymentStatus: "pending" }),
    WithdrawalRequestModel.countDocuments(),
    WithdrawalRequestModel.countDocuments({ status: "pending" }),
    ContactLeadModel.countDocuments(),
    PaymentTransactionModel.aggregate([
      { $group: { _id: null, total: { $sum: "$amount" } } }
    ]),
    WithdrawalRequestModel.aggregate([
      { $group: { _id: null, total: { $sum: "$amount" } } }
    ])
  ]);

  return NextResponse.json({
    users: { total: totalUsers, active: activeUsers },
    portfolios: { total: totalPortfolios },
    transactions: {
      total: totalTransactions,
      pending: pendingTransactions,
      totalAmount: txAmounts[0]?.total || 0
    },
    withdrawals: {
      total: totalWithdrawals,
      pending: pendingWithdrawals,
      totalAmount: withdrawalAmounts[0]?.total || 0
    },
    contactLeads: { total: contactLeads },
    generatedAt: new Date().toISOString()
  });
}
