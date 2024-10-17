import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
       "./resources/**/*.blade.php",
    "./resources/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            height: {
                'customHeight' : '70vh', 
            },
        },
    },

    plugins: [forms],
};
