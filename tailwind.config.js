/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            animation: {
                "fade-up": "fade-up 1s ease-out",
                "fade-down": "fade-down 1s ease-out",
            },
            keyframes: {
                "fade-up": {
                    "0%": {
                        opacity: 0,
                        transform: "translateY(30px) scale(0.9)",
                    },
                    "100%": {
                        opacity: 1,
                        transform: "translateY(0px) scale(1)",
                    },
                },
                "fade-down": {
                    "0%": {
                        opacity: 0,
                        transform: "translateY(-30px) scale(0.9)",
                    },
                    "100%": {
                        opacity: 1,
                        transform: "translateY(0px) scale(1)",
                    },
                },
            },
            colors: {
                primary: "#0284c7",
                dark: "#0F172A",
            },
        },
    },
    plugins: [],
};
