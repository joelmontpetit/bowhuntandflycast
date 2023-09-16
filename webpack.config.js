const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
var path = require('path');

// change these variables to fit your project
const jsPath= './src/js';
const cssPath = './src/style';
const outputPath = 'dist';
const localDomain = 'http://localhost/bowhuntandflycast/';
const entryPoints = {
    // 'app' is the output name, people commonly use 'bundle'
    // you can have more than 1 entry point
    'main': jsPath + '/index.js',
    'style': cssPath + '/main.scss'
};

//Read environment variables from Node.js
const webpack = require('webpack')
const dotenv = require('dotenv').config({ path: __dirname + '/.env' })

module.exports = {
    entry: entryPoints,
    output: {
        path: path.resolve(__dirname, outputPath),
        filename: '[name].js',
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),

        //Read environment variables from Node.js
        new webpack.DefinePlugin({
            'process.env': JSON.stringify(dotenv.parsed),
        }),

        // Uncomment this if you want to use CSS Live reload
        new BrowserSyncPlugin({
                proxy: localDomain,
                files: [
                    outputPath + '/*.css',
                    outputPath + '/*.js',
                    //'src/images/**/*',
                    './**/*.php'
                ],
                injectCss: true,
            },
            // plugin options
            {
                // prevent BrowserSync from reloading the page
                // and let Webpack Dev Server take care of this
                reload: false
            }
        ),
    ],
    module: {
        rules: [
            {
                test: /\.s?[c]ss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader'
                ]
            },
            {
                test: /\.sass$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'sass-loader',
                        options: {
                            sassOptions: { indentedSyntax: true }
                        }
                    }
                ]
            },
            {
                test: /\.(jpe?g|png|gif|svg)$/i,
                exclude: /fonts/,
                use: [
                    {
                        loader: 'url-loader',
                        options: {
                            limit: 5120,
                            name: 'images/[name].[ext]'
                        }
                    }
                    /*,
                    {
                      loader: ImageminPlugin.loader
                    }*/
                ]
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf|svg)$/,
                exclude: /images/,
                use: [
                    {
                        loader: 'url-loader',
                        options: {
                            limit: 5120,
                            name: 'fonts/[name].[ext]'
                        }
                    }
                ]
            }
        ]
    },
};