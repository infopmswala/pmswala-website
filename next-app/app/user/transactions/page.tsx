"use client";

import { FormEvent, useState } from "react";

type TxItem = {
  _id: string;
  legacyUserId: number;
  amount: number;
  period: string;
  paymentStatus: "pending" | "completed" | "failed";
  createdAt?: string;
};

export default function UserTransactionsPage() {
  const [legacyUserId, setLegacyUserId] = useState("");
  const [items, setItems] = useState<TxItem[]>([]);
  const [status, setStatus] = useState("");

  async function load(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setStatus("Loading transactions...");

    const res = await fetch(`/api/user/transactions?legacyUserId=${encodeURIComponent(legacyUserId)}&limit=100`);
    const data = await res.json().catch(() => ({}));

    if (!res.ok) {
      setStatus(data.error || "Unable to load transactions");
      return;
    }

    setItems(data.items || []);
    setStatus("");
  }

  return (
    <main className="container">
      <h1>User Transactions</h1>
      <form className="form" onSubmit={load}>
        <input
          value={legacyUserId}
          onChange={(e) => setLegacyUserId(e.target.value)}
          placeholder="Legacy User ID"
          required
        />
        <button type="submit">Load</button>
      </form>
      {status ? <p>{status}</p> : null}

      <div className="cards">
        {items.map((item) => (
          <article key={item._id} className="card">
            <p>User: {item.legacyUserId}</p>
            <p>Amount: {item.amount}</p>
            <p>Period: {item.period || "-"}</p>
            <p>Status: {item.paymentStatus}</p>
            <p>{item.createdAt ? new Date(item.createdAt).toLocaleString() : ""}</p>
          </article>
        ))}
      </div>
    </main>
  );
}
