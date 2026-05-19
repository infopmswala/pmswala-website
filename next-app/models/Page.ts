import { Schema, model, models, type InferSchemaType } from "mongoose";

const PageSchema = new Schema(
  {
    legacyId: { type: Number, index: true },
    source: { type: String, enum: ["service", "blog", "information"], required: true },
    title: { type: String, required: true, trim: true },
    slug: { type: String, required: true, trim: true },
    summary: { type: String, default: "" },
    contentHtml: { type: String, default: "" },
    image: { type: String, default: "" },
    status: { type: String, enum: ["active", "inactive"], default: "active" }
  },
  { timestamps: true }
);

PageSchema.index({ slug: 1 }, { unique: true });

export type PageDocument = InferSchemaType<typeof PageSchema>;
export const PageModel = models.Page || model("Page", PageSchema);
