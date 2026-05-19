import ShellNav from "@/components/ShellNav";

const userItems = [
  { href: "/user/dashboard", label: "Dashboard" },
  { href: "/user/transactions", label: "Transactions" }
];

export default function UserLayout({ children }: { children: React.ReactNode }) {
  return (
    <div className="app-shell">
      <ShellNav title="PMSWALA User" items={userItems} />
      {children}
    </div>
  );
}
