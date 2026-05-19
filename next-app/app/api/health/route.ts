import { NextResponse } from "next/server";

export async function GET() {
  return NextResponse.json({
    status: "ok",
    service: "pmswala-next-app",
    timestamp: new Date().toISOString()
  });
}
