<?php
/**
 * Register Custom Post Types
 */

add_action('init', 'wptsp_register_custom_post_types');

function wptsp_register_custom_post_types() {
    // Team Members CPT
    register_post_type('team', array(
        'labels' => array(
            'name' => __('Team Members', 'wptsp'),
            'singular_name' => __('Team Member', 'wptsp')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'team'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-groups',
        'show_in_rest' => true
    ));

    // Videos CPT
    register_post_type('video', array(
        'labels' => array(
            'name' => __('Videos', 'wptsp'),
            'singular_name' => __('Video', 'wptsp')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'videos'),
        'supports' => array('title', 'editor', 'thumbnail', 'comments'),
        'menu_icon' => 'dashicons-video-alt3',
        'show_in_rest' => true
    ));

    // Testimonials CPT
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonials', 'wptsp'),
            'singular_name' => __('Testimonial', 'wptsp')
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'testimonial'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-testimonial',
        'show_in_rest' => true
    ));
}
