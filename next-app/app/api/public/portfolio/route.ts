import { NextResponse } from "next/server";
import { connectMongo } from "@/lib/mongodb";
import { PortfolioModel } from "@/models/Portfolio";

export async function GET() {
  await connectMongo();
  const items = await PortfolioModel.find({ status: "active" })
    .sort({ updatedAt: -1, createdAt: -1 })
    .limit(100)
    .lean();

  return NextResponse.json({ items });
}
