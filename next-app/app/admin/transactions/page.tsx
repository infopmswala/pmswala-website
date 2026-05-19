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
  const [legacyUserId, setLegacyUserId] = useState("");
  const [paymentStatus, setPaymentStatus] = useState("");
  const [page, setPage] = useState(1);
  const [pages, setPages] = useState(1);

  async function load(targetPage = page) {
    const params = new URLSearchParams({ limit: "20", page: String(targetPage) });
    if (legacyUserId.trim()) params.set("legacyUserId", legacyUserId.trim());
    if (paymentStatus) params.set("status", paymentStatus);

    const res = await fetch(`/api/admin/transactions?${params.toString()}`);
    const data = await res.json();
    if (!res.ok) {
      setStatus(data.error || "Failed to load transactions");
      return;
    }

    setItems(data.items || []);
    setPage(data.pagination?.page || targetPage);
    setPages(data.pagination?.pages || 1);
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
      <div className="row" style={{ marginBottom: 12 }}>
        <input
          value={legacyUserId}
          onChange={(e) => setLegacyUserId(e.target.value)}
          placeholder="Legacy User ID"
        />
        <select value={paymentStatus} onChange={(e) => setPaymentStatus(e.target.value)}>
          <option value="">all status</option>
          <option value="pending">pending</option>
          <option value="completed">completed</option>
          <option value="failed">failed</option>
        </select>
        <button onClick={() => load(1)}>Apply</button>
      </div>
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
      <div className="row" style={{ marginTop: 12 }}>
        <button disabled={page <= 1} onClick={() => load(page - 1)}>Prev</button>
        <span>Page {page} / {pages}</span>
        <button disabled={page >= pages} onClick={() => load(page + 1)}>Next</button>
      </div>
    </main>
  );
}
