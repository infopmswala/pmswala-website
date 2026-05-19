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
  const [legacyUserId, setLegacyUserId] = useState("");
  const [withdrawalStatus, setWithdrawalStatus] = useState("");
  const [page, setPage] = useState(1);
  const [pages, setPages] = useState(1);

  async function load(targetPage = page) {
    const params = new URLSearchParams({ limit: "20", page: String(targetPage) });
    if (legacyUserId.trim()) params.set("legacyUserId", legacyUserId.trim());
    if (withdrawalStatus) params.set("status", withdrawalStatus);

    const res = await fetch(`/api/admin/withdrawals?${params.toString()}`);
    const data = await res.json();
    if (!res.ok) {
      setStatus(data.error || "Failed to load withdrawals");
      return;
    }
    setItems(data.items || []);
    setPage(data.pagination?.page || targetPage);
    setPages(data.pagination?.pages || 1);
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
      <div className="row" style={{ marginBottom: 12 }}>
        <input
          value={legacyUserId}
          onChange={(e) => setLegacyUserId(e.target.value)}
          placeholder="Legacy User ID"
        />
        <select value={withdrawalStatus} onChange={(e) => setWithdrawalStatus(e.target.value)}>
          <option value="">all status</option>
          <option value="pending">pending</option>
          <option value="approved">approved</option>
          <option value="rejected">rejected</option>
        </select>
        <button onClick={() => load(1)}>Apply</button>
      </div>
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
      <div className="row" style={{ marginTop: 12 }}>
        <button disabled={page <= 1} onClick={() => load(page - 1)}>Prev</button>
        <span>Page {page} / {pages}</span>
        <button disabled={page >= pages} onClick={() => load(page + 1)}>Next</button>
      </div>
    </main>
  );
}
