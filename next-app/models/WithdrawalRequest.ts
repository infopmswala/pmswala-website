import { Schema, model, models, type InferSchemaType } from "mongoose";

const WithdrawalRequestSchema = new Schema(
  {
    legacyId: { type: Number, index: true },
    legacyUserId: { type: Number, index: true },
    legacyPaymentId: { type: Number, index: true },
    amount: { type: Number, default: 0 },
    status: { type: String, enum: ["pending", "approved", "rejected"], default: "pending" },
    message: { type: String, default: "" }
  },
  { timestamps: true }
);

WithdrawalRequestSchema.index({ legacyUserId: 1, createdAt: -1 });

export type WithdrawalRequestDocument = InferSchemaType<typeof WithdrawalRequestSchema>;
export const WithdrawalRequestModel =
  models.WithdrawalRequest || model("WithdrawalRequest", WithdrawalRequestSchema);
