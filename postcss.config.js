const purgecss = require("@fullhuman/postcss-purgecss");
// const cssnano = require('cssnano')
module.exports = {
  plugins: [require("tailwindcss"), require("autoprefixer")],
};
