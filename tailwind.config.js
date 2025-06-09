import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", "Figtree", ...defaultTheme.fontFamily.sans],
                display: ["Cal Sans", "Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Modern shadcn-inspired color palette
                border: "hsl(214.3 31.8% 91.4%)",
                input: "hsl(214.3 31.8% 91.4%)",
                ring: "hsl(262.1 83.3% 57.8%)",
                background: "hsl(0 0% 100%)",
                foreground: "hsl(224 71.4% 4.1%)",
                primary: {
                    DEFAULT: "hsl(262.1 83.3% 57.8%)",
                    foreground: "hsl(210 20% 98%)",
                    50: "hsl(270 100% 98%)",
                    100: "hsl(269 100% 95%)",
                    200: "hsl(269 100% 92%)",
                    300: "hsl(269 87% 85%)",
                    400: "hsl(270 95% 75%)",
                    500: "hsl(262.1 83.3% 57.8%)",
                    600: "hsl(262 83% 58%)",
                    700: "hsl(263 70% 50.4%)",
                    800: "hsl(263 69% 42.2%)",
                    900: "hsl(264 69% 36.1%)",
                    950: "hsl(262 83% 24.5%)",
                },
                secondary: {
                    DEFAULT: "hsl(210 40% 96%)",
                    foreground: "hsl(222.2 84% 4.9%)",
                },
                destructive: {
                    DEFAULT: "hsl(0 72.2% 50.6%)",
                    foreground: "hsl(210 20% 98%)",
                },
                muted: {
                    DEFAULT: "hsl(210 40% 96%)",
                    foreground: "hsl(215.4 16.3% 46.9%)",
                },
                accent: {
                    DEFAULT: "hsl(210 40% 96%)",
                    foreground: "hsl(222.2 84% 4.9%)",
                },
                popover: {
                    DEFAULT: "hsl(0 0% 100%)",
                    foreground: "hsl(222.2 84% 4.9%)",
                },
                card: {
                    DEFAULT: "hsl(0 0% 100%)",
                    foreground: "hsl(222.2 84% 4.9%)",
                },
                // Custom gradient colors
                gradient: {
                    purple: "hsl(262.1 83.3% 57.8%)",
                    blue: "hsl(221.2 83.2% 53.3%)",
                    pink: "hsl(316.7 75% 68.6%)",
                    orange: "hsl(24.6 95% 53.1%)",
                },
                // Glass morphism colors
                glass: {
                    white: "rgba(255, 255, 255, 0.95)",
                    light: "rgba(255, 255, 255, 0.1)",
                    border: "rgba(255, 255, 255, 0.2)",
                    dark: "rgba(0, 0, 0, 0.1)",
                },
            },
            animation: {
                'fade-in': 'fadeIn 0.8s ease-out',
                'fade-in-up': 'fadeInUp 0.6s ease-out',
                'fade-in-down': 'fadeInDown 0.6s ease-out',
                'slide-up': 'slideUp 0.5s ease-out',
                'slide-down': 'slideDown 0.5s ease-out',
                'slide-left': 'slideLeft 0.5s ease-out',
                'slide-right': 'slideRight 0.5s ease-out',
                'scale-in': 'scaleIn 0.4s ease-out',
                'float': 'float 6s ease-in-out infinite',
                'float-delayed': 'float 6s ease-in-out infinite 2s',
                'float-slow': 'float 8s ease-in-out infinite',
                'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
                'shimmer': 'shimmer 2.5s ease-in-out infinite',
                'bounce-gentle': 'bounceGentle 2s ease-in-out infinite',
                'rotate-slow': 'rotateSlow 20s linear infinite',
                'gradient-shift': 'gradientShift 3s ease-in-out infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeInDown: {
                    '0%': { opacity: '0', transform: 'translateY(-30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                slideUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                slideDown: {
                    '0%': { opacity: '0', transform: 'translateY(-20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                slideLeft: {
                    '0%': { opacity: '0', transform: 'translateX(20px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                slideRight: {
                    '0%': { opacity: '0', transform: 'translateX(-20px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                scaleIn: {
                    '0%': { opacity: '0', transform: 'scale(0.9)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                pulseGlow: {
                    '0%, 100%': { boxShadow: '0 0 20px rgba(147, 51, 234, 0.4)' },
                    '50%': { boxShadow: '0 0 40px rgba(147, 51, 234, 0.8)' },
                },
                shimmer: {
                    '0%': { backgroundPosition: '-200% center' },
                    '100%': { backgroundPosition: '200% center' },
                },
                bounceGentle: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-8px)' },
                },
                rotateSlow: {
                    '0%': { transform: 'rotate(0deg)' },
                    '100%': { transform: 'rotate(360deg)' },
                },
                gradientShift: {
                    '0%, 100%': { backgroundPosition: '0% 50%' },
                    '50%': { backgroundPosition: '100% 50%' },
                },
            },
            backdropBlur: {
                xs: '2px',
                '3xl': '64px',
            },
            borderRadius: {
                'xl': '0.75rem',
                '2xl': '1rem',
                '3xl': '1.5rem',
                '4xl': '2rem',
            },
            boxShadow: {
                'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.37)',
                'glass-inset': 'inset 0 1px 0 0 rgba(255, 255, 255, 0.05)',
                'glow-sm': '0 0 10px rgba(147, 51, 234, 0.3)',
                'glow': '0 0 20px rgba(147, 51, 234, 0.4)',
                'glow-lg': '0 0 40px rgba(147, 51, 234, 0.6)',
                'inner-glow': 'inset 0 2px 4px 0 rgba(147, 51, 234, 0.1)',
                'smooth': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                'smooth-lg': '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
            },
            spacing: {
                '18': '4.5rem',
                '88': '22rem',
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
                'shimmer': 'linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent)',
            },
            backgroundSize: {
                '300%': '300%',
            },
        },
    },

    plugins: [forms],
};