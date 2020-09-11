/* eslint-disable */
const webpack = require('webpack');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
const WebpackShellPlugin = require('webpack-shell-plugin');
const path = require('path');
const autoprefixer = require('autoprefixer');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const globImporter = require('node-sass-glob-importer');
const {CleanWebpackPlugin} = require("clean-webpack-plugin");

module.exports = {
  entry: {
    babel: "babel-polyfill",
    app: "./src/js/app.js",
    vendor: "./src/js/vendor.js",
    styles: "./src/scss/styles.scss",
  },
  devtool: "source-map",
  output: {
    path: path.resolve(__dirname, "dist/"),
    filename: "[name].bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader", //2. Turns css into commonjs
          {
            loader: "postcss-loader",
            options: {
              plugins: () => [autoprefixer()],
            },
          },
          {
            loader: "sass-loader", //1. Turns sass into css
            options: {
              importer: globImporter(),
            },
          },
        ],
      },
      {
        test: /\.jsx$/,
        use: [
          {
            loader: "babel-loader",
            query: {
              presets: ["@babel/preset-env", "@babel/preset-react"],
              plugins: [
                "babel-plugin-transform-class-properties",
                "babel-plugin-transform-es2015-arrow-functions",
                "babel-plugin-transform-object-assign",
                "babel-plugin-transform-object-rest-spread",
              ],
            },
          },
        ],
      },
      {
        test: /\.js$/,
        exclude: [path.resolve(__dirname, "node_modules")],
        use: [
          {
            loader: "babel-loader",
            query: {
              presets: ["@babel/preset-env"],
            },
          },
        ],
      },
      {
        test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        use: [
          {
            loader: "url-loader?limit=10000&mimetype=application/font-woff",
            options: {
              name: "[name].[hash].[ext]",
              outputPath: "fonts",
            },
          },
        ],
      },
      {
        test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[hash].[ext]",
              outputPath: "fonts",
            },
          },
        ],
      },
      {
        test: /\.jsx$/,
        exclude: /node_modules/,
        loader: "eslint-loader",
        options: {
          configFile: ".eslintrc",
        },
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/i,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[hash].[ext]",
              outputPath: "imgs",
            },
          },
        ],
      },
    ],
  },
  plugins: [
    new webpack.ProvidePlugin({
      "window.jQuery": "jquery",
      $: "jquery",
      jQuery: "jquery",
    }),
    new MiniCssExtractPlugin({
      filename: "styles.css",
    }),
    new CopyWebpackPlugin(
      {
        patterns: [
          {
            from: "assets/**/*",
            transformPath(targetPath, absolutePath) {
              return targetPath.substr("assets/".length);
            },
          },
        ],
      },
      {
        debug: "info",
      }
    ),
    new SVGSpritemapPlugin("./icons/*.svg", { styles: "~sprites.scss" }),
    new WebpackShellPlugin({
      onBuildStart: ["npm run lint-style"],
      dev: false,
    }),
    new CleanWebpackPlugin(),
  ],
};