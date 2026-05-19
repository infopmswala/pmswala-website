import Link from "next/link";

export default function UserDashboardPage() {
  return (
    <main className="container">
      <h1>User Dashboard</h1>
      <p>This dashboard is now in the Next.js migration app.</p>
      <ul>
        <li><Link href="/user/transactions">My Transactions</Link></li>
      </ul>
    </main>
  );
}
