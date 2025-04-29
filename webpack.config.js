const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const TerserPlugin = require("terser-webpack-plugin");

module.exports = (env, argv) => {
  const isDevelopment = argv.mode === "development";

  return {
    entry: {
      main: "./assets/js/src/main.js",
      editor: "./assets/js/src/editor.js",
      blocks: "./assets/js/src/blocks.js",
    },
    output: {
      filename: "[name].bundle.js",
      path: path.resolve(__dirname, "assets/js/dist"),
      clean: true,
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: "babel-loader",
            options: {
              presets: ["@babel/preset-env"],
              // Add support for WordPress JSX
              plugins: [
                "@wordpress/babel-plugin-import-jsx-pragma",
                "@babel/plugin-transform-react-jsx",
              ],
            },
          },
        },
        {
          test: /\.scss$/,
          use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
        },
        {
          test: /\.(woff|woff2|eot|ttf|otf)$/,
          type: "asset/resource",
          generator: {
            filename: "../fonts/[name][ext]",
          },
        },
        {
          test: /\.(png|svg|jpg|jpeg|gif)$/i,
          type: "asset/resource",
          generator: {
            filename: "../images/[name][ext]",
          },
        },
      ],
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: "../css/[name].css",
      }),
    ],
    optimization: {
      minimizer: [
        new TerserPlugin({
          extractComments: false,
          terserOptions: {
            format: {
              comments: false,
            },
          },
        }),
      ],
    },
    devServer: {
      static: {
        directory: path.join(__dirname, "dist"),
      },
      compress: true,
      port: 3000,
      hot: true,
      proxy: {
        "/": "http://localhost:8000", // Proxy to your local WordPress server
      },
    },
    devtool: isDevelopment ? "eval-source-map" : "source-map",
    stats: {
      children: false,
      modules: false,
    },
    // Add support for WordPress externals
    externals: {
      "@wordpress/blocks": "wp.blocks",
      "@wordpress/components": "wp.components",
      "@wordpress/element": "wp.element",
      "@wordpress/editor": "wp.editor",
      "@wordpress/data": "wp.data",
      "@wordpress/api-fetch": "wp.apiFetch",
    },
  };
};
