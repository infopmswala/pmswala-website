"use client";

import { useEffect, useState } from "react";

type ReportItem = {
  _id: string;
  mode: "dry-run" | "run";
  status: "success" | "failed";
  createdAt: string;
  error?: string;
};

export default function MigrationToolsPage() {
  const [status, setStatus] = useState("");
  const [reports, setReports] = useState<ReportItem[]>([]);

  async function loadReports() {
    const res = await fetch("/api/migration/run");
    const data = await res.json().catch(() => ({}));
    if (!res.ok) {
      setStatus(data.error || "Unable to load migration reports.");
      return;
    }
    setReports(data.items || []);
  }

  useEffect(() => {
    loadReports().catch(() => setStatus("Unable to load migration reports."));
  }, []);

  async function run(mode: "dry-run" | "run") {
    setStatus(`Running migration: ${mode} ...`);
    const res = await fetch("/api/migration/run", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ mode })
    });

    const data = await res.json().catch(() => ({}));
    if (!res.ok) {
      setStatus(data.error || "Migration run failed.");
      await loadReports();
      return;
    }

    setStatus(`Migration ${mode} finished successfully.`);
    await loadReports();
  }

  return (
    <main className="container">
      <h1>Migration Runner</h1>
      <div className="row">
        <button onClick={() => run("dry-run")}>Run Dry-Run</button>
        <button onClick={() => run("run")}>Run Full Migration</button>
      </div>
      {status ? <p>{status}</p> : null}

      <h2>Recent Reports</h2>
      <div className="cards">
        {reports.map((item) => (
          <article className="card" key={item._id}>
            <p>Mode: {item.mode}</p>
            <p>Status: {item.status}</p>
            <p>{new Date(item.createdAt).toLocaleString()}</p>
            {item.error ? <p>{item.error}</p> : null}
          </article>
        ))}
      </div>
    </main>
  );
}
