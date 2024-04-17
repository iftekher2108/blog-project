import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public/back_assets/css/custom-boot.min.css',
                'public/back_assets/css/datatables.min.css',
                'public/back_assets/css/main.min.css',
                'public/back_assets/css/nice-select.css',
            ],
            refresh: true,
        }),
    ],
});
