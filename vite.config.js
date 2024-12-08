import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
<<<<<<< HEAD
import vue from '@vitejs/plugin-vue';
=======
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
<<<<<<< HEAD
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
=======
                'resources/js/app.js',    
            ],
            refresh: true,
        }),
    ],
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71
});
