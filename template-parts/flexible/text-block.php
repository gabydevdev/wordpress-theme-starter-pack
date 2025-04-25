<?php
/**
 * Text Block - Flexible Content Component
 *
 * @package WordPress Theme Starter Pack
 */

$text = get_sub_field('text');
$width = get_sub_field('width');
$alignment = get_sub_field('alignment');
$background = get_sub_field('background_color');
?>

<section class="text-block-section bg-<?php echo esc_attr($background); ?>" style="--text-width: <?php echo esc_attr($width); ?>; text-align: <?php echo esc_attr($alignment); ?>">
    <div class="container">
        <div class="text-block-content">
            <?php echo wp_kses_post($text); ?>
        </div>
    </div>
</section>
