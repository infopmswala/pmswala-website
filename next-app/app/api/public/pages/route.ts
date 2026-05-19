import { NextResponse } from "next/server";

export async function GET() {
  return NextResponse.json({
    items: [],
    message: "List endpoint placeholder"
  });
}
