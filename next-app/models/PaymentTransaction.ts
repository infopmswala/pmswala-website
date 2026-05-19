import { Schema, model, models, type InferSchemaType } from "mongoose";

const PaymentTransactionSchema = new Schema(
  {
    legacyId: { type: Number, index: true },
    legacyUserId: { type: Number, index: true },
    legacyPortfolioId: { type: Number, index: true },
    amount: { type: Number, default: 0 },
    period: { type: String, default: "" },
    interest: { type: Number, default: 0 },
    maturityDate: { type: Date },
    paymentStatus: { type: String, enum: ["pending", "completed", "failed"], default: "pending" },
    portfolioSnapshot: {
      title: { type: String, default: "" },
      slug: { type: String, default: "" },
      minInvestment: { type: Number, default: 0 }
    }
  },
  { timestamps: true }
);

PaymentTransactionSchema.index({ legacyUserId: 1, createdAt: -1 });

export type PaymentTransactionDocument = InferSchemaType<typeof PaymentTransactionSchema>;
export const PaymentTransactionModel =
  models.PaymentTransaction || model("PaymentTransaction", PaymentTransactionSchema);
