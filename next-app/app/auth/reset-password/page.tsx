"use client";

import { FormEvent, useMemo, useState } from "react";
import { useRouter, useSearchParams } from "next/navigation";

export default function ResetPasswordPage() {
  const router = useRouter();
  const searchParams = useSearchParams();
  const [status, setStatus] = useState("");

  const token = useMemo(() => searchParams.get("token") || "", [searchParams]);

  async function onSubmit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setStatus("Resetting password...");

    const formData = new FormData(event.currentTarget);
    const newPassword = String(formData.get("newPassword") || "");

    const res = await fetch("/api/auth/reset-password", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ resetToken: token, newPassword })
    });

    const data = await res.json().catch(() => ({}));
    if (!res.ok) {
      setStatus(data.error || "Reset failed.");
      return;
    }

    setStatus("Password reset successful. Redirecting...");
    router.push("/user/dashboard");
  }

  if (!token) {
    return (
      <main className="container">
        <h1>Reset Password</h1>
        <p>Missing reset token.</p>
      </main>
    );
  }

  return (
    <main className="container">
      <h1>Reset Password</h1>
      <form onSubmit={onSubmit} className="form">
        <input name="newPassword" type="password" minLength={8} placeholder="New Password" required />
        <button type="submit">Save Password</button>
      </form>
      {status ? <p>{status}</p> : null}
    </main>
  );
}
