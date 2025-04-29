<?php
/**
 * Theme template functions and helpers
 */

/**
 * Get theme asset path
 */
function wptsp_asset($path) {
    return get_template_directory_uri() . '/assets/' . ltrim($path, '/');
}

/**
 * Output SVG icon
 */
function wptsp_icon($name, $class = '') {
    $icon_path = get_template_directory() . '/assets/images/icons/' . $name . '.svg';
    if (file_exists($icon_path)) {
        echo '<span class="icon ' . esc_attr($class) . '">';
        include $icon_path;
        echo '</span>';
    }
}

/**
 * Check if post has ACF flexible content
 */
function wptsp_has_flexible_content($field_name = 'flexible_content') {
    return have_rows($field_name) && function_exists('have_rows');
}

/**
 * Display flexible content sections
 */
function wptsp_flexible_content($field_name = 'flexible_content') {
    if (wptsp_has_flexible_content($field_name)) {
        while (have_rows($field_name)) : the_row();
            get_template_part('template-parts/flexible/' . get_row_layout());
        endwhile;
    }
}

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function wptsp_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

/**
 * Prints HTML with meta information for the current author.
 */
function wptsp_posted_by() {
    echo '<span class="byline">';
    echo '<span class="author vcard">';
    echo '<a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>';
    echo '</span>';
    echo '</span>';
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function wptsp_entry_footer() {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
        /* translators: %s: Category list */
        $categories_list = get_the_category_list(esc_html__(', ', 'wptsp'));
        if ($categories_list) {
            printf( esc_html__( 'Posted in %1$s', 'theme-textdomain' ), $categories_list );
        }

        /* translators: %s: Tag list */
        $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'wptsp'));
        if ($tags_list) {
            printf( esc_html__( 'Tagged %1$s', 'theme-textdomain' ), $tags_list );
        }
    }

    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Post title */
                    __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'theme-textdomain'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Post title */
                __('Edit <span class="screen-reader-text">%s</span>', 'theme-textdomain'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            wp_kses_post(get_the_title())
        ),
        '<span class="edit-link">',
        '</span>'
    );
}

/**
 * Displays an optional post thumbnail.
 */
function wptsp_post_thumbnail() {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        return;
    }

    if (is_singular()) :
        ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php else : ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php
            the_post_thumbnail(
                'post-thumbnail',
                array(
                    'alt' => the_title_attribute(
                        array(
                            'echo' => false,
                        )
                    ),
                )
            );
            ?>
        </a>
    <?php
    endif;
}
