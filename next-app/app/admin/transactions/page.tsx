"use client";

import { useEffect, useState } from "react";

type Tx = {
  _id: string;
  legacyUserId: number;
  amount: number;
  period: string;
  paymentStatus: "pending" | "completed" | "failed";
};

export default function AdminTransactionsPage() {
  const [items, setItems] = useState<Tx[]>([]);
  const [status, setStatus] = useState("Loading...");

  async function load() {
    const res = await fetch("/api/admin/transactions?limit=50");
    const data = await res.json();
    if (!res.ok) {
      setStatus(data.error || "Failed to load transactions");
      return;
    }

    setItems(data.items || []);
    setStatus("");
  }

  useEffect(() => {
    load().catch(() => setStatus("Unable to load transactions. Login as admin first."));
  }, []);

  async function setState(id: string, paymentStatus: "pending" | "completed" | "failed") {
    const res = await fetch("/api/admin/transactions", {
      method: "PATCH",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id, paymentStatus })
    });

    if (res.ok) {
      await load();
    }
  }

  return (
    <main className="container">
      <h1>Admin Transactions</h1>
      {status ? <p>{status}</p> : null}
      <div className="cards">
        {items.map((item) => (
          <article key={item._id} className="card">
            <p>User Legacy ID: {item.legacyUserId}</p>
            <p>Amount: {item.amount}</p>
            <p>Period: {item.period || "-"}</p>
            <p>Status: {item.paymentStatus}</p>
            <div className="row">
              <button onClick={() => setState(item._id, "pending")}>Pending</button>
              <button onClick={() => setState(item._id, "completed")}>Completed</button>
              <button onClick={() => setState(item._id, "failed")}>Failed</button>
            </div>
          </article>
        ))}
      </div>
    </main>
  );
}
