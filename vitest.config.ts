import { defineConfig } from 'vitest/config';
import react from '@vitejs/plugin-react-swc';

export default defineConfig({
  // Vitest vendors its own Vite dependency, so we relax typing here.
  plugins: [react() as unknown as any],
  test: {
    environment: 'jsdom',
    setupFiles: ['./vitest.setup.ts'],
    globals: true,
    coverage: {
      reporter: ['text', 'lcov'],
    },
  },
});
