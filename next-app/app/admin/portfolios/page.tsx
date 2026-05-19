"use client";

import { FormEvent, useEffect, useState } from "react";

type Portfolio = {
  _id: string;
  title: string;
  slug: string;
  minInvestment: number;
  expectedReturn: number;
  status: "active" | "inactive";
};

export default function AdminPortfoliosPage() {
  const [items, setItems] = useState<Portfolio[]>([]);
  const [status, setStatus] = useState("Loading...");

  async function load() {
    const res = await fetch("/api/admin/portfolios?limit=50");
    const data = await res.json();
    if (!res.ok) {
      setStatus(data.error || "Failed to load portfolios");
      return;
    }

    setItems(data.items || []);
    setStatus("");
  }

  useEffect(() => {
    load().catch(() => setStatus("Unable to load portfolios. Login as admin first."));
  }, []);

  async function createPortfolio(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    const form = event.currentTarget;
    const formData = new FormData(form);

    const payload = {
      title: String(formData.get("title") || ""),
      slug: String(formData.get("slug") || ""),
      minInvestment: Number(formData.get("minInvestment") || 0),
      expectedReturn: Number(formData.get("expectedReturn") || 0),
      status: String(formData.get("status") || "active")
    };

    const res = await fetch("/api/admin/portfolios", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload)
    });

    const data = await res.json().catch(() => ({}));
    if (!res.ok) {
      setStatus(data.error || "Create failed");
      return;
    }

    form.reset();
    await load();
  }

  return (
    <main className="container">
      <h1>Admin Portfolios</h1>
      {status ? <p>{status}</p> : null}

      <form className="form" onSubmit={createPortfolio}>
        <input name="title" placeholder="Title" required />
        <input name="slug" placeholder="Slug" required />
        <input name="minInvestment" type="number" step="0.01" placeholder="Min Investment" />
        <input name="expectedReturn" type="number" step="0.01" placeholder="Expected Return" />
        <select name="status" defaultValue="active">
          <option value="active">active</option>
          <option value="inactive">inactive</option>
        </select>
        <button type="submit">Create Portfolio</button>
      </form>

      <div className="cards">
        {items.map((item) => (
          <article key={item._id} className="card">
            <h3>{item.title}</h3>
            <p>{item.slug}</p>
            <p>Min: {item.minInvestment}</p>
            <p>Expected: {item.expectedReturn}</p>
            <p>Status: {item.status}</p>
          </article>
        ))}
      </div>
    </main>
  );
}
