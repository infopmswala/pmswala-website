"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";
import { FormEvent } from "react";

type Item = { href: string; label: string };

export default function ShellNav({ title, items }: { title: string; items: Item[] }) {
  const pathname = usePathname();

  async function logout(event: FormEvent) {
    event.preventDefault();
    await fetch("/api/auth/logout", { method: "POST" });
    window.location.href = "/auth/login";
  }

  return (
    <header className="shell-header">
      <div className="container shell-row">
        <strong>{title}</strong>
        <nav className="shell-nav">
          {items.map((item) => (
            <Link
              key={item.href}
              href={item.href}
              className={pathname === item.href ? "nav-link active" : "nav-link"}
            >
              {item.label}
            </Link>
          ))}
          <form onSubmit={logout}>
            <button type="submit" className="nav-btn">Logout</button>
          </form>
        </nav>
      </div>
    </header>
  );
}
