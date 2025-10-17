import { resolveBasePath } from '../utils/basePath';

describe('resolveBasePath', () => {
  const originalEnv = { ...process.env };

  beforeEach(() => {
    process.env = { ...originalEnv };
  });

  afterAll(() => {
    process.env = originalEnv;
  });

  it('derives base from repository name when running on GitHub Actions', () => {
    process.env.GITHUB_REPOSITORY = 'ravandeh-studio/ravandeh-studio';
    expect(resolveBasePath(process.env)).toBe('/ravandeh-studio/');
  });

  it('prefers explicit VITE_PUBLIC_BASE environment variable', () => {
    process.env.GITHUB_REPOSITORY = 'ravandeh-studio/ravandeh-studio';
    process.env.VITE_PUBLIC_BASE = '/custom/';
    expect(resolveBasePath(process.env)).toBe('/custom/');
  });

  it('falls back to root for local development', () => {
    delete process.env.GITHUB_REPOSITORY;
    delete process.env.VITE_PUBLIC_BASE;
    expect(resolveBasePath(process.env)).toBe('/');
  });
});
