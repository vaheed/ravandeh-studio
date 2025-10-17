export function resolveBasePath(env: NodeJS.ProcessEnv): string {
  const explicitBase = normaliseBase(env.VITE_PUBLIC_BASE);
  if (explicitBase) {
    return explicitBase;
  }

  const repositoryName = env.GITHUB_REPOSITORY?.split('/').pop();
  const repositoryBase = repositoryName ? normaliseBase(`/${repositoryName}`) : undefined;
  if (repositoryBase) {
    return repositoryBase;
  }

  return '/';
}

function normaliseBase(base?: string): string | undefined {
  if (!base) {
    return undefined;
  }

  const trimmed = base.trim();
  if (!trimmed) {
    return undefined;
  }

  const leadingSlash = trimmed.startsWith('/') ? trimmed : `/${trimmed}`;
  return leadingSlash.endsWith('/') ? leadingSlash : `${leadingSlash}/`;
}
