const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = (env, argv) => {
  const isDevelopment = argv.mode === 'development';

  return {
    entry: {
      main: './assets/js/src/main.js',
      editor: './assets/js/src/editor.js',
      blocks: './assets/js/src/blocks.js'
    },
    output: {
      filename: '[name].bundle.js',
      path: path.resolve(__dirname, 'assets/js/dist')
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env'],
              // Add support for WordPress JSX
              plugins: [
                '@wordpress/babel-plugin-import-jsx-pragma',
                '@babel/plugin-transform-react-jsx'
              ]
            }
          }
        },
        {
          test: /\.(sa|sc|c)ss$/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: 'css-loader',
              options: {
                sourceMap: isDevelopment
              }
            },
            {
              loader: 'postcss-loader',
              options: {
                sourceMap: isDevelopment
              }
            },
            {
              loader: 'sass-loader',
              options: {
                sourceMap: isDevelopment
              }
            }
          ]
        },
        {
          test: /\.(woff|woff2|eot|ttf|otf)$/,
          type: 'asset/resource',
          generator: {
            filename: '../fonts/[name][ext]'
          }
        },
        {
          test: /\.(png|svg|jpg|jpeg|gif)$/i,
          type: 'asset/resource',
          generator: {
            filename: '../images/[name][ext]'
          }
        }
      ]
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: '../../css/[name].css'
      }),
      new BrowserSyncPlugin({
        proxy: 'http://nanato-yellow.local', // Update this to match your local development URL
        files: [
          './**/*.php',
          './assets/js/dist/*.js',
          './assets/css/*.css'
        ],
        injectChanges: true,
        notify: false
      })
    ],
    optimization: {
      minimizer: [
        new TerserPlugin({
          extractComments: false
        })
      ]
    },
    devtool: isDevelopment ? 'source-map' : false,
    stats: {
      children: false
    },
    // Add support for WordPress externals
    externals: {
      '@wordpress/blocks': 'wp.blocks',
      '@wordpress/components': 'wp.components',
      '@wordpress/element': 'wp.element',
      '@wordpress/editor': 'wp.editor',
      '@wordpress/data': 'wp.data',
      '@wordpress/api-fetch': 'wp.apiFetch'
    }
  };
};
