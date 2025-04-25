<?php
/**
 * Text Block - Flexible Content Component
 *
 * @package WordPress Theme Starter Pack
 */

$block_options = get_sub_field('options');
$text = get_sub_field('text');
$width = get_sub_field('width');

// Build classes array
$classes = ['text-block-section'];
if (!empty($block_options['classes'])) {
    $classes[] = $block_options['classes'];
}
if (!empty($block_options['align'])) {
    $classes[] = 'align-' . $block_options['align'];
}
if (!empty($block_options['has_animation'])) {
    $classes[] = 'has-animation';
}

// Build styles array
$styles = [];
if (!empty($block_options['bg']['color'])) {
    $styles[] = 'background-color: var(--color-' . $block_options['bg']['color'] . ')';
}
if (!empty($width)) {
    $styles[] = '--text-width: ' . $width;
}
if (!empty($block_options['align'])) {
    $styles[] = 'text-align: ' . $block_options['align'];
}
?>

<section
    <?php if (!empty($block_options['id'])) : ?>id="<?php echo esc_attr($block_options['id']); ?>"<?php endif; ?>
    class="<?php echo esc_attr(implode(' ', $classes)); ?>"
    <?php if (!empty($styles)) : ?>style="<?php echo esc_attr(implode('; ', $styles)); ?>"<?php endif; ?>>
    <div class="container">
        <div class="text-block-content">
            <?php echo wp_kses_post($text); ?>
        </div>
    </div>
</section>
