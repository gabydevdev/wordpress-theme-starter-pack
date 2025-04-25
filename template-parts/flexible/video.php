<?php
/**
 * Video Block - Flexible Content Component
 *
 * @package WordPress Theme Starter Pack
 */

$block_options = get_sub_field('options');
$video = get_sub_field('video');
$poster = get_sub_field('poster_image');
$caption = get_sub_field('caption');

// Build classes array
$classes = ['video-section'];
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
?>

<section
    <?php if (!empty($block_options['id'])) : ?>id="<?php echo esc_attr($block_options['id']); ?>"<?php endif; ?>
    class="<?php echo esc_attr(implode(' ', $classes)); ?>"
    <?php if (!empty($styles)) : ?>style="<?php echo esc_attr(implode('; ', $styles)); ?>"<?php endif; ?>>
    <div class="container">
        <div class="video-wrapper">
            <video controls <?php echo ($poster) ? 'poster="' . esc_url($poster['url']) . '"' : ''; ?>>
                <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
                Your browser does not support the video tag.
            </video>

            <?php if ($caption) : ?>
                <div class="video-caption">
                    <?php echo wp_kses_post($caption); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
