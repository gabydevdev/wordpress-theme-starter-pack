<?php
/**
 * Hero Section - Flexible Content Component
 *
 * @package WordPress Theme Starter Pack
 */

$block_options = get_sub_field('options');
$title = get_sub_field('title');
$description = get_sub_field('description');
$background = get_sub_field('background');
$buttons = get_sub_field('buttons');

// Build classes array
$classes = ['wptsp-hero'];
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
if (!empty($background['url'])) {
    $styles[] = 'background-image: url(\'' . esc_url($background['url']) . '\')';
}
?>

<section
    <?php if (!empty($block_options['id'])) : ?>id="<?php echo esc_attr($block_options['id']); ?>"<?php endif; ?>
    class="<?php echo esc_attr(implode(' ', $classes)); ?>"
    <?php if (!empty($styles)) : ?>style="<?php echo esc_attr(implode('; ', $styles)); ?>"<?php endif; ?>>
    <div class="wptsp-hero__container">
        <?php if ($title) : ?>
            <h1 class="wptsp-hero__title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="wptsp-hero__description">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>

        <?php if ($buttons) : ?>
            <div class="wptsp-hero__buttons">
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
