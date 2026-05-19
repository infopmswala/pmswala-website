"use client";

import { useEffect, useState } from "react";

type Withdrawal = {
  _id: string;
  legacyUserId: number;
  amount: number;
  status: "pending" | "approved" | "rejected";
  message?: string;
};

export default function AdminWithdrawalsPage() {
  const [items, setItems] = useState<Withdrawal[]>([]);
  const [status, setStatus] = useState("Loading...");

  async function load() {
    const res = await fetch("/api/admin/withdrawals?limit=50");
    const data = await res.json();
    if (!res.ok) {
      setStatus(data.error || "Failed to load withdrawals");
      return;
    }
    setItems(data.items || []);
    setStatus("");
  }

  useEffect(() => {
    load().catch(() => setStatus("Unable to load withdrawals. Login as admin first."));
  }, []);

  async function updateStatus(id: string, nextStatus: "approved" | "rejected") {
    const res = await fetch("/api/admin/withdrawals", {
      method: "PATCH",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id, status: nextStatus })
    });

    if (res.ok) {
      await load();
    }
  }

  return (
    <main className="container">
      <h1>Withdrawal Requests</h1>
      {status ? <p>{status}</p> : null}
      <div className="cards">
        {items.map((item) => (
          <article key={item._id} className="card">
            <p>User Legacy ID: {item.legacyUserId}</p>
            <p>Amount: {item.amount}</p>
            <p>Status: {item.status}</p>
            <p>{item.message || ""}</p>
            {item.status === "pending" ? (
              <div className="row">
                <button onClick={() => updateStatus(item._id, "approved")}>Approve</button>
                <button onClick={() => updateStatus(item._id, "rejected")}>Reject</button>
              </div>
            ) : null}
          </article>
        ))}
      </div>
    </main>
  );
}
