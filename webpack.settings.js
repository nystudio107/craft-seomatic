// webpack.settings.js - webpack settings config

// node modules
require('dotenv').config();

// Webpack settings exports
// noinspection WebpackConfigHighlighting
module.exports = {
    name: "SEOmatic",
    copyright: "nystudio107",
    paths: {
        src: {
            base: "./src/assetbundles/seomatic/src/",
            css: "./src/assetbundles/seomatic/src/css/",
            js: "./src/assetbundles/seomatic/src/js/"
        },
        dist: {
            base: "./src/assetbundles/seomatic/dist/",
            clean: [
                '**/*'
            ]
        },
        templates: "./src/templates/"
    },
    urls: {
        publicPath: () => process.env.PUBLIC_PATH || "",
    },
    vars: {
        cssName: "styles"
    },
    entries: {
        "dashboard": "dashboard.js",
        "seomatic": "seomatic.js",
        "seomatic-meta": "seomatic-meta.js",
        "twig-editor": "twig-editor.js",
        "javascript-editor": "javascript-editor.js",
    },
    babelLoaderConfig: {
        exclude: [
            /(node_modules|bower_components)/
        ],
    },
    copyWebpackConfig: [
    ],
    devServerConfig: {
        public: () => process.env.DEVSERVER_PUBLIC || "http://localhost:8080",
        host: () => process.env.DEVSERVER_HOST || "localhost",
        poll: () => process.env.DEVSERVER_POLL || false,
        port: () => process.env.DEVSERVER_PORT || 8080,
        https: () => process.env.DEVSERVER_HTTPS || false,
    },
    manifestConfig: {
        basePath: ""
    },
    purgeCssConfig: {
        paths: [
            "./src/templates/**/*.{twig,html}",
            "./src/assetbundles/seomatic/src/vue/**/*.{vue,html}"
        ],
        whitelist: [
            "./src/assetbundles/seomatic/src/css/components/**/*.{css}",
            "./node_modules/bootstrap-tokenfield/dist/css/bootstrap-tokenfield.css"
        ],
        whitelistPatterns: [],
        extensions: [
            "html",
            "js",
            "twig",
            "vue"
        ]
    },
    saveRemoteFileConfig: [
    ],
    createSymlinkConfig: [
    ],
};
