<footer class="site-footer">
    <div class="container">
        <?php
        if (has_nav_menu('footer')) {
            wp_nav_menu(
                array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    'container'      => false,
                )
            );
        }
        ?>
        <div class="site-info">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>
<?php get_template_part('template-parts/footer-options'); ?>
<?php get_template_part('template-parts/social-links'); ?>
<?php wp_footer(); ?>
</body>
</html>
