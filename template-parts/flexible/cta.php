<?php
/**
 * CTA Block - Flexible Content Component
 *
 * @package WordPress Theme Starter Pack
 */

$block_options = get_sub_field('options');
$title = get_sub_field('title');
$text = get_sub_field('text');
$buttons = get_sub_field('buttons');
$layout = get_sub_field('layout');

// Build classes array
$classes = ['wptsp-cta'];
if (!empty($block_options['classes'])) {
    $classes[] = $block_options['classes'];
}
if (!empty($block_options['align'])) {
    $classes[] = 'align-' . $block_options['align'];
}
if (!empty($block_options['has_animation'])) {
    $classes[] = 'has-animation';
}
if (!empty($layout)) {
    $classes[] = 'wptsp-cta--' . $layout;
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
    <div class="wptsp-cta__container">
        <div class="wptsp-cta__content">
            <?php if ($title) : ?>
                <h2 class="wptsp-cta__title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($text) : ?>
                <div class="wptsp-cta__text"><?php echo wp_kses_post($text); ?></div>
            <?php endif; ?>
        </div>

        <?php if ($buttons) : ?>
            <div class="wptsp-cta__buttons">
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
