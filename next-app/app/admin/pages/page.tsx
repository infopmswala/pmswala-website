"use client";

import { FormEvent, useEffect, useState } from "react";

type PageItem = {
  _id: string;
  source: "service" | "blog" | "information";
  title: string;
  slug: string;
  status: "active" | "inactive";
};

export default function AdminPagesPage() {
  const [items, setItems] = useState<PageItem[]>([]);
  const [status, setStatus] = useState("Loading...");

  async function load() {
    const res = await fetch("/api/admin/pages?limit=50");
    const data = await res.json();
    if (!res.ok) {
      setStatus(data.error || "Failed to load pages");
      return;
    }

    setItems(data.items || []);
    setStatus("");
  }

  useEffect(() => {
    load().catch(() => setStatus("Unable to load pages. Login as admin first."));
  }, []);

  async function createPage(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    const form = event.currentTarget;
    const formData = new FormData(form);

    const payload = {
      source: String(formData.get("source") || "information"),
      title: String(formData.get("title") || ""),
      slug: String(formData.get("slug") || ""),
      summary: String(formData.get("summary") || ""),
      contentHtml: String(formData.get("contentHtml") || ""),
      status: String(formData.get("status") || "active")
    };

    const res = await fetch("/api/admin/pages", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload)
    });

    const data = await res.json().catch(() => ({}));
    if (!res.ok) {
      setStatus(data.error || "Failed to create page");
      return;
    }

    form.reset();
    await load();
  }

  return (
    <main className="container">
      <h1>Admin Pages</h1>
      {status ? <p>{status}</p> : null}

      <form className="form" onSubmit={createPage}>
        <select name="source" defaultValue="information">
          <option value="service">service</option>
          <option value="blog">blog</option>
          <option value="information">information</option>
        </select>
        <input name="title" placeholder="Title" required />
        <input name="slug" placeholder="Slug" required />
        <input name="summary" placeholder="Summary" />
        <textarea name="contentHtml" placeholder="Content HTML" rows={4} />
        <select name="status" defaultValue="active">
          <option value="active">active</option>
          <option value="inactive">inactive</option>
        </select>
        <button type="submit">Create</button>
      </form>

      <div className="cards">
        {items.map((item) => (
          <article key={item._id} className="card">
            <h3>{item.title}</h3>
            <p>{item.slug}</p>
            <p>Source: {item.source}</p>
            <p>Status: {item.status}</p>
          </article>
        ))}
      </div>
    </main>
  );
}
