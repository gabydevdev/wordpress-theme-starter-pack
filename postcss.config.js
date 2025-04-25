module.exports = {
  plugins: [
    require('postcss-import'),
    require('postcss-preset-env')({
      stage: 1,
      features: {
        'custom-properties': true,
        'nesting-rules': true,
        'color-mod-function': true,
        'custom-media-queries': true
      },
      autoprefixer: {
        grid: true
      }
    }),
    require('postcss-nested'),
    ...(process.env.NODE_ENV === 'production' ? [require('cssnano')] : [])
  ]
};