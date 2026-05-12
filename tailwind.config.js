export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                brand: "#932F80",
                brandSoft: "#932F80cc",
                brandLight: "#932F8022",
            },
            screens: {
                '2xl': '1536px',
                '3xl': '1920px',
            },
            container: {
                screens: {
                    sm: '640px',
                    md: '768px',
                    lg: '1024px',
                    xl: '1280px',
                    '2xl': '1440px',
                    '3xl': '1600px',
                },
            },
        },
    },
    plugins: [],
};
