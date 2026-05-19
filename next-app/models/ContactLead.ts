import { Schema, model, models, type InferSchemaType } from "mongoose";

const ContactLeadSchema = new Schema(
  {
    name: { type: String, required: true, trim: true },
    email: { type: String, required: true, trim: true, lowercase: true },
    phone: { type: String, required: true, trim: true },
    message: { type: String, required: true, trim: true },
    source: { type: String, default: "website" }
  },
  { timestamps: true }
);

ContactLeadSchema.index({ createdAt: -1 });

export type ContactLeadDocument = InferSchemaType<typeof ContactLeadSchema>;
export const ContactLeadModel =
  models.ContactLead || model("ContactLead", ContactLeadSchema);
