<?php
/**
 * Footer Options Template
 */

$footer_logo = get_field('footer_logo', 'option');
$copyright = get_field('copyright_text', 'option');
$columns = get_field('footer_columns', 'option');
?>

<footer class="site-footer">
    <div class="container">
        <?php if ($footer_logo) : ?>
            <div class="footer-logo">
                <img src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr($footer_logo['alt']); ?>">
            </div>
        <?php endif; ?>

        <?php if ($columns) : ?>
            <div class="footer-columns">
                <?php foreach ($columns as $column) : ?>
                    <div class="footer-column">
                        <?php if ($column['title']) : ?>
                            <h3 class="footer-column-title"><?php echo esc_html($column['title']); ?></h3>
                        <?php endif; ?>
                        
                        <?php if ($column['content']) : ?>
                            <div class="footer-column-content">
                                <?php echo wp_kses_post($column['content']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($copyright) : ?>
            <div class="copyright">
                <?php echo wp_kses_post($copyright); ?>
            </div>
        <?php endif; ?>
    </div>
</footer>
