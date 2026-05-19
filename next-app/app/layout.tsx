import type { Metadata } from "next";
import "./styles.css";

export const metadata: Metadata = {
  title: "PMSWALA Next",
  description: "Unified React frontend and API project"
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en">
      <body>{children}</body>
    </html>
  );
}
