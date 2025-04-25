<?php
/**
 * CTA Block - Flexible Content Component
 *
 * @package WordPress Theme Starter Pack
 */

$title = get_sub_field('title');
$text = get_sub_field('text');
$buttons = get_sub_field('buttons');
$background = get_sub_field('background');
$layout = get_sub_field('layout');
?>

<section class="cta-section layout-<?php echo esc_attr($layout); ?>" style="background-color: <?php echo esc_attr($background['color']); ?>; <?php echo ($background['image']) ? 'background-image: url(' . esc_url($background['image']['url']) . ');' : ''; ?>">
    <div class="container">
        <div class="cta-content">
            <?php if ($title) : ?>
                <h2 class="cta-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            
            <?php if ($text) : ?>
                <div class="cta-text"><?php echo wp_kses_post($text); ?></div>
            <?php endif; ?>
        </div>
        
        <?php if ($buttons) : ?>
            <div class="cta-buttons">
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
