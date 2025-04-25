<?php
/**
 * Hero Block Template
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get block data
$title = get_field('title');
$subtitle = get_field('subtitle');
$background_image = get_field('background_image');
$cta_button = get_field('cta_button');
?>

<section class="wptsp-hero" style="background-image: url('<?php echo esc_url($background_image['url']); ?>');">
    <div class="container">
        <div class="wptsp-hero__content">
            <?php if ($title) : ?>
                <h1 class="wptsp-hero__title"><?php echo esc_html($title); ?></h1>
            <?php endif; ?>
            
            <?php if ($subtitle) : ?>
                <p class="wptsp-hero__subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
            
            <?php if ($cta_button) : ?>
                <a href="<?php echo esc_url($cta_button['url']); ?>" 
                   class="wptsp-hero__button btn btn-primary" 
                   target="<?php echo esc_attr($cta_button['target']); ?>">
                    <?php echo esc_html($cta_button['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
