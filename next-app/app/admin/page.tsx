"use client";

import Link from "next/link";
import { useEffect, useState } from "react";

type Metrics = {
  users: { total: number; active: number };
  portfolios: { total: number };
  transactions: { total: number; pending: number; totalAmount: number };
  withdrawals: { total: number; pending: number; totalAmount: number };
  contactLeads: { total: number };
};

export default function AdminHomePage() {
  const [metrics, setMetrics] = useState<Metrics | null>(null);
  const [status, setStatus] = useState("Loading metrics...");

  useEffect(() => {
    fetch("/api/admin/metrics")
      .then((res) => res.json().then((data) => ({ ok: res.ok, data })))
      .then(({ ok, data }) => {
        if (!ok) {
          setStatus(data.error || "Unable to fetch metrics. Ensure admin is logged in.");
          return;
        }
        setMetrics(data as Metrics);
        setStatus("");
      })
      .catch(() => setStatus("Unable to fetch metrics. Ensure admin is logged in."));
  }, []);

  return (
    <main className="container">
      <h1>Admin Console</h1>
      <p>Operational metrics and management modules.</p>

      {metrics ? (
        <section className="cards">
          <article className="card"><h3>Users</h3><p>Total: {metrics.users.total}</p><p>Active: {metrics.users.active}</p></article>
          <article className="card"><h3>Portfolios</h3><p>Total: {metrics.portfolios.total}</p></article>
          <article className="card"><h3>Transactions</h3><p>Total: {metrics.transactions.total}</p><p>Pending: {metrics.transactions.pending}</p><p>Amount: {metrics.transactions.totalAmount}</p></article>
          <article className="card"><h3>Withdrawals</h3><p>Total: {metrics.withdrawals.total}</p><p>Pending: {metrics.withdrawals.pending}</p><p>Amount: {metrics.withdrawals.totalAmount}</p></article>
          <article className="card"><h3>Contact Leads</h3><p>Total: {metrics.contactLeads.total}</p></article>
        </section>
      ) : (
        <p>{status}</p>
      )}

      <h2>Quick Links</h2>
      <ul>
        <li><Link href="/admin/users">Users</Link></li>
        <li><Link href="/admin/withdrawals">Withdrawals</Link></li>
        <li><Link href="/admin/pages">Pages</Link></li>
        <li><Link href="/admin/portfolios">Portfolios</Link></li>
        <li><Link href="/admin/transactions">Transactions</Link></li>
        <li><Link href="/admin/migration">Migration Runner</Link></li>
      </ul>
    </main>
  );
}
