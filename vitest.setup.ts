import '@testing-library/jest-dom/vitest';
import { vi } from 'vitest';

defineMatchMedia();
defineIntersectionObserver();

type MatchMedia = (query: string) => MediaQueryList;

function defineMatchMedia() {
  if (typeof window === 'undefined') {
    return;
  }

  const matchMediaMock: MatchMedia = vi.fn().mockImplementation((query: string) => ({
    matches: false,
    media: query,
    onchange: null,
    addListener: vi.fn(),
    removeListener: vi.fn(),
    addEventListener: vi.fn(),
    removeEventListener: vi.fn(),
    dispatchEvent: vi.fn(),
  }));

  Object.defineProperty(window, 'matchMedia', {
    writable: true,
    value: matchMediaMock,
  });
}

function defineIntersectionObserver() {
  if (typeof window === 'undefined' || 'IntersectionObserver' in window) {
    return;
  }

  class MockIntersectionObserver implements IntersectionObserver {
    readonly root: Element | Document | null = null;
    readonly rootMargin = '0px';
    readonly thresholds: ReadonlyArray<number> = [0];

    constructor(private readonly callback: IntersectionObserverCallback) {}

    disconnect(): void {}
    observe(target: Element): void {
      this.callback([{ isIntersecting: true, target } as IntersectionObserverEntry], this);
    }
    takeRecords(): IntersectionObserverEntry[] {
      return [];
    }
    unobserve(): void {}
  }

  Object.defineProperty(window, 'IntersectionObserver', {
    writable: true,
    value: MockIntersectionObserver,
  });
}
