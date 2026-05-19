import { jwtVerify } from "jose";

export type EdgeAuthPayload = {
  sub: string;
  role: "admin" | "user";
  email?: string;
  phone?: string;
  name?: string;
};

function getSecretKey() {
  const secret = process.env.AUTH_JWT_SECRET;
  if (!secret) {
    throw new Error("Missing AUTH_JWT_SECRET environment variable");
  }

  return new TextEncoder().encode(secret);
}

export async function verifyAccessTokenEdge(token: string) {
  const { payload } = await jwtVerify(token, getSecretKey());
  return payload as unknown as EdgeAuthPayload;
}
