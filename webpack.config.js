const path = require('path');

module.exports = {

    entry: {
        main: './public/assets/src/pages/main.js',
    },

    output: {
        filename: '[name].bundle.js',
        path: path.resolve(__dirname, 'public/assets/dist'),
    },

    mode: 'development',

    watch: true,
}