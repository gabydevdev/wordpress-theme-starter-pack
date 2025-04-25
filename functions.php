<?php
/**
 * WordPress Theme Starter Pack functions and definitions
 *
 * @package WordPress Theme Starter Pack
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

// Include modular files
require_once __DIR__ . '/inc/acf.php';
require_once __DIR__ . '/inc/cpts.php';
require_once __DIR__ . '/inc/template-functions.php';
require_once __DIR__ . '/inc/blocks.php';
require_once __DIR__ . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function wptsp_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Register navigation menus.
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'wptsp'),
            'footer'  => esc_html__('Footer Menu', 'wptsp'),
        )
    );

    // Switch default core markup to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo.
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for responsive embedded content.
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'wptsp_setup');
