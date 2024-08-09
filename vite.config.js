import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['src/input.css', 'src/app.js'], // Adjust paths if needed
      refresh: true,
    }),
  ],
});
