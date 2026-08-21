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
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Deep teal — distinctive, professional, and unmistakably "work/talent"
                // rather than a generic SaaS purple.
                primary: {
                    DEFAULT: '#0F5B54',
                    50:  '#E9F5F3',
                    100: '#D2ECE6',
                    200: '#A3D8CC',
                    300: '#6EC0AE',
                    400: '#399C87',
                    500: '#1B7C6A',
                    600: '#0F5B54',
                    700: '#0C463F',
                    800: '#09322D',
                    900: '#062220',
                },
                // Warm amber — the "opportunity" accent: budgets, highlights, energy.
                secondary: {
                    DEFAULT: '#E19A2C',
                    50:  '#FEF6E9',
                    100: '#FCEAC9',
                    200: '#F8D68F',
                    300: '#F1B95A',
                    400: '#E9A73F',
                    500: '#E19A2C',
                    600: '#B87919',
                    700: '#8A5A0F',
                },
                success: { 50: '#ECFDF3', 100: '#D1FADF', 600: '#079455', 700: '#067647' },
                warning: { 50: '#FFFAEB', 100: '#FEF0C7', 600: '#DC6803', 700: '#B54708' },
                danger:  { 50: '#FEF3F2', 100: '#FEE4E2', 500: '#F04438', 600: '#D92D20', 700: '#B42318' },
                info:    { 50: '#EFF8FF', 100: '#D1E9FF', 600: '#175CD3' },

                surface: '#FFFFFF',
                heading: '#101323',
                paragraph: '#475069',
                muted: '#8A90A6',
                border: '#E4E7EF',
                background: '#F6F7FB',
            },
            boxShadow: {
                xs: '0 1px 2px rgba(16, 19, 35, 0.05)',
                card: '0 1px 3px rgba(16, 19, 35, 0.06), 0 1px 2px rgba(16, 19, 35, 0.04)',
                'card-hover': '0 12px 24px -8px rgba(16, 19, 35, 0.12), 0 4px 8px -4px rgba(16, 19, 35, 0.06)',
                soft: '0 20px 45px -12px rgba(15, 91, 84, 0.20)',
                dropdown: '0 4px 6px -2px rgba(16,19,35,0.05), 0 12px 16px -4px rgba(16,19,35,0.08)',
            },
            borderRadius: {
                xl2: '1.25rem',
            },
        },
    },

    plugins: [forms],
};
