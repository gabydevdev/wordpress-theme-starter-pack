<?php
/**
 * Register custom blocks
 */

add_action('init', 'wptsp_register_blocks');

function wptsp_register_blocks() {
    // Check if register_block_type exists (WP 5.0+)
    if (!function_exists('register_block_type')) {
        return;
    }

    // Register blocks in the theme
    $blocks = array(
        'card',
        'hero',
        'testimonial',
        'cta',
        'team-grid'
    );

    foreach ($blocks as $block) {
        register_block_type(
            get_template_directory() . '/blocks/' . $block
        );
    }

    // Register block categories
    add_filter('block_categories_all', function($categories, $post) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'wptsp-blocks',
                    'title' => __('WP Theme Starter Pack', 'wptsp'),
                    'icon' => 'wordpress'
                )
            )
        );
    }, 10, 2);
}
