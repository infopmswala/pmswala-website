import { createHash } from "node:crypto";
import { SignJWT, jwtVerify } from "jose";
import bcrypt from "bcryptjs";

const ACCESS_COOKIE_NAME = "pmswala_access_token";
const RESET_TOKEN_PURPOSE = "password-reset";

function getSecretKey() {
  const secret = process.env.AUTH_JWT_SECRET;
  if (!secret) {
    throw new Error("Missing AUTH_JWT_SECRET environment variable");
  }
  return new TextEncoder().encode(secret);
}

export type AccessTokenPayload = {
  sub: string;
  role: "admin" | "user";
  email?: string;
  phone?: string;
  name?: string;
};

export async function signAccessToken(payload: AccessTokenPayload) {
  const expiresIn = process.env.AUTH_JWT_EXPIRES_IN || "2d";
  return new SignJWT(payload)
    .setProtectedHeader({ alg: "HS256", typ: "JWT" })
    .setIssuedAt()
    .setExpirationTime(expiresIn)
    .sign(getSecretKey());
}

export async function verifyAccessToken(token: string) {
  const { payload } = await jwtVerify(token, getSecretKey());
  return payload as unknown as AccessTokenPayload;
}

export async function signResetToken(userId: string) {
  return new SignJWT({ sub: userId, purpose: RESET_TOKEN_PURPOSE })
    .setProtectedHeader({ alg: "HS256", typ: "JWT" })
    .setIssuedAt()
    .setExpirationTime("30m")
    .sign(getSecretKey());
}

export async function verifyResetToken(token: string) {
  const { payload } = await jwtVerify(token, getSecretKey());
  if (payload.purpose !== RESET_TOKEN_PURPOSE) {
    throw new Error("Invalid reset token purpose");
  }
  return payload.sub as string;
}

export async function hashPassword(password: string) {
  return bcrypt.hash(password, 12);
}

function md5(value: string) {
  return createHash("md5").update(value).digest("hex");
}

export async function verifyPasswordAgainstStoredHash(password: string, storedHash: string) {
  if (!storedHash) return false;

  // Legacy path from existing PHP app imports.
  if (/^[a-f0-9]{32}$/i.test(storedHash)) {
    return md5(password) === storedHash.toLowerCase();
  }

  return bcrypt.compare(password, storedHash);
}

export function isLegacyPasswordHash(storedHash: string) {
  return /^[a-f0-9]{32}$/i.test(storedHash || "");
}

export const authCookies = {
  accessToken: ACCESS_COOKIE_NAME
};
