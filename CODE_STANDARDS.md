# Code Standards for WPTSP

This document outlines the coding standards we adhere to in the `wptsp` WordPress theme starter pack. Following these standards ensures consistency, readability, and maintainability across the codebase.

## Table of Contents

1.  [General Principles](#general-principles)
2.  [PHP](#php)
3.  [JavaScript](#javascript)
4.  [SCSS](#scss)
5.  [HTML](#html)
6.  [WordPress Specific](#wordpress-specific)
7.  [Naming Conventions](#naming-conventions)
8.  [Version Control](#version-control)

## 1. General Principles

- **Consistency:** Be consistent with the existing code style. If code in a file follows a certain pattern, continue that pattern.
- **Readability:** Write code that is easy to understand. Use meaningful variable and function names, comments when necessary, and proper indentation.
- **Maintainability:** Structure your code in a way that makes it easy to modify and extend in the future.
- **Performance:** Write efficient code that minimizes resource usage and maximizes performance.

## 2. PHP

- **WordPress Coding Standards:** Follow the [WordPress PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/).
- **Namespacing:** Use the `wptsp` prefix for all functions, classes, constants, and global variables to avoid naming conflicts.
- **Indentation:** Use tabs for indentation.
- **Quotes:** Use single quotes for strings unless there is a variable to be interpolated.
- **Spacing:**
  - Add one space after commas in argument lists.
  - Add one space before and after operators (=, +, -, etc.).
  - No trailing whitespace.
- **Comments:** Use PHPDoc-style comments for functions and classes.

  ```php
  /**
   * Description of the function.
   *
   * @param int    $id   The ID of the item.
   * @param string $name The name of the item.
   * @return string The formatted output.
   */
  function wptsp_format_item( $id, $name ) {
      //  ... code ...
  }
  ```

## 3. JavaScript

- **Modern JavaScript:** Use ES6+ syntax.
- **Modularity:** Organize JavaScript code into modules.
- **Indentation:** Use 2 spaces for indentation.
- **Semicolons:** Use semicolons.
- **Quotes:** Use single quotes.
- **Spacing:**
  - Add one space after commas in argument lists.
  - Add one space before and after operators (=, +, -, etc.).
- **Comments:** Use `//` for single-line comments and `/** */` for multi-line comments.

  ```javascript
  //  Single-line comment
  const wptspVariable = 'value';

  /**
   * Multi-line comment
   * describing a function.
   */
  function wptspFunction() {
    //  ... code ...
  }
  ```

## 4. SCSS

- **7-1 Pattern:** Structure SCSS files using the 7-1 pattern (base, layout, components, pages, themes, abstracts, vendor).
- **BEM Naming:** Use the Block Element Modifier (BEM) naming convention for CSS classes.
- **Indentation:** Use 2 spaces for indentation.
- **Semicolons:** Use semicolons.
- **Quotes:** Use double quotes.
- **Spacing:**
  - Add one space after commas in argument lists.
  - Add one space after the colon in property declarations.
- **Comments:** Use `//` for single-line comments and `/* */` for multi-line comments.

  ```scss
  //  Block
  .wptsp-button {
    //  Element
    &__icon {
      //  Modifier
      &--primary {
        color: $wptsp-primary-color;
      }
    }
  }
  ```

## 5. HTML

- **HTML5:** Use HTML5 semantic elements.
- **Accessibility:** Write accessible HTML. Use appropriate tags for content structure.
- **Indentation:** Use tabs for indentation.
- **Quotes:** Use double quotes for attributes.

  ```html
  <div class="wptsp-container">
    <h1 class="wptsp-heading">Title</h1>
    <p class="wptsp-text">Content</p>
  </div>
  ```

## 6. WordPress Specific

- **Prefixing:** Use the `wptsp_` prefix for all WordPress functions (e.g., `wptsp_register_cpt`), hooks (e.g., `wptsp_action_hook`), and text domains.
- **Text Domain:** Use `wptsp` as the text domain for all translatable strings.
- **Escaping:** Escape all output using appropriate WordPress escaping functions (e.g., `esc_html()`, `esc_attr()`, `esc_url()`).
- **Nonce Verification:** Use nonces for form submissions to prevent CSRF attacks.

## 7. Naming Conventions

- **Functions:** `wptsp_function_name()`
- **Classes:** `Wptsp_Class_Name`
- **Variables:** `$wptsp_variable_name`
- **Constants:** `WTSPT_CONSTANT_NAME`
- **CSS Classes:** `wptsp-block-element-modifier`
- **File Names:** `file-name.php`, `file-name.js`, `file-name.scss`

## 8. Version Control

- **Git:** Use Git for version control.
- **Branching:** Follow a logical branching strategy (e.g., `main`, `develop`, `feature/*`, `bugfix/*`).
- **Commits:** Write clear and concise commit messages.
- **Pull Requests:** Use pull requests for code reviews.

By adhering to these code standards, we can ensure a consistent, clean, and maintainable codebase.
