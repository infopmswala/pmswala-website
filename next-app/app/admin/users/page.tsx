"use client";

import { useEffect, useState } from "react";

type UserItem = {
  _id: string;
  name: string;
  email?: string;
  phone: string;
  role: "admin" | "user";
  status: "active" | "inactive";
  passwordResetRequired: boolean;
};

export default function AdminUsersPage() {
  const [items, setItems] = useState<UserItem[]>([]);
  const [status, setStatus] = useState("Loading...");
  const [query, setQuery] = useState("");
  const [page, setPage] = useState(1);
  const [pages, setPages] = useState(1);

  function load(targetPage = page, q = query) {
    const params = new URLSearchParams({
      limit: "20",
      page: String(targetPage)
    });
    if (q.trim()) params.set("q", q.trim());

    setStatus("Loading...");
    fetch(`/api/admin/users?${params.toString()}`)
      .then((res) => res.json())
      .then((data) => {
        setItems(data.items || []);
        setPages(data.pagination?.pages || 1);
        setPage(data.pagination?.page || targetPage);
        setStatus("");
      })
      .catch(() => setStatus("Unable to load users. Login as admin first."));
  }

  useEffect(() => {
    load(1, "");
  }, []);

  function search() {
    load(1, query);
  }

  return (
    <main className="container">
      <h1>Admin Users</h1>
      <div className="row" style={{ marginBottom: 12 }}>
        <input
          value={query}
          onChange={(e) => setQuery(e.target.value)}
          placeholder="Search name/email/phone"
        />
        <button onClick={search}>Search</button>
      </div>
      {status ? <p>{status}</p> : null}
      <div className="cards">
        {items.map((item) => (
          <article key={item._id} className="card">
            <h3>{item.name}</h3>
            <p>{item.email || "No email"}</p>
            <p>{item.phone}</p>
            <p>Role: {item.role}</p>
            <p>Status: {item.status}</p>
            <p>Reset Required: {item.passwordResetRequired ? "Yes" : "No"}</p>
          </article>
        ))}
      </div>
      <div className="row" style={{ marginTop: 12 }}>
        <button disabled={page <= 1} onClick={() => load(page - 1, query)}>Prev</button>
        <span>Page {page} / {pages}</span>
        <button disabled={page >= pages} onClick={() => load(page + 1, query)}>Next</button>
      </div>
    </main>
  );
}
