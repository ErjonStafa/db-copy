const path = require('path');

module.exports = {
    entry: './src/Resources/js/app.js',
    output: {
        library: {
            type: 'module'
        },
        path: path.resolve(__dirname, 'public/js'),
        filename: 'app.js'
    },
    mode: 'development',
    experiments: {
        outputModule: true,
    }
}
