const theme = require('./tailwind-theme/index')

module.exports = {
    content: ["./dist/**/*.{html,js}"],
    theme,

    variants: {
        extend: {},
    },
    plugins: [],
}