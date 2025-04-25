<?php
/**
 * Cards Block - Flexible Content Component
 *
 * @package WordPress Theme Starter Pack
 */

$cards = get_sub_field('cards');
$columns = get_sub_field('columns') ?: 3;
$style = get_sub_field('style');
?>

<section class="cards-section style-<?php echo esc_attr($style); ?>" style="--card-columns: <?php echo esc_attr($columns); ?>">
    <div class="container">
        <div class="cards-grid">
            <?php foreach ($cards as $card) : ?>
                <div class="card-item">
                    <?php if ($card['image']) : ?>
                        <div class="card-image">
                            <img src="<?php echo esc_url($card['image']['url']); ?>" alt="<?php echo esc_attr($card['image']['alt']); ?>">
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-content">
                        <?php if ($card['title']) : ?>
                            <h3 class="card-title"><?php echo esc_html($card['title']); ?></h3>
                        <?php endif; ?>
                        
                        <?php if ($card['text']) : ?>
                            <div class="card-text"><?php echo wp_kses_post($card['text']); ?></div>
                        <?php endif; ?>
                        
                        <?php if ($card['button']['url']) : ?>
                            <a href="<?php echo esc_url($card['button']['url']); ?>" class="card-button" target="<?php echo esc_attr($card['button']['target'] ?: '_self'); ?>">
                                <?php echo esc_html($card['button']['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
