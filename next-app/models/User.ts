import { Schema, model, models, type InferSchemaType } from "mongoose";

const UserSchema = new Schema(
  {
    legacyId: { type: Number, index: true },
    userCode: { type: String, trim: true },
    name: { type: String, trim: true, required: true },
    email: { type: String, trim: true, lowercase: true, index: true },
    phone: { type: String, trim: true, index: true, required: true },
    passwordHash: { type: String, required: true },
    role: { type: String, enum: ["admin", "user"], default: "user" },
    passwordResetRequired: { type: Boolean, default: true },
    status: { type: String, enum: ["active", "inactive"], default: "active" },
    kycStatus: { type: String, default: "pending" }
  },
  { timestamps: true }
);

UserSchema.index({ phone: 1 }, { unique: true });

export type UserDocument = InferSchemaType<typeof UserSchema>;
export const UserModel = models.User || model("User", UserSchema);
