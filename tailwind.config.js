const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    // 監視ファイルリスト
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './app/Enums/*.php',
        './resources/views/**/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],

    theme: {
        extend: {
            // オリジナルcss
            colors: {
                default: '#F2F4F6',
                clear: '#0000',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('preline/plugin')],
};
