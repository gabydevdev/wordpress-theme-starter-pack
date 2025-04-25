<?php
/**
 * Cards Grid Block Template
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get block data
$title = get_field('title');
$cards = get_field('cards');
$columns = get_field('columns') ?: 3;
?>

<section class="wptsp-cards-grid">
    <div class="container">
        <?php if ($title) : ?>
            <h2 class="wptsp-cards-grid__title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if ($cards) : ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-<?php echo esc_attr($columns); ?> g-4">
                <?php foreach ($cards as $card) : ?>
                    <div class="col">
                        <div class="wptsp-cards-grid__card">
                            <?php if ($card['image']) : ?>
                                <img src="<?php echo esc_url($card['image']['url']); ?>" 
                                     class="wptsp-cards-grid__image" 
                                     alt="<?php echo esc_attr($card['image']['alt']); ?>">
                            <?php endif; ?>
                            
                            <div class="wptsp-cards-grid__body">
                                <?php if ($card['title']) : ?>
                                    <h3 class="wptsp-cards-grid__card-title"><?php echo esc_html($card['title']); ?></h3>
                                <?php endif; ?>
                                
                                <?php if ($card['description']) : ?>
                                    <p class="wptsp-cards-grid__card-text"><?php echo esc_html($card['description']); ?></p>
                                <?php endif; ?>
                                
                                <?php if ($card['button']) : ?>
                                    <a href="<?php echo esc_url($card['button']['url']); ?>" 
                                       class="wptsp-cards-grid__button btn btn-primary" 
                                       target="<?php echo esc_attr($card['button']['target']); ?>">
                                        <?php echo esc_html($card['button']['title']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section> 