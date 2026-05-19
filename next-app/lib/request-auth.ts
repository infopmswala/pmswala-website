import { cookies } from "next/headers";
import { authCookies, verifyAccessToken, type AccessTokenPayload } from "@/lib/auth";

export async function getAuthFromCookies(): Promise<AccessTokenPayload | null> {
  const token = cookies().get(authCookies.accessToken)?.value;
  if (!token) return null;

  try {
    return await verifyAccessToken(token);
  } catch {
    return null;
  }
}
