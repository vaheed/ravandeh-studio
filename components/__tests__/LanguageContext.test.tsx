import { render, screen } from "@testing-library/react";
import userEvent from "@testing-library/user-event";
import { describe, expect, it } from "vitest";
import { LanguageProvider, useLanguage } from "../LanguageContext";

describe("LanguageProvider", () => {
  function TestComponent() {
    const { language, toggleLanguage, t } = useLanguage();

    return (
      <div>
        <span data-testid="language">{language}</span>
        <span data-testid="translation">{t({ en: "hello", fa: "سلام" })}</span>
        <button type="button" onClick={toggleLanguage}>
          toggle
        </button>
      </div>
    );
  }

  it("renders with default English language", () => {
    render(
      <LanguageProvider>
        <TestComponent />
      </LanguageProvider>
    );

    expect(screen.getByTestId("language")).toHaveTextContent("en");
    expect(screen.getByTestId("translation")).toHaveTextContent("hello");
  });

  it("toggles language and translations", async () => {
    render(
      <LanguageProvider>
        <TestComponent />
      </LanguageProvider>
    );

    await userEvent.click(screen.getByRole("button", { name: "toggle" }));

    expect(screen.getByTestId("language")).toHaveTextContent("fa");
    expect(screen.getByTestId("translation")).toHaveTextContent("سلام");
  });
});
