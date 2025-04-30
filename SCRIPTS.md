# WordPress Theme Starter Pack - Scripts Documentation

This document provides detailed information about all the Node.js scripts available in this theme, their purposes, and how to use them effectively.

## Table of Contents

- [Development Scripts](#development-scripts)
  - [npm run dev](#npm-run-dev)
  - [npm run build](#npm-run-build)
- [Code Quality Scripts](#code-quality-scripts)
  - [npm run format](#npm-run-format)
  - [npm run lint:js](#npm-run-lintjs)
  - [npm run lint:js:fix](#npm-run-lintjsfix)
  - [npm run lint:css](#npm-run-lintcss)
  - [npm run lint:css:fix](#npm-run-lintcssfix)
- [Distribution Scripts](#distribution-scripts)
  - [npm run zip](#npm-run-zip)
  - [npm run version](#npm-run-version)
- [Maintenance Scripts](#maintenance-scripts)
  - [npm run packages-update](#npm-run-packages-update)
  - [npm run generate-pot](#npm-run-generate-pot)
- [Gulp Tasks](#gulp-tasks)
- [Configuration Files](#configuration-files)
- [Environment Variables](#environment-variables)
- [Best Practices](#best-practices)

## Development Scripts

### `npm run dev`

```bash
wp-scripts start --webpack-src-dir=assets/js/src --config=./config/webpack.config.js & gulp watch
```

- **Purpose**: Starts the development environment with live reload
- **What it does**:
  - Runs Webpack in watch mode for JavaScript/SCSS compilation
  - Starts BrowserSync for live reload
  - Watches for file changes
  - Automatically compiles SCSS to CSS
  - Bundles JavaScript modules
  - Optimizes images on the fly
- **When to use**: During active development
- **Configuration files**:
  - `config/webpack.config.js`
  - `gulpfile.js`

### `npm run build`

```bash
wp-scripts build --webpack-src-dir=assets/js/src --config=./config/webpack.config.js && gulp build
```

- **Purpose**: Creates production-ready assets
- **What it does**:
  - Compiles and minifies JavaScript
  - Compiles and optimizes SCSS to CSS
  - Optimizes images
  - Creates sourcemaps
  - Applies production optimizations
- **When to use**: Before deploying to production
- **Output**: Optimized assets in their respective directories

## Code Quality Scripts

### `npm run format`

```bash
wp-scripts format
```

- **Purpose**: Formats code according to WordPress coding standards
- **What it does**:
  - Formats JavaScript files
  - Formats SCSS files
  - Maintains consistent code style
- **When to use**: Before committing code changes

### `npm run lint:js`

```bash
wp-scripts lint-js
```

- **Purpose**: Checks JavaScript code for errors and style issues
- **What it does**:
  - Runs ESLint with WordPress configuration
  - Reports JavaScript code issues
- **When to use**: During development and before commits

### `npm run lint:js:fix`

```bash
wp-scripts lint-js --fix
```

- **Purpose**: Automatically fixes JavaScript code style issues
- **What it does**:
  - Runs ESLint with --fix option
  - Automatically corrects fixable issues
- **When to use**: When lint:js reports fixable issues

### `npm run lint:css`

```bash
wp-scripts lint-style
```

- **Purpose**: Checks SCSS/CSS code for errors and style issues
- **What it does**:
  - Runs Stylelint with WordPress configuration
  - Reports SCSS/CSS code issues
- **When to use**: During development and before commits

### `npm run lint:css:fix`

```bash
wp-scripts lint-style --fix
```

- **Purpose**: Automatically fixes SCSS/CSS code style issues
- **What it does**:
  - Runs Stylelint with --fix option
  - Automatically corrects fixable issues
- **When to use**: When lint:css reports fixable issues

## Distribution Scripts

### `npm run zip`

```bash
gulp zip
```

- **Purpose**: Creates a distributable ZIP archive of the theme
- **What it does**:
  - Excludes development files (node_modules, source files, etc.)
  - Includes only production-necessary files
  - Names the ZIP file with theme name and version
- **When to use**: When preparing the theme for distribution
- **Output**: `wptsp-{version}.zip` in the root directory

### `npm run version`

```bash
gulp version-sync && conventional-changelog -p angular -i CHANGELOG.md -s && git add . && git commit -m 'chore: version bump'
```

- **Purpose**: Updates theme version across all necessary files
- **What it does**:
  - Syncs version in style.css and theme.json
  - Updates CHANGELOG.md with new changes
  - Creates a version commit
- **When to use**: When releasing a new version

## Maintenance Scripts

### `npm run packages-update`

```bash
wp-scripts packages-update
```

- **Purpose**: Updates WordPress npm packages
- **What it does**:
  - Checks for updates to @wordpress/\* packages
  - Updates package.json
  - Updates package-lock.json
- **When to use**: Periodically to keep dependencies updated

### `npm run generate-pot`

```bash
wp i18n make-pot . languages/theme-textdomain.pot --exclude=vendor,node_modules
```

- **Purpose**: Generates translation template file
- **What it does**:
  - Scans theme files for translatable strings
  - Creates/updates POT file
  - Excludes vendor and node_modules directories
- **When to use**: When adding/modifying translatable strings

## Gulp Tasks

The theme uses Gulp for various build and optimization tasks. These tasks are integrated into the npm scripts above but can also be run individually using gulp:

- `gulp images` - Optimize images
- `gulp zip` - Create theme ZIP file
- `gulp version-sync` - Sync version across theme files
- `gulp watch` - Watch for file changes
- `gulp browserSync` - Start BrowserSync server
- `gulp build` - Run production build tasks

## Configuration Files

- **Webpack**: `config/webpack.config.js`

  - Entry points configuration
  - Output settings
  - Alias definitions
  - Build optimizations

- **Babel**: `.babelrc.js`

  - JavaScript transpilation settings
  - WordPress preset configuration

- **Gulp**: `gulpfile.js`
  - Task definitions
  - File paths
  - Build process configuration

## Environment Variables

- `WP_HOME`: WordPress installation URL (default: "http://localhost:10000")
  - Used by BrowserSync for local development
  - Can be set in `.env` file

## Best Practices

1. **Development Workflow**:

   - Always run `npm run dev` during development
   - Use linting commands before committing
   - Run `npm run build` before testing production builds

2. **Version Control**:

   - Run format and lint commands before commits
   - Use `npm run version` for version bumps
   - Generate POT files when adding strings

3. **Production Deployment**:

   1. Update version number in package.json
   2. Run `npm run version`
   3. Run `npm run build`
   4. Run `npm run zip`
   5. Test the generated ZIP file

4. **Maintenance**:
   - Regularly run `npm run packages-update`
   - Keep dependencies updated
   - Maintain changelog entries
