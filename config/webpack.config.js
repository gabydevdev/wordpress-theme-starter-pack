const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require("path");

module.exports = {
  ...defaultConfig,
  entry: {
    main: ["./assets/js/src/main.js", "./assets/scss/main.scss"],
    editor: ["./assets/js/src/editor.js"],
    blocks: "./assets/js/src/blocks.js",
  },
  output: {
    filename: "[name].bundle.js",
    path: path.resolve(process.cwd(), "assets/js/dist"),
  },
  resolve: {
    ...defaultConfig.resolve,
    alias: {
      ...defaultConfig.resolve?.alias,
      "@scss": path.resolve(process.cwd(), "assets/scss"),
      "@js": path.resolve(process.cwd(), "assets/js/src"),
    },
  },
};
