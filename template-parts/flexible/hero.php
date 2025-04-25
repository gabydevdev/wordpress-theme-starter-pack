<?php
/**
 * Hero Section - Flexible Content Component
 *
 * @package WordPress Theme Starter Pack
 */

$title = get_sub_field('title');
$description = get_sub_field('description');
$background = get_sub_field('background');
$buttons = get_sub_field('buttons');
?>

<section class="hero-section" style="background-image: url('<?php echo esc_url($background['url']); ?>');">
    <div class="container">
        <?php if ($title) : ?>
            <h1 class="hero-title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="hero-description">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>

        <?php if ($buttons) : ?>
            <div class="hero-buttons">
                <?php foreach ($buttons as $button) : ?>
                    <a href="<?php echo esc_url($button['link']['url']); ?>" 
                       class="btn <?php echo esc_attr($button['style']); ?>"
                       target="<?php echo esc_attr($button['link']['target'] ?: '_self'); ?>">
                        <?php echo esc_html($button['link']['title']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
