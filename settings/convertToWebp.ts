const imagemin = require('imagemin');
const imageminWebp = require('imagemin-webp');
const sourceDir = './src/images/';
const destinationDir = './dist/images/webp/';
(async() => {
    await imagemin([sourceDir + '*.{jpg,png}'], {
        destination: destinationDir,
        plugins: [
            imageminWebp({ quality: 50 })
        ]
    });
})();