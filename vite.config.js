import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                    'resources/css/login.css', 
                    'resources/css/register.css', 
                    'resources/css/collection.css', 
                    'resources/css/welcome.css', 
                    'resources/js/app.js'],
            
            refresh: true,
        }),
        tailwindcss(),
    ],
});
