// app.settings.js

// node modules
require('dotenv').config();
const path = require('path');

// settings
module.exports = {
    alias: {
        '@css': path.resolve('../src/assetbundles/seomatic/src//css'),
        '@img': path.resolve('../src/assetbundles/seomatic/src/img'),
        '@js': path.resolve('../src/assetbundles/seomatic/src/js'),
        '@vue': path.resolve('../src/assetbundles/seomatic/src/vue'),
    },
    copyright: '©2020 nystudio107.com',
    entry: {
        'dashboard': '@js/dashboard.js',
        'content-seo': '@js/content-seo.js',
        'seomatic': '@js/seomatic.js',
        'seomatic-meta': '@js/seomatic-meta.js',
        'seomatic-tokens': '@js/seomatic-tokens.js',
        'twig-editor': '@js/twig-editor.js',
        'javascript-editor': '@js/javascript-editor.js',
    },
    extensions: ['.ts', '.js', '.vue', '.json'],
    name: 'seomatic',
    paths: {
        dist: path.resolve('../../src/assetbundles/seomatic/dist/'),
    },
    urls: {
        publicPath: () => process.env.PUBLIC_PATH || '',
    },
};
