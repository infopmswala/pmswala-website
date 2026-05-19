"use client";

import { useRouter } from "next/navigation";
import { useState } from "react";

export default function LogoutPage() {
  const router = useRouter();
  const [status, setStatus] = useState("");

  async function doLogout() {
    setStatus("Logging out...");
    await fetch("/api/auth/logout", { method: "POST" });
    setStatus("Logged out.");
    router.push("/auth/login");
  }

  return (
    <main className="container">
      <h1>Logout</h1>
      <button onClick={doLogout}>Confirm Logout</button>
      {status ? <p>{status}</p> : null}
    </main>
  );
}
