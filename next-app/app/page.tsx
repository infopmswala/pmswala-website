export default function HomePage() {
  return (
    <main style={{ maxWidth: 900, margin: "40px auto", fontFamily: "Segoe UI, sans-serif" }}>
      <h1>PMSWALA Migration App</h1>
      <p>This is the new single-project Next.js app (frontend + API).</p>
      <ul>
        <li>Health API: /api/health</li>
        <li>Slug API: /api/public/pages/{slug}</li>
      </ul>
    </main>
  );
}
