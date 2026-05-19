import { Schema, model, models, type InferSchemaType } from "mongoose";

const MigrationReportSchema = new Schema(
  {
    mode: { type: String, enum: ["dry-run", "run"], required: true },
    status: { type: String, enum: ["success", "failed"], required: true },
    summary: { type: Schema.Types.Mixed, required: true },
    error: { type: String, default: "" }
  },
  { timestamps: true }
);

MigrationReportSchema.index({ createdAt: -1 });

export type MigrationReportDocument = InferSchemaType<typeof MigrationReportSchema>;
export const MigrationReportModel =
  models.MigrationReport || model("MigrationReport", MigrationReportSchema);
