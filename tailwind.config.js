const extend = require('./tailwind-theme/index')

module.exports = {
    content: ["./dist/**/*.{html,js}"],
    theme:{
        extend
    }

    }
