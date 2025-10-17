# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.1] - 2024-12-22
### Added
- Automated copy of `index.html` to `404.html` during builds to support GitHub Pages routing.
- Vitest configuration with React Testing Library and unit tests for the hero section and Vite base path logic.
- ESLint configuration targeting the TypeScript React codebase.
- GitHub Actions workflow improvements to lint, test, build, and deploy artefacts.
- Documentation covering setup, linting, testing, and deployment guidance.

### Changed
- Vite configuration to automatically derive the correct base path for GitHub Pages deployments.
- NPM scripts to include linting, testing, type-checking, and the GitHub Pages fallback step.

[0.1.1]: https://github.com/ravandeh-studio/ravandeh-studio/releases/tag/v0.1.1
