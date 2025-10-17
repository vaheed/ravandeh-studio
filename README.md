# Ravandeh Studio

A Vite + React single page application showcasing the Ravandeh Studio digital art gallery.

## Features

- Localised experience with theme switching
- Responsive design powered by Tailwind CSS and Radix UI primitives
- GitHub Pages optimised build with automatic 404 fallback handling

## Getting Started

```bash
npm install
```

### Development

```bash
npm run dev
```

### Linting

```bash
npm run lint
```

### Testing

```bash
npm run test
```

### Type Checking

```bash
npm run typecheck
```

### Production Build

```bash
npm run build
```

The build command generates the static site in the `build/` directory and automatically creates a `404.html` fallback for GitHub Pages.

## Deployment to GitHub Pages

The repository ships with a GitHub Actions workflow that installs dependencies, lints, tests, builds the site, uploads the production artefact, and deploys it to GitHub Pages. The Vite base path is automatically derived from the repository name, but you can override it for custom deployments with the `VITE_PUBLIC_BASE` environment variable.

## Contributing

1. Create a feature branch.
2. Run linting, tests, and type checking before committing.
3. Submit a pull request with details about your changes.

## License

This project is licensed under the MIT License.
