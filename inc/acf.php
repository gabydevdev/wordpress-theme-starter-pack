<?php
/**
 * Advanced Custom Fields setup and configuration
 */

if (class_exists('ACF')) {
    // Register field groups from JSON
    $field_groups = json_decode(file_get_contents(__DIR__ . '/acf-field-groups.json'), true);
    foreach ($field_groups as $field_group) {
        acf_add_local_field_group($field_group);
    }

    // Check if ACF Pro is active
    if (function_exists('acf_get_setting') && acf_get_setting('pro')) {
        // Add ACF options page
        if (function_exists('acf_add_options_page')) {
            // Main Options Page
            acf_add_options_page(array(
                'page_title' => 'Theme Options',
                'menu_title' => 'Theme Options',
                'menu_slug'  => 'theme-options',
                'capability' => 'edit_theme_options',
                'redirect'   => true
            ));
        }
    }
} else {
    // Add admin notice if ACF is not active
    add_action('admin_notices', function() {
        echo '<div class="notice notice-error">';
        echo '<p>Advanced Custom Fields plugin is required for this theme. Please install and activate it.</p>';
        echo '</div>';
    });
}
