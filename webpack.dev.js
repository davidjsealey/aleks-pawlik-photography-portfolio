/* eslint-disable */
const common = require('./webpack.config');
const { merge } = require('webpack-merge');

module.exports = merge(common, {
  mode: "development",
  // output: {
  //   filename: "[name].bundle.js",
  //   path: path.resolve(__dirname, "dist"),
  // }
});