"use client";

export function PrintAgreementButton() {
  return (
    <div className="neo-agreement-actions">
      <button
        type="button"
        className="neo-btn neo-btn-ghost"
        onClick={() => window.print()}
        aria-label="Print user agreement"
      >
        <i className="bi bi-printer" aria-hidden="true" />
        Print Agreement
      </button>
    </div>
  );
}
