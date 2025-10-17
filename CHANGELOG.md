# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.1] - 2025-10-17
### Fixed
- Restore the GitHub Pages build by introducing a Vite-based React toolchain that outputs a static `dist/` bundle.
- Harden theme persistence logic to handle browser storage edge cases without breaking rendering.
- Provide a resilient image fallback component with consistent TypeScript formatting.

### Added
- Automated unit tests for the language toggle behaviour to guard against regressions.
- Vitest, ESLint, and Vite configuration with supporting scripts for local development and CI.
- GitHub Actions workflow updates to install dependencies, lint, test, build, and publish the site artifact.
- Project-level changelog to track releases.

[1.0.1]: https://github.com/ravandeh-studio/ravandeh-studio/releases/tag/v1.0.1
