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

  useEffect(() => {
    fetch("/api/admin/users?limit=50")
      .then((res) => res.json())
      .then((data) => {
        setItems(data.items || []);
        setStatus("");
      })
      .catch(() => setStatus("Unable to load users. Login as admin first."));
  }, []);

  return (
    <main className="container">
      <h1>Admin Users</h1>
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
    </main>
  );
}
