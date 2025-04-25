module.exports = {
  root: true,
  env: {
    browser: true,
    jquery: true,
    es6: true,
  },
  extends: ['plugin:@wordpress/eslint-plugin/recommended', 'plugin:prettier/recommended'],
  parserOptions: {
    ecmaVersion: 2021,
    sourceType: 'module',
  },
  rules: {
    'no-console': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    'prettier/prettier': 'error',
  },
};
