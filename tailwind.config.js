import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#6D5EF7',
                    50: '#F2EEFF',
                    100: '#E6DEFF',
                    200: '#C5B7FF',
                    300: '#A48FFF',
                    400: '#8163FF',
                    500: '#6D5EF7',
                    600: '#5A4BE0',
                    700: '#4739C0',
                    800: '#352B91',
                    900: '#262269',
                },
                accent: '#22C55E',
                surface: '#FFFFFF',
                border: '#E5E7EB',
                heading: '#0F172A',
                paragraph: '#475569',
                muted: '#94A3B8',
                background: '#F8FAFC',
            },
            boxShadow: {
                soft: '0 24px 80px rgba(15, 23, 42, 0.08)',
                card: '0 18px 45px rgba(15, 23, 42, 0.06)',
            },
            borderRadius: {
                xl2: '1.5rem',
            },
        },
    },

    plugins: [forms],
};
