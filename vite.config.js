import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/js/echo.js',
                'resources/js/inactivity.js',
                'resources/js/notification-manager.js'],
            refresh: true,
        }),
    ],
});
