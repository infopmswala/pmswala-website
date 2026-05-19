/* eslint-disable no-console */
import process from "node:process";
import { runMigration } from "../../lib/migration-runner";

const isDryRun = process.argv.includes("--dry-run");
const isRun = process.argv.includes("--run");

if (!isDryRun && !isRun) {
  console.error("Use --dry-run or --run");
  process.exit(1);
}

const mode = isDryRun ? "dry-run" : "run";

runMigration(mode)
  .then((summary) => {
    console.log("Migration completed.");
    console.log(JSON.stringify(summary, null, 2));
  })
  .catch((error) => {
    console.error("Migration failed:", error);
    process.exit(1);
  });
