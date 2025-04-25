<?php
/**
 * Display when no content is available
 */
?>

<article <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php esc_html_e('Nothing Found', 'wptsp'); ?></h1>
    </header>

    <div class="entry-content">
        <?php
        if (is_search()) :
            ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wptsp'); ?></p>
            <?php
            get_search_form();
        else :
            ?>
            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wptsp'); ?></p>
            <?php
            get_search_form();
        endif;
        ?>
    </div>
</article>
