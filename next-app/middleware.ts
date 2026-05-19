import { NextResponse, type NextRequest } from "next/server";
import { verifyAccessTokenEdge } from "@/lib/jwt-edge";

const ACCESS_COOKIE = "pmswala_access_token";

function redirectToLogin(req: NextRequest) {
  const loginUrl = new URL("/auth/login", req.url);
  loginUrl.searchParams.set("next", req.nextUrl.pathname);
  return NextResponse.redirect(loginUrl);
}

export async function middleware(req: NextRequest) {
  const { pathname } = req.nextUrl;

  const needsAdmin = pathname.startsWith("/admin") || pathname.startsWith("/api/admin");
  const needsUser = pathname.startsWith("/user") || pathname.startsWith("/api/user");

  if (!needsAdmin && !needsUser) {
    return NextResponse.next();
  }

  const token = req.cookies.get(ACCESS_COOKIE)?.value;
  if (!token) {
    return redirectToLogin(req);
  }

  try {
    const auth = await verifyAccessTokenEdge(token);

    if (needsAdmin && auth.role !== "admin") {
      return NextResponse.json({ error: "Forbidden" }, { status: 403 });
    }

    if (needsUser && auth.role !== "user" && auth.role !== "admin") {
      return NextResponse.json({ error: "Forbidden" }, { status: 403 });
    }

    return NextResponse.next();
  } catch {
    return redirectToLogin(req);
  }
}

export const config = {
  matcher: ["/admin/:path*", "/user/:path*", "/api/admin/:path*", "/api/user/:path*"]
};
