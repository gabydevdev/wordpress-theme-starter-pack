<?php
/**
 * Advanced Custom Fields setup and configuration
 */

if (class_exists('ACF')) {
    // Main Flexible Content Field Group
    acf_add_local_field_group(array(
        'key' => 'group_theme_flexible_content',
        'title' => 'Theme Flexible Content',
        'fields' => array(
            array(
                'key' => 'field_flexible_content',
                'label' => 'Content Sections',
                'name' => 'flexible_content',
                'type' => 'flexible_content',
                'layouts' => array(
                    // Hero Component
                    array(
                        'key' => 'layout_hero',
                        'name' => 'hero',
                        'label' => 'Hero Section',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_hero_title',
                                'label' => 'Title',
                                'name' => 'title',
                                'type' => 'text',
                                'required' => 1
                            ),
                            array(
                                'key' => 'field_hero_description',
                                'label' => 'Description',
                                'name' => 'description',
                                'type' => 'wysiwyg',
                                'toolbar' => 'basic',
                                'media_upload' => 0
                            ),
                            array(
                                'key' => 'field_hero_background',
                                'label' => 'Background Image',
                                'name' => 'background',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'required' => 1
                            ),
                            array(
                                'key' => 'field_hero_buttons',
                                'label' => 'Buttons',
                                'name' => 'buttons',
                                'type' => 'repeater',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_hero_button_link',
                                        'label' => 'Button Link',
                                        'name' => 'link',
                                        'type' => 'link',
                                        'required' => 1
                                    ),
                                    array(
                                        'key' => 'field_hero_button_style',
                                        'label' => 'Button Style',
                                        'name' => 'style',
                                        'type' => 'select',
                                        'choices' => array(
                                            'primary' => 'Primary',
                                            'secondary' => 'Secondary',
                                            'outline' => 'Outline'
                                        ),
                                        'default_value' => 'primary'
                                    )
                                )
                            )
                        )
                    ),
                    
                    // Text Block
                    array(
                        'key' => 'layout_text_block',
                        'name' => 'text_block',
                        'label' => 'Text Block',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_text_block_content',
                                'label' => 'Content',
                                'name' => 'text',
                                'type' => 'wysiwyg',
                                'required' => 1
                            ),
                            array(
                                'key' => 'field_text_block_width',
                                'label' => 'Content Width',
                                'name' => 'width',
                                'type' => 'select',
                                'choices' => array(
                                    '100%' => 'Full Width',
                                    '800px' => 'Medium (800px)',
                                    '600px' => 'Narrow (600px)'
                                ),
                                'default_value' => '800px'
                            ),
                            array(
                                'key' => 'field_text_block_alignment',
                                'label' => 'Text Alignment',
                                'name' => 'alignment',
                                'type' => 'select',
                                'choices' => array(
                                    'left' => 'Left',
                                    'center' => 'Center',
                                    'right' => 'Right'
                                ),
                                'default_value' => 'left'
                            ),
                            array(
                                'key' => 'field_text_block_background',
                                'label' => 'Background Color',
                                'name' => 'background_color',
                                'type' => 'select',
                                'choices' => array(
                                    'white' => 'White',
                                    'light' => 'Light Gray',
                                    'primary' => 'Primary Color'
                                ),
                                'default_value' => 'white'
                            )
                        )
                    ),
                    
                    // Cards Block
                    array(
                        'key' => 'layout_cards',
                        'name' => 'cards',
                        'label' => 'Cards',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_cards',
                                'label' => 'Cards',
                                'name' => 'cards',
                                'type' => 'repeater',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_card_image',
                                        'label' => 'Image',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array'
                                    ),
                                    array(
                                        'key' => 'field_card_title',
                                        'label' => 'Title',
                                        'name' => 'title',
                                        'type' => 'text'
                                    ),
                                    array(
                                        'key' => 'field_card_text',
                                        'label' => 'Text',
                                        'name' => 'text',
                                        'type' => 'textarea'
                                    ),
                                    array(
                                        'key' => 'field_card_button',
                                        'label' => 'Button',
                                        'name' => 'button',
                                        'type' => 'link'
                                    )
                                )
                            ),
                            array(
                                'key' => 'field_cards_columns',
                                'label' => 'Columns',
                                'name' => 'columns',
                                'type' => 'select',
                                'choices' => array(
                                    '2' => '2 Columns',
                                    '3' => '3 Columns',
                                    '4' => '4 Columns'
                                ),
                                'default_value' => '3'
                            ),
                            array(
                                'key' => 'field_cards_style',
                                'label' => 'Style',
                                'name' => 'style',
                                'type' => 'select',
                                'choices' => array(
                                    'default' => 'Default',
                                    'featured' => 'Featured First',
                                    'minimal' => 'Minimal'
                                ),
                                'default_value' => 'default'
                            )
                        )
                    ),
                    
                    // CTA Block
                    array(
                        'key' => 'layout_cta',
                        'name' => 'cta',
                        'label' => 'Call to Action',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_cta_title',
                                'label' => 'Title',
                                'name' => 'title',
                                'type' => 'text',
                                'required' => 1
                            ),
                            array(
                                'key' => 'field_cta_text',
                                'label' => 'Text',
                                'name' => 'text',
                                'type' => 'textarea'
                            ),
                            array(
                                'key' => 'field_cta_buttons',
                                'label' => 'Buttons',
                                'name' => 'buttons',
                                'type' => 'repeater',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_cta_button_link',
                                        'label' => 'Link',
                                        'name' => 'link',
                                        'type' => 'link',
                                        'required' => 1
                                    ),
                                    array(
                                        'key' => 'field_cta_button_style',
                                        'label' => 'Style',
                                        'name' => 'style',
                                        'type' => 'select',
                                        'choices' => array(
                                            'primary' => 'Primary',
                                            'secondary' => 'Secondary',
                                            'outline' => 'Outline'
                                        ),
                                        'default_value' => 'primary'
                                    )
                                )
                            ),
                            array(
                                'key' => 'field_cta_background',
                                'label' => 'Background',
                                'name' => 'background',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_cta_bg_color',
                                        'label' => 'Color',
                                        'name' => 'color',
                                        'type' => 'color_picker'
                                    ),
                                    array(
                                        'key' => 'field_cta_bg_image',
                                        'label' => 'Image',
                                        'name' => 'image',
                                        'type' => 'image'
                                    )
                                )
                            ),
                            array(
                                'key' => 'field_cta_layout',
                                'label' => 'Layout',
                                'name' => 'layout',
                                'type' => 'select',
                                'choices' => array(
                                    'default' => 'Default',
                                    'split' => 'Split Content',
                                    'centered' => 'Centered'
                                ),
                                'default_value' => 'default'
                            )
                        )
                    ),
                    
                    // Video Block
                    array(
                        'key' => 'layout_video',
                        'name' => 'video',
                        'label' => 'Video',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_video_file',
                                'label' => 'Video File',
                                'name' => 'video',
                                'type' => 'file',
                                'return_format' => 'array',
                                'mime_types' => 'mp4,webm',
                                'required' => 1
                            ),
                            array(
                                'key' => 'field_video_poster',
                                'label' => 'Poster Image',
                                'name' => 'poster_image',
                                'type' => 'image',
                                'return_format' => 'array'
                            ),
                            array(
                                'key' => 'field_video_caption',
                                'label' => 'Caption',
                                'name' => 'caption',
                                'type' => 'textarea'
                            )
                        )
                    )
                )
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
    ));

    // Check if ACF Pro is active
    if (function_exists('acf_get_setting') && acf_get_setting('pro')) {
        // ACF Pro specific configurations
    } else {
        // ACF Free specific configurations
    }

    // Include field groups (you'll register these via ACF UI)
    // require_once __DIR__ . '/acf-field-groups.php';

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

        // Header Options
        acf_add_options_sub_page(array(
            'page_title'  => 'Header Settings',
            'menu_title'  => 'Header',
            'parent_slug' => 'theme-options',
        ));

        // Footer Options
        acf_add_options_sub_page(array(
            'page_title'  => 'Footer Settings',
            'menu_title'  => 'Footer',
            'parent_slug' => 'theme-options',
        ));

        // Social Media
        acf_add_options_sub_page(array(
            'page_title'  => 'Social Media',
            'menu_title'  => 'Social Media',
            'parent_slug' => 'theme-options',
        ));

        // Add corresponding field groups for each options page
        acf_add_local_field_group(array(
            'key' => 'group_header_options',
            'title' => 'Header Settings',
            'fields' => array(
                array(
                    'key' => 'field_header_logo',
                    'label' => 'Logo',
                    'name' => 'header_logo',
                    'type' => 'image',
                    'return_format' => 'array'
                ),
                array(
                    'key' => 'field_sticky_header',
                    'label' => 'Sticky Header',
                    'name' => 'sticky_header',
                    'type' => 'true_false',
                    'ui' => 1
                ),
                array(
                    'key' => 'field_header_cta',
                    'label' => 'Header CTA Button',
                    'name' => 'header_cta',
                    'type' => 'link'
                )
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-options-header',
                    ),
                ),
            ),
        ));

        acf_add_local_field_group(array(
            'key' => 'group_footer_options',
            'title' => 'Footer Settings',
            'fields' => array(
                array(
                    'key' => 'field_footer_logo',
                    'label' => 'Footer Logo',
                    'name' => 'footer_logo',
                    'type' => 'image',
                    'return_format' => 'array'
                ),
                array(
                    'key' => 'field_copyright_text',
                    'label' => 'Copyright Text',
                    'name' => 'copyright_text',
                    'type' => 'text',
                    'default_value' => ' ' . date('Y') . ' All Rights Reserved'
                ),
                array(
                    'key' => 'field_footer_columns',
                    'label' => 'Footer Columns',
                    'name' => 'footer_columns',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_footer_column_title',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text'
                        ),
                        array(
                            'key' => 'field_footer_column_content',
                            'label' => 'Content',
                            'name' => 'content',
                            'type' => 'wysiwyg',
                            'toolbar' => 'basic',
                            'media_upload' => 0
                        )
                    )
                )
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-options-footer',
                    ),
                ),
            ),
        ));

        acf_add_local_field_group(array(
            'key' => 'group_social_options',
            'title' => 'Social Media Links',
            'fields' => array(
                array(
                    'key' => 'field_social_links',
                    'label' => 'Social Media',
                    'name' => 'social_links',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_social_platform',
                            'label' => 'Platform',
                            'name' => 'platform',
                            'type' => 'select',
                            'choices' => array(
                                'facebook' => 'Facebook',
                                'twitter' => 'Twitter',
                                'instagram' => 'Instagram',
                                'linkedin' => 'LinkedIn',
                                'youtube' => 'YouTube',
                                'pinterest' => 'Pinterest'
                            )
                        ),
                        array(
                            'key' => 'field_social_url',
                            'label' => 'URL',
                            'name' => 'url',
                            'type' => 'url',
                            'required' => 1
                        ),
                        array(
                            'key' => 'field_social_icon',
                            'label' => 'Custom Icon',
                            'name' => 'icon',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail'
                        )
                    )
                )
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-options-social',
                    ),
                ),
            ),
        ));
    }

    // Add admin notice if ACF is not active
    add_action('admin_notices', function() {
        echo '<div class="notice notice-error">';
        echo '<p>Advanced Custom Fields plugin is required for this theme. Please install and activate it.</p>';
        echo '</div>';
    });
} else {
    // Add admin notice if ACF is not active
    add_action('admin_notices', function() {
        echo '<div class="notice notice-error">';
        echo '<p>Advanced Custom Fields plugin is required for this theme. Please install and activate it.</p>';
        echo '</div>';
    });
}
