import { NextResponse } from "next/server";
import { getAuthFromCookies } from "@/lib/request-auth";

export async function requireAdmin() {
  const auth = await getAuthFromCookies();
  if (!auth) {
    return { ok: false as const, response: NextResponse.json({ error: "Unauthorized" }, { status: 401 }) };
  }

  if (auth.role !== "admin") {
    return { ok: false as const, response: NextResponse.json({ error: "Forbidden" }, { status: 403 }) };
  }

  return { ok: true as const, auth };
}
