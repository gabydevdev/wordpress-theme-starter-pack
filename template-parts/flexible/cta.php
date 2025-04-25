<?php
/**
 * CTA Block Template
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get block data
$title = get_field('title');
$description = get_field('description');
$button = get_field('button');
$background_color = get_field('background_color') ?: 'primary';
?>

<section class="wptsp-cta wptsp-cta--<?php echo esc_attr($background_color); ?>">
    <div class="container">
        <div class="wptsp-cta__content text-center">
            <?php if ($title) : ?>
                <h2 class="wptsp-cta__title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            
            <?php if ($description) : ?>
                <p class="wptsp-cta__description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
            
            <?php if ($button) : ?>
                <a href="<?php echo esc_url($button['url']); ?>" 
                   class="wptsp-cta__button btn btn-light" 
                   target="<?php echo esc_attr($button['target']); ?>">
                    <?php echo esc_html($button['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
