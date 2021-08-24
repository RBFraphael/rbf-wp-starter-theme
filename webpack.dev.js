const webpack = require('webpack');
const path = require('path');

const config = {
  entry: './src/js/theme.js',
  output: {
    path: path.resolve(__dirname, 'cache'),
    filename: 'release.js'
  },
  mode: 'development',
  module: {
    rules: [
      {
        test: /\.js$/,
        use: 'babel-loader',
        exclude: /node_modules/
      }
    ]
  }
};

module.exports = config;