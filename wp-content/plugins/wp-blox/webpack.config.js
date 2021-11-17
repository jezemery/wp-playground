/* eslint-disable no-undef */
const path = require('path');
const glob = require('glob');
const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin');
const ESLintPlugin = require('eslint-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const isProduction = process.env.NODE_ENV === 'production';
const mode = isProduction ? 'production' : 'development';

module.exports = {
    mode,
    entry: glob
        .sync('./src/Blocks/**/js/block.jsx')
        .reduce(
            (obj, el) => {
                let name = path.dirname(el);
                name = name.split('/');
                name = name.find(elem => elem.includes('Block') === true && elem.includes('Blocks') === false);
                obj[name + '/dist/block.dist.js'] = el;
                return obj;
            }, {}
        ),
    resolve: {
        extensions: ['.js', '.jsx'],
    },
    plugins: [
        new ESLintPlugin(),
        new DependencyExtractionWebpackPlugin({}),
        new MiniCssExtractPlugin({
            filename: ({chunk: {name}}) => {
                return name.replace('js', 'css');
            }
        }),
    ],
    output: {
        path: __dirname + '/src/Blocks/',
        filename: '[name]',
    },
    externals: {
        wp: 'wp',
        react: 'React',
        'react-dom': 'ReactDOM',
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                },
            },
            {
                test: /\.jsx$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                },
            },
            {
                test: /\.(scss|css)$/,
                use: ['style-loader', 'css-loader', 'sass-loader'],
            },
            {
                test: /block\.scss$/,
                use: [{
                    loader: MiniCssExtractPlugin.loader
                }, "css-loader", 'sass-loader'],
            },
            {
                test: /\.svg$/,
                use: [
                    {
                        loader: 'svg-url-loader',
                        options: {
                            limit: 10000,
                            encoding: 'base64',
                        },
                    },
                ],
            },
        ],
    },
};
