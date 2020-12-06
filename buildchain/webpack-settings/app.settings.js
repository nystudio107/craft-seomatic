// app.settings.js

// node modules
require('dotenv').config();

// settings
module.exports = {
    alias: {
    },
    copyright: '©2020 nystudio107.com',
    entry: {
        'dashboard': '../src/assetbundles/seomatic/src/js/dashboard.js',
        'content-seo': '../src/assetbundles/seomatic/src/js/content-seo.js',
        'seomatic': '../src/assetbundles/seomatic/src/js/seomatic.js',
        'seomatic-meta': '../src/assetbundles/seomatic/src/js/seomatic-meta.js',
        'seomatic-tokens': '../src/assetbundles/seomatic/src/js/seomatic-tokens.js',
        'twig-editor': '../src/assetbundles/seomatic/src/js/twig-editor.js',
        'javascript-editor': '../src/assetbundles/seomatic/src/js/javascript-editor.js',
    },
    extensions: ['.ts', '.js', '.vue', '.json'],
    name: 'devMode.fm',
    paths: {
        dist: '../../src/assetbundles/seomatic/dist/',
    },
    urls: {
        publicPath: () => process.env.PUBLIC_PATH || '',
    },
};
