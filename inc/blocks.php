<?php
/**
 * Block Registration and Functionality
 */

if (!defined('ABSPATH')) {
    exit;
}

class WPTSP_Blocks {
    private $blocks = [
        'hero' => [
            'title' => 'Hero Section',
            'description' => 'Add a full-width hero section with title, description, and call-to-action buttons.',
            'category' => 'wptsp-blocks',
            'icon' => 'align-wide',
            'keywords' => ['hero', 'banner', 'header']
        ],
        'cta' => [
            'title' => 'Call to Action',
            'description' => 'Add a call-to-action section with customizable layout.',
            'category' => 'wptsp-blocks',
            'icon' => 'megaphone',
            'keywords' => ['cta', 'action', 'button']
        ],
        'cards' => [
            'title' => 'Cards Grid',
            'description' => 'Display content in a responsive card grid layout.',
            'category' => 'wptsp-blocks',
            'icon' => 'grid-view',
            'keywords' => ['cards', 'grid', 'features']
        ],
        'text-block' => [
            'title' => 'Text Block',
            'description' => 'Add a customizable text block with various width options.',
            'category' => 'wptsp-blocks',
            'icon' => 'text',
            'keywords' => ['text', 'content', 'wysiwyg']
        ],
        'video' => [
            'title' => 'Video',
            'description' => 'Embed a video with optional poster image and caption.',
            'category' => 'wptsp-blocks',
            'icon' => 'video-alt3',
            'keywords' => ['video', 'media', 'embed']
        ]
    ];

    public function __construct() {
        add_action('init', [$this, 'register_block_category']);
        add_action('init', [$this, 'register_blocks']);
        add_action('enqueue_block_editor_assets', [$this, 'enqueue_editor_assets']);
        add_filter('allowed_block_types_all', [$this, 'allowed_block_types'], 10, 2);
    }

    /**
     * Register custom block category
     */
    public function register_block_category($categories) {
        $category_slugs = wp_list_pluck($categories, 'slug');

        if (!in_array('wptsp-blocks', $category_slugs, true)) {
            $categories[] = [
                'slug'  => 'wptsp-blocks',
                'title' => __('WPTSP Blocks', 'wptsp'),
                'icon'  => null,
            ];
        }

        return $categories;
    }

    /**
     * Register blocks
     */
    public function register_blocks() {
        foreach ($this->blocks as $name => $block) {
            register_block_type('wptsp/' . $name, [
                'title' => $block['title'],
                'description' => $block['description'],
                'category' => $block['category'],
                'icon' => $block['icon'],
                'keywords' => $block['keywords'],
                'render_callback' => [$this, 'render_block_' . str_replace('-', '_', $name)],
                'supports' => [
                    'align' => true,
                    'mode' => false,
                    'jsx' => true
                ],
                'attributes' => $this->get_block_attributes($name)
            ]);
        }
    }

    /**
     * Get block attributes including shared options
     */
    private function get_block_attributes($block_name) {
        $shared_attributes = [
            'options' => [
                'type' => 'object',
                'default' => [
                    'id' => '',
                    'classes' => '',
                    'align' => '',
                    'bg' => ['color' => ''],
                    'has_animation' => false
                ]
            ]
        ];

        $block_specific_attributes = $this->get_block_specific_attributes($block_name);

        return array_merge($shared_attributes, $block_specific_attributes);
    }

    /**
     * Get block-specific attributes
     */
    private function get_block_specific_attributes($block_name) {
        $attributes = [];

        switch ($block_name) {
            case 'hero':
                $attributes = [
                    'title' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'background' => ['type' => 'object'],
                    'buttons' => ['type' => 'array']
                ];
                break;
            case 'cta':
                $attributes = [
                    'title' => ['type' => 'string'],
                    'text' => ['type' => 'string'],
                    'buttons' => ['type' => 'array'],
                    'layout' => ['type' => 'string']
                ];
                break;
            case 'cards':
                $attributes = [
                    'cards' => ['type' => 'array'],
                    'columns' => ['type' => 'number', 'default' => 3],
                    'style' => ['type' => 'string']
                ];
                break;
            case 'text-block':
                $attributes = [
                    'text' => ['type' => 'string'],
                    'width' => ['type' => 'string']
                ];
                break;
            case 'video':
                $attributes = [
                    'video' => ['type' => 'object'],
                    'poster_image' => ['type' => 'object'],
                    'caption' => ['type' => 'string']
                ];
                break;
        }

        return $attributes;
    }

    /**
     * Enqueue editor assets
     */
    public function enqueue_editor_assets() {
        wp_enqueue_script(
            'wptsp-editor',
            get_template_directory_uri() . '/assets/js/dist/editor.bundle.js',
            ['wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n'],
            filemtime(get_template_directory() . '/assets/js/dist/editor.bundle.js'),
            true
        );

        wp_enqueue_style(
            'wptsp-editor',
            get_template_directory_uri() . '/assets/css/editor.css',
            ['wp-edit-blocks'],
            filemtime(get_template_directory() . '/assets/css/editor.css')
        );
    }

    /**
     * Filter allowed block types
     */
    public function allowed_block_types($allowed_blocks, $context) {
        return array_merge(
            array_map(function($name) {
                return 'wptsp/' . $name;
            }, array_keys($this->blocks)),
            [
                'core/paragraph',
                'core/image',
                'core/heading',
                'core/list'
            ]
        );
    }

    /**
     * Block render callbacks
     */
    public function render_block_hero($attributes, $content) {
        ob_start();
        include get_template_directory() . '/template-parts/flexible/hero.php';
        return ob_get_clean();
    }

    public function render_block_cta($attributes, $content) {
        ob_start();
        include get_template_directory() . '/template-parts/flexible/cta.php';
        return ob_get_clean();
    }

    public function render_block_cards($attributes, $content) {
        ob_start();
        include get_template_directory() . '/template-parts/flexible/cards.php';
        return ob_get_clean();
    }

    public function render_block_text_block($attributes, $content) {
        ob_start();
        include get_template_directory() . '/template-parts/flexible/text-block.php';
        return ob_get_clean();
    }

    public function render_block_video($attributes, $content) {
        ob_start();
        include get_template_directory() . '/template-parts/flexible/video.php';
        return ob_get_clean();
    }
}

// Initialize blocks
new WPTSP_Blocks();

/**
 * Register ACF Blocks
 */

function wptsp_register_acf_blocks() {
    // Register Hero Block
    acf_register_block_type(array(
        'name'              => 'hero',
        'title'             => __('Hero Section'),
        'description'       => __('A custom hero section block.'),
        'render_template'   => 'template-parts/flexible/hero.php',
        'category'          => 'layout',
        'icon'              => 'admin-comments',
        'keywords'          => array('hero', 'banner', 'header'),
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
    ));

    // Register Cards Grid Block
    acf_register_block_type(array(
        'name'              => 'cards-grid',
        'title'             => __('Cards Grid'),
        'description'       => __('A grid of cards block.'),
        'render_template'   => 'template-parts/flexible/cards-grid.php',
        'category'          => 'layout',
        'icon'              => 'grid-view',
        'keywords'          => array('cards', 'grid', 'layout'),
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
    ));

    // Register CTA Block
    acf_register_block_type(array(
        'name'              => 'cta',
        'title'             => __('Call to Action'),
        'description'       => __('A call to action block.'),
        'render_template'   => 'template-parts/flexible/cta.php',
        'category'          => 'layout',
        'icon'              => 'megaphone',
        'keywords'          => array('cta', 'call to action', 'button'),
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
    ));
}
add_action('acf/init', 'wptsp_register_acf_blocks');
