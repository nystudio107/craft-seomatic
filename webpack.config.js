var path = require('path')
var webpack = require('webpack')

const ExtractTextPlugin = require('extract-text-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

const assetBundleRoot = './src/assetbundles/seomatic';
const inProduction = process.env.NODE_ENV === 'production';

module.exports = {
    entry: {
        'vendor': ['brace', 'brace/theme/github'],
        'seomatic': [
            path.resolve(assetBundleRoot, './src/js/seomatic.js'),
            path.resolve(assetBundleRoot, './src/js/twig-editor.js'),
            path.resolve(assetBundleRoot, './src/js/javascript-editor.js'),
        ],
        'seomatic-chart': [
            path.resolve(assetBundleRoot, './src/js/seomatic-chart.js'),
        ]
    },
    output: {
        path: path.resolve(__dirname, assetBundleRoot + '/dist'),
        publicPath: assetBundleRoot,
        filename: path.join('./js', '[name].js')
    },
    module: {
        rules: [
            {
                test: /bootstrap-tokenfield[\/\\]js[\/\\]bootstrap-tokenfield.js$/,
                loader: "imports-loader?define=>false"
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    loaders: {}
                    // other vue-loader options go here
                }
            },
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: /node_modules/
            },
            {
                test: /\.s[ac]ss$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: ['css-loader', 'sass-loader'],
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                url: false
                            }
                        }
                    ]
                }),
                exclude: /node_modules/
            },
            {
                test: /\.css$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                url: false
                            }
                        }
                    ]
                })
            },
            {
                test: /\.(png|jpe?g|gif|svg)$/,
                loader: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: path.join('./img', '[name].[ext]')
                        }
                    },
                    'img-loader'
                ]
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin({
            filename: path.join('./css', '[name].css'),
            allChunks: true,
        }),
        new webpack.LoaderOptionsPlugin({
            minimize: inProduction
        }),
        new CleanWebpackPlugin(['dist'], {
            root: path.resolve(__dirname, assetBundleRoot),
            verbose: true,
            dry: false,
            watch: inProduction
        }),
        new ManifestPlugin(),
        new webpack.optimize.CommonsChunkPlugin({
            names: ['vendor'],
            minChunks: 2
        })
    ],
    resolve: {
        alias: {
            'billboard.css': path.resolve(__dirname,'./node_modules/billboard.js/dist/billboard.css')
        }
    },
    devServer: {
        historyApiFallback: true,
        noInfo: true
    },
    performance: {
        hints: false
    },
    devtool: '#eval-source-map'
}

if (inProduction) {
    module.exports.devtool = '#source-map'
    // http://vue-loader.vuejs.org/en/workflow/production.html
    module.exports.plugins = (module.exports.plugins || []).concat([
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: '"production"'
            }
        }),
        new webpack.optimize.UglifyJsPlugin({
            sourceMap: true,
            compress: {
                warnings: false
            }
        }),
    ])
}
