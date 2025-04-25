<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_template_part('template-parts/header-options'); ?>

<header class="site-header">
    <div class="container">
        <?php
        the_custom_logo();
        if (has_nav_menu('primary')) {
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'primary-menu',
                    'container'      => false,
                )
            );
        }
        ?>
    </div>
</header>

<main class="site-main">
