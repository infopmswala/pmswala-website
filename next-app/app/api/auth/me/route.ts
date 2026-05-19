import { NextResponse } from "next/server";
import { getAuthFromCookies } from "@/lib/request-auth";

export async function GET() {
  const auth = await getAuthFromCookies();
  if (!auth) {
    return NextResponse.json({ authenticated: false }, { status: 401 });
  }

  return NextResponse.json({
    authenticated: true,
    user: {
      id: auth.sub,
      role: auth.role,
      name: auth.name,
      email: auth.email,
      phone: auth.phone
    }
  });
}
