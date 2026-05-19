import ShellNav from "@/components/ShellNav";

const adminItems = [
  { href: "/admin", label: "Dashboard" },
  { href: "/admin/users", label: "Users" },
  { href: "/admin/withdrawals", label: "Withdrawals" },
  { href: "/admin/transactions", label: "Transactions" },
  { href: "/admin/pages", label: "Pages" },
  { href: "/admin/portfolios", label: "Portfolios" },
  { href: "/admin/migration", label: "Migration" }
];

export default function AdminLayout({ children }: { children: React.ReactNode }) {
  return (
    <div className="app-shell">
      <ShellNav title="PMSWALA Admin" items={adminItems} />
      {children}
    </div>
  );
}
