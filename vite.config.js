import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/buscador.css',
                'resources/css/app.css',
                'resources/js/busqueda.js',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
