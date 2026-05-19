import Link from "next/link";

export default function AdminHomePage() {
  return (
    <main className="container">
      <h1>Admin Console</h1>
      <p>Migration admin operations are available below.</p>
      <ul>
        <li><Link href="/admin/users">Users</Link></li>
        <li><Link href="/admin/withdrawals">Withdrawals</Link></li>
        <li><Link href="/admin/pages">Pages</Link></li>
        <li><Link href="/admin/migration">Migration Runner</Link></li>
      </ul>
    </main>
  );
}
