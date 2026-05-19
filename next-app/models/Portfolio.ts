import { Schema, model, models, type InferSchemaType } from "mongoose";

const PortfolioSchema = new Schema(
  {
    legacyId: { type: Number, index: true },
    title: { type: String, required: true, trim: true },
    slug: { type: String, required: true, trim: true, index: true },
    summary: { type: String, default: "" },
    description: { type: String, default: "" },
    minInvestment: { type: Number, default: 0 },
    expectedReturn: { type: Number, default: 0 },
    status: { type: String, enum: ["active", "inactive"], default: "active" }
  },
  { timestamps: true }
);

PortfolioSchema.index({ slug: 1 }, { unique: true });

export type PortfolioDocument = InferSchemaType<typeof PortfolioSchema>;
export const PortfolioModel = models.Portfolio || model("Portfolio", PortfolioSchema);
