// monaco-editor.config.js
// returns a webpack config object for the monaco editor

// webpack plugins
const MonacoWebpackPlugin = require('monaco-editor-webpack-plugin');

// return a webpack config
module.exports = (type = 'modern', settings) => {
    // common config
    const common = () => ({
        plugins: [
            new MonacoWebpackPlugin(
            settings.monacoConfig,
            ),
        ],
    });
    // configs
    const configs = {
        // development configs
        development: {
            // legacy development config
            legacy: {
            },
            // modern development config
            modern: {
                ...common(),
            },
        },
        // production configs
        production: {
            // legacy production config
            legacy: {
                ...common(),
            },
            // modern production config
            modern: {
                ...common(),
            },
        }
    };

    return configs[process.env.NODE_ENV][type];
}
