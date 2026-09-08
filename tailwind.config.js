import tailwindcss from "@tailwindcss/vite";

export default{
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        '.../resources/views/**/*.blade.php',
    ],
    safelist:[

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        tailwindcss(),
    ],
};
