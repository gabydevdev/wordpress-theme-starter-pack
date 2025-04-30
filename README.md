# WordPress Theme Starter Pack

A modern WordPress theme development starter pack with Webpack, SCSS, Bootstrap, and advanced development tooling.

## Features

- 🎯 Modern JavaScript with Webpack bundling
- 💅 SCSS preprocessing with modern CSS features
- 🥾 Bootstrap 5 integration
- 🧰 Advanced Custom Fields (ACF) support with pre-configured field groups
- 🔧 Comprehensive development tooling
- 📱 Responsive design ready
- 🎨 Code formatting with Prettier
- 🔍 ESLint and Stylelint integration
- 🌐 Multilingual ready with .pot file
- 🎯 Flexible content blocks system
- 🔄 WP-Env support for local development

## Prerequisites

Before you begin, ensure you have the following installed:

- [Node.js](https://nodejs.org/) (v18 or higher)
- [npm](https://www.npmjs.com/) (v9 or higher)
- [WordPress](https://wordpress.org/) (v6.4 or higher)
- [Advanced Custom Fields PRO](https://www.advancedcustomfields.com/pro/) plugin
- [Composer](https://getcomposer.org/) for PHP dependencies

## Getting Started

1. Clone this theme into your WordPress themes directory:

   ```bash
   cd wp-content/themes
   git clone https://github.com/your-username/wptsp.git
   cd wptsp
   ```

2. Install dependencies:

   ```bash
   composer install
   npm install
   ```

3. Set up local development environment:

   ```bash
   npm run wp-env start
   ```

4. Start development:

   ```bash
   npm run dev
   ```

5. For production build:
   ```bash
   npm run build
   ```

## Development Commands

- `npm run dev` - Start development with Webpack and Gulp watch
- `npm run build` - Create production-ready assets with Webpack and Gulp
- `npm run format` - Format code using WordPress scripts
- `npm run lint:js` - Lint JavaScript files
- `npm run lint:js:fix` - Fix JavaScript linting issues automatically
- `npm run lint:css` - Lint style files
- `npm run lint:css:fix` - Fix style linting issues automatically
- `npm run zip` - Create a ZIP archive of the theme
- `npm run version` - Update version, generate changelog, and commit changes
- `npm run packages-update` - Update WordPress packages
- `npm run generate-pot` - Generate translation template file

## Project Structure

```
wptsp/
├── assets/                    # Theme assets
│   ├── css/                   # Compiled CSS files (auto-generated)
│   ├── fonts/                 # Custom web fonts
│   ├── images/                # Theme images and icons
│   │   └── icons/             # SVG icons and small graphics
│   ├── js/
│   │   └── src/               # JavaScript source files
│   └── scss/                  # SCSS source files (7-1 pattern)
│       ├── blocks/            # Block-specific styles
│       ├── components/        # Reusable component styles
│       ├── _variables.scss    # Global variables
│       ├── _mixins.scss       # Custom mixins
│       ├── editor.scss        # Gutenberg editor styles
│       └── main.scss          # Main stylesheet
├── build/                     # Production build files
├── config/                    # Build configuration
│   └── webpack.config.js      # Webpack configuration
├── inc/                       # PHP includes
│   ├── acf-field-groups.json  # ACF field configurations
│   ├── acf.php                # ACF setup and functions
│   ├── blocks.php             # Block registration and rendering
│   ├── cpts.php               # Custom Post Types
│   └── template-functions.php # Theme functions
├── languages/                 # Internationalization
├── template-parts/            # Template partials
│   ├── content/               # Post type templates
│   ├── flexible/              # ACF flexible content blocks
│   ├── header-options.php
│   └── footer-options.php
├── composer.json              # PHP dependencies
├── functions.php              # Theme functions and setup
├── gulpfile.js                # Build automation tasks
├── package.json               # Node.js dependencies
├── style.css                  # Theme metadata
├── theme.json                 # Theme settings and configuration
└── wp-env.json                # Local development environment
```

Note: The `css/` directory and build files are auto-generated. Never edit them directly; modify the source files in `scss/` and `js/src/` instead.

## Development Workflow

1. SCSS files are organized in the `assets/scss/` directory:

   - Component styles in `components/`
   - Block styles in `blocks/`
   - Global styles and variables in root directory

2. JavaScript files are in `assets/js/src/`:

   - Entry point is `main.js`
   - Uses ES6+ features (transpiled by Babel)

3. Template structure:
   - Block templates in `template-parts/flexible/`
   - Content templates in `template-parts/content/`
   - Header/footer options in `template-parts/`

## Code Standards

- JavaScript follows ESLint rules with WordPress coding standards
- SCSS follows Stylelint rules with standard SCSS config
- PHP follows WordPress coding standards
- All code is formatted using Prettier

## ACF Blocks

The theme includes pre-built ACF blocks:

- Hero section
- Cards grid
- CTA (Call to Action)
- Text block
- Video embed

To create new blocks, add templates to `template-parts/flexible/` and register them in `inc/blocks.php`.

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
