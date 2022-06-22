// app.settings.js

// node modules
require('dotenv').config();
const path = require('path');

// settings
module.exports = {
  alias: {
    '@': path.resolve('../src/assetbundles/seomatic/src'),
  },
  copyright: '©2020 nystudio107.com',
  entry: {
    'dashboard': '@/js/dashboard.js',
    'content-seo': '@/js/content-seo.js',
    'seomatic': '@/js/seomatic.js',
    'seomatic-meta': '@/js/seomatic-meta.js',
  },
  extensions: ['.ts', '.js', '.vue', '.json'],
  name: 'seomatic',
  paths: {
    dist: path.resolve('../src/assetbundles/seomatic/dist/'),
  },
  urls: {
    publicPath: () => process.env.PUBLIC_PATH || '',
  },
};
