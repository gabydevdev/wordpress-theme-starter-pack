# WordPress Theme Starter Pack

A modern WordPress theme development starter pack with Webpack, SCSS, Bootstrap, and advanced development tooling.

## Features

- 🎯 Modern JavaScript with Webpack bundling
- 💅 SCSS preprocessing with modern CSS features
- 🥾 Bootstrap 5 integration
- 🧰 Advanced Custom Fields (ACF) support
- 🔧 Comprehensive development tooling
- 📱 Responsive design ready
- 🎨 Code formatting with Prettier
- 🔍 ESLint and Stylelint integration

## Prerequisites

Before you begin, ensure you have the following installed:
- [Node.js](https://nodejs.org/) (v16 or higher)
- [npm](https://www.npmjs.com/) (v8 or higher)
- [WordPress](https://wordpress.org/) (v6.0 or higher)
- [Advanced Custom Fields PRO](https://www.advancedcustomfields.com/pro/) plugin

## Getting Started

1. Clone this theme into your WordPress themes directory:
   ```bash
   cd wp-content/themes
   git clone [repository-url] wptsp
   cd wptsp
   ```

2. Install dependencies:
   ```bash
   npm install
   ```

3. Start development:
   ```bash
   npm run dev
   ```

4. For production build:
   ```bash
   npm run build
   ```

## Development Commands

- `npm run dev` - Start development with live reloading
- `npm run build` - Create production-ready assets
- `npm run lint:js` - Lint JavaScript files
- `npm run lint:scss` - Lint SCSS files
- `npm run format` - Format all code files
- `npm run format:check` - Check code formatting

## Project Structure

```
wptsp/
├── assets/
│   ├── css/          # Compiled CSS files
│   ├── js/
│   │   └── src/      # JavaScript source files
│   └── scss/         # SCSS source files
├── inc/              # Theme PHP includes
├── template-parts/   # Reusable template parts
└── [other theme files]
```

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
