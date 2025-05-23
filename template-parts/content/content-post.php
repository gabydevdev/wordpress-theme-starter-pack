<?php
/**
 * Default post content template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        the_title('<h1 class="entry-title">', '</h1>');

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <?php
                wptsp_posted_on();
                wptsp_posted_by();
                ?>
            </div>
        <?php endif; ?>
    </header>

    <?php wptsp_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        /* translators: %s: Post title */
        printf( esc_html__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'theme-textdomain' ), get_the_title() );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'wptsp'),
                'after'  => '</div>',
            )
        );
        ?>
    </div>

    <footer class="entry-footer">
        <?php wptsp_entry_footer(); ?>
    </footer>
</article>
