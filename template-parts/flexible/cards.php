<?php
/**
 * Cards Block - Flexible Content Component
 *
 * @package WordPress Theme Starter Pack
 */

$block_options = get_sub_field('options');
$cards = get_sub_field('cards');
$columns = get_sub_field('columns') ?: 3;
$style = get_sub_field('style');

// Build classes array
$classes = ['wptsp-cards'];
if (!empty($block_options['classes'])) {
    $classes[] = $block_options['classes'];
}
if (!empty($block_options['align'])) {
    $classes[] = 'align-' . $block_options['align'];
}
if (!empty($block_options['has_animation'])) {
    $classes[] = 'has-animation';
}
if (!empty($style)) {
    $classes[] = 'wptsp-cards--' . $style;
}

// Build styles array
$styles = [];
if (!empty($block_options['bg']['color'])) {
    $styles[] = 'background-color: var(--color-' . $block_options['bg']['color'] . ')';
}
$styles[] = '--card-columns: ' . esc_attr($columns);
?>

<section
    <?php if (!empty($block_options['id'])) : ?>id="<?php echo esc_attr($block_options['id']); ?>"<?php endif; ?>
    class="<?php echo esc_attr(implode(' ', $classes)); ?>"
    <?php if (!empty($styles)) : ?>style="<?php echo esc_attr(implode('; ', $styles)); ?>"<?php endif; ?>>
    <div class="wptsp-cards__grid">
        <?php if ($cards) : foreach ($cards as $card) : ?>
            <div class="wptsp-cards__item">
                <?php if (!empty($card['image'])) : ?>
                    <div class="wptsp-cards__image">
                        <img src="<?php echo esc_url($card['image']['url']); ?>"
                             alt="<?php echo esc_attr($card['image']['alt']); ?>">
                    </div>
                <?php endif; ?>

                <div class="wptsp-cards__content">
                    <?php if (!empty($card['title'])) : ?>
                        <h3 class="wptsp-cards__title"><?php echo esc_html($card['title']); ?></h3>
                    <?php endif; ?>

                    <?php if (!empty($card['text'])) : ?>
                        <div class="wptsp-cards__text"><?php echo wp_kses_post($card['text']); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($card['button'])) :
                        $button = $card['button'];
                        $button_target = $button['target'] ?? '_self';
                    ?>
                        <a href="<?php echo esc_url($button['url']); ?>"
                           class="wptsp-cards__button"
                           target="<?php echo esc_attr($button_target); ?>">
                            <?php echo esc_html($button['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; endif; ?>
    </div>
</section>
