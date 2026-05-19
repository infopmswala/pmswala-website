"use client";

import { FormEvent, useState } from "react";

export default function ContactPage() {
  const [status, setStatus] = useState<string>("");

  async function submitContact(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setStatus("Submitting...");

    const form = event.currentTarget;
    const formData = new FormData(form);

    const body = {
      name: String(formData.get("name") || ""),
      email: String(formData.get("email") || ""),
      phone: String(formData.get("phone") || ""),
      message: String(formData.get("message") || "")
    };

    const res = await fetch("/api/public/contact", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(body)
    });

    if (res.ok) {
      setStatus("Thank you. Your inquiry has been submitted.");
      form.reset();
    } else {
      const data = await res.json().catch(() => ({}));
      setStatus(data.error || "Unable to submit right now.");
    }
  }

  return (
    <main className="container">
      <h1>Contact Us</h1>
      <form onSubmit={submitContact} className="form">
        <input name="name" placeholder="Name" required />
        <input name="email" type="email" placeholder="Email" required />
        <input name="phone" placeholder="Phone" required />
        <textarea name="message" placeholder="Message" required rows={5} />
        <button type="submit">Send</button>
      </form>
      {status ? <p>{status}</p> : null}
    </main>
  );
}
