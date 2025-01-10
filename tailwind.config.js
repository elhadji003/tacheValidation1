/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
        // screens: {
        //     "sm": { "min": "320px", "max": "767px" },
        //     "md": { "min": "768px", "max": "991px" },
        //     "lg": { "min": "992px", "max": "1024px" },
        //     "xl": { "min": "1280px", "max": "1535px" },
        //     "2xl": { "min": "1536px" }
        // },
    },
    plugins: [],
}
