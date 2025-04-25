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
            isDevelopment ? 'style-loader' : MiniCssExtractPlugin.loader,
            {
              loader: 'css-loader',
              options: {
                sourceMap: isDevelopment,
                importLoaders: 2
              }
            },
            {
              loader: 'postcss-loader',
              options: {
                sourceMap: isDevelopment,
                postcssOptions: {
                  plugins: [
                    require('autoprefixer'),
                    require('postcss-preset-env')({
                      stage: 3,
                      features: {
                        'nesting-rules': true
                      }
                    })
                  ]
                }
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
        filename: '../css/[name].css'
      }),
      new BrowserSyncPlugin({
        proxy: process.env.WP_HOME || 'http://localhost:10000', // Use environment variable or default
        files: [
          './**/*.php',
          './assets/js/dist/*.js',
          './assets/css/*.css'
        ],
        injectChanges: true,
        notify: false,
        open: false
      })
    ],
    optimization: {
      minimizer: [
        new TerserPlugin({
          extractComments: false,
          terserOptions: {
            format: {
              comments: false
            }
          }
        })
      ]
    },
    devtool: isDevelopment ? 'eval-source-map' : false,
    stats: {
      children: false,
      modules: false
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
