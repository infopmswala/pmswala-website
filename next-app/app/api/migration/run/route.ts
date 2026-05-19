import { NextResponse } from "next/server";
import { z } from "zod";
import { requireAdmin } from "@/lib/admin-guard";
import { runMigration, type MigrationMode } from "@/lib/migration-runner";
import { connectMongo } from "@/lib/mongodb";
import { MigrationReportModel } from "@/models/MigrationReport";

const BodySchema = z.object({
  mode: z.enum(["dry-run", "run"]).default("dry-run")
});

async function isAuthorized(request: Request) {
  const bootstrapSecret = process.env.ADMIN_BOOTSTRAP_SECRET;
  const headerSecret = request.headers.get("x-bootstrap-secret");
  if (bootstrapSecret && headerSecret && headerSecret === bootstrapSecret) {
    return true;
  }

  const guard = await requireAdmin();
  return guard.ok;
}

export async function GET() {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  await connectMongo();
  const items = await MigrationReportModel.find({})
    .sort({ createdAt: -1 })
    .limit(20)
    .lean();

  return NextResponse.json({ items });
}

export async function POST(request: Request) {
  const ok = await isAuthorized(request);
  if (!ok) {
    return NextResponse.json({ error: "Unauthorized" }, { status: 401 });
  }

  const body = await request.json().catch(() => null);
  const parsed = BodySchema.safeParse(body ?? {});
  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid payload" }, { status: 400 });
  }

  const mode: MigrationMode = parsed.data.mode;

  try {
    const summary = await runMigration(mode);
    return NextResponse.json({ success: true, summary });
  } catch (error) {
    await connectMongo();
    await MigrationReportModel.create({
      mode,
      status: "failed",
      summary: {},
      error: error instanceof Error ? error.message : "Unknown error"
    });

    return NextResponse.json(
      {
        error: "Migration run failed",
        details: error instanceof Error ? error.message : "Unknown error"
      },
      { status: 500 }
    );
  }
}
