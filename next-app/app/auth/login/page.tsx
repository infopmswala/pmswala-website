"use client";

import { FormEvent, useState } from "react";
import { useRouter } from "next/navigation";

export default function LoginPage() {
  const router = useRouter();
  const [status, setStatus] = useState("");

  async function onSubmit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setStatus("Logging in...");

    const form = event.currentTarget;
    const formData = new FormData(form);
    const identity = String(formData.get("identity") || "");
    const password = String(formData.get("password") || "");

    const res = await fetch("/api/auth/login", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ identity, password })
    });

    const data = await res.json().catch(() => ({}));

    if (!res.ok) {
      setStatus(data.error || "Login failed.");
      return;
    }

    if (data.requiresPasswordReset && data.resetToken) {
      router.push(`/auth/reset-password?token=${encodeURIComponent(data.resetToken)}`);
      return;
    }

    setStatus("Login success. Redirecting...");
    router.push(data.user?.role === "admin" ? "/admin" : "/user/dashboard");
  }

  return (
    <main className="container">
      <h1>Login</h1>
      <form onSubmit={onSubmit} className="form">
        <input name="identity" placeholder="Email or Phone" required />
        <input name="password" type="password" placeholder="Password" required />
        <button type="submit">Login</button>
      </form>
      {status ? <p>{status}</p> : null}
    </main>
  );
}
