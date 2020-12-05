// app.settings.js

// node modules
require('dotenv').config();

// settings
module.exports = {
    alias: {
        'vue$': 'vue/dist/vue.esm.js'
    },
    copyright: '©2020 nystudio107.com',
    entry: {
        'app': [
            '../src/js/app.ts',
            '../src/css/app-base.pcss',
            '../src/css/app-components.pcss',
            '../src/css/app-utilities.pcss',
            '../src/fonts/fontello.eot',
            '../src/fonts/fontello.ttf',
            '../src/fonts/fontello.woff',
            '../src/fonts/fontello.woff2',
            '../src/fonts/OperatorMonoSSm-Book.eot',
            '../src/fonts/OperatorMonoSSm-Book.ttf',
            '../src/fonts/OperatorMonoSSm-Book.woff',
            '../src/fonts/OperatorMonoSSm-Book.woff2',
            '../src/fonts/OperatorMonoSSm-BookItalic.eot',
            '../src/fonts/OperatorMonoSSm-BookItalic.ttf',
            '../src/fonts/OperatorMonoSSm-BookItalic.woff',
            '../src/fonts/OperatorMonoSSm-BookItalic.woff2',
        ],
        'lazysizes-wrapper': '../src/js/utils/lazysizes-wrapper.ts',
        'episodes': '../src/js/modules/episodes.js',
        'player': '../src/js/modules/player.js',
    },
    extensions: ['.ts', '.js', '.vue', '.json'],
    name: 'devMode.fm',
    paths: {
        dist: '../../cms/web/dist/',
    },
    urls: {
        criticalCss: 'https://devMode.fm/',
        publicPath: () => process.env.PUBLIC_PATH || '/dist/',
    },
};
