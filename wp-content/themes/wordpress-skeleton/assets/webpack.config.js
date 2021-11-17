const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const WebpackAssetsManifest = require('webpack-assets-manifest');
const {CleanWebpackPlugin} = require("clean-webpack-plugin");

module.exports = {
  entry: [path.resolve(__dirname, './js/src/index.jsx'), path.resolve(__dirname, './styles/main.styl')],
  output: {
    path: path.join(__dirname, '/dist'),
    filename: '[name].[contenthash].min.js',
  },
  devServer: {
    contentBase: path.resolve(__dirname, './dist')
  },
  experiments: {
    asset: true
  },
  module: {
    rules: [
      {
        test: /\.svg$/,
        type: 'asset/inline'
      },
      {
        test: /\.(png|jpe?g|gif)$/i,
        use: ['file-loader']
      },
      {
        test: /\.(woff(2)?|ttf|eot)(\?v=\d+\.\d+\.\d+)?$/,
        use: [{loader: 'file-loader', options: {name: '[name].[ext]', outputPath: 'fonts/'}}],
      },
      {
        test: /\.styl$/,
        use: [MiniCssExtractPlugin.loader, {
          loader: "css-loader",
          options: {importLoaders: 1}
        }, "postcss-loader", "stylus-loader"]
      },
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: ['babel-loader', 'eslint-loader'],
      },
    ],
  },
  resolve: {
    extensions: ['*', '.js', '.jsx'],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].[contenthash].css"
    }),
    new CleanWebpackPlugin({
      verbose: true,
      cleanAfterEveryBuildPatterns: ['dist', '!dist/fonts/*']
    }),
    new WebpackAssetsManifest({})
  ],
};
