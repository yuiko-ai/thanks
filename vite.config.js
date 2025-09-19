import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            //## エントリーポイントのファイル
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
        },

        //## WSL2など自動更新が利かない場合にwatchを有効にする
        // watch: {
        //   usePolling: true,
        // },
    },
});
