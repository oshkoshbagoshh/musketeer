const defaultConfig = require("@wordpress/scripts/config/webpack.config");

module.exports = {
  ...defaultConfig,
  entry: {
    main: './src/js/index.js',
    // Add more entry points if needed
  },
  output: {
    filename: '[name].js',
    path: __dirname + '/build',
  },
};