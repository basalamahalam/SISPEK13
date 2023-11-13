/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/views/**/*.php", "./resources/views/*.php"],
    theme: {
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            colors: {
                primary: "#0284c7",
                dark: "#0F172A",
            },
            screens: {
                xl: "1120px",
            },
        },
    },
    plugins: [],
};
