<?php
/**
 * Header Options Template
 */

$logo = get_field('header_logo', 'option');
$sticky = get_field('sticky_header', 'option');
$cta = get_field('header_cta', 'option');
?>

<header class="site-header<?php echo $sticky ? ' sticky-header' : ''; ?>">
    <div class="container">
        <?php if ($logo) : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="site-logo">
            </a>
        <?php endif; ?>

        <?php if ($cta) : ?>
            <a href="<?php echo esc_url($cta['url']); ?>" 
               class="header-cta" 
               target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>">
                <?php echo esc_html($cta['title']); ?>
            </a>
        <?php endif; ?>
    </div>
</header>
