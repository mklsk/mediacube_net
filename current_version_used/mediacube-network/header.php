<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <title><?php bloginfo( 'name' ); ?> - <?php is_front_page() ? bloginfo( 'description' ) : wp_title( '' ); ?></title>

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon.png">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon.ico">

    <?php wp_head(); ?>
</head>
<body
    <?php if ( is_home() ) : ?>
    class="type-blog-page"
    <?php elseif ( is_page_template('page-main.php') or is_front_page() ) : ?>
    class="type-main-page"
    <?php elseif ( is_page_template('page-contacts.php') ) : ?>
    class="type-contacts-page"
    <?php else : ?>
    <?php endif; ?>
>
<div class="page">
    <!-- Header-->
    <div class="top fixed">
        <div class="top__inner">
            <?php if ( is_page_template('page-main.php') or is_front_page() ) : ?>
                <!-- Logo-->
                <span class="logo"><span class="logo-trade"></span><span class="logo-text"></span></span>
            <?php else : ?>
                <!-- Logo-->
                <a href="/" class="logo"><span class="logo-trade"></span><span class="logo-text"></span></a>
            <?php endif; ?>
            <!-- Single Partners-->

            <?php $locations = get_nav_menu_locations(); ?>

            <?php if ( isset( $locations[ 'white-menu' ] ) ) : ?>
                <noindex>
                    <div class="single-navigation-partners">
                        <?php $menu = wp_get_nav_menu_object( $locations[ 'white-menu' ] ); ?>
                        <?php $menu_items = wp_get_nav_menu_items($menu->term_id); ?>
                        <?php foreach ( (array) $menu_items as $key => $menu_item ) : ?>
                            <a href="<?php echo $menu_item->url; ?>" class="single-navigation-partners__item anihov <?php echo (is_page($menu_item->object_id))?' __active':''; ?>"><?php echo $menu_item->title; ?></a>
                        <?php endforeach; ?>
                    </div>
                </noindex>
            <?php endif; ?>

            <!-- Navigation-->
            <div class="navigation">
                <div class="navigation-control">
                    <div class="navigation-control__item __nav"><span class="lines"></span></div>
                </div>
                <div class="navigation__inner">
                    <ul class="navigation__list">
                        <?php if ( isset( $locations[ 'main-menu' ] ) ) : ?>
                            <?php $menu = wp_get_nav_menu_object( $locations[ 'main-menu' ] ); ?>
                            <?php $menu_items = wp_get_nav_menu_items($menu->term_id); ?>
                            <?php foreach ( (array) $menu_items as $key => $menu_item ) : ?>
                                <li class="navigation__list-item anihov"><a href="<?php echo $menu_item->url; ?>" class="navigation__item <?php echo (is_page($menu_item->object_id))?' __active':''; ?>"><?php echo $menu_item->title; ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if ( get_field( 'issa_link', 'options' ) ) : ?>
                            <li class="navigation__list-item anihov __type-enter"><a href="<?php the_field( 'issa_link', 'options' ); ?>" class="navigation__item __type-enter"><?php echo __( 'Login', IO_THEME_NAME ); ?></a></li>
                        <?php endif; ?>

                        <?php if ( isset( $locations[ 'white-menu' ] ) ) : ?>
                            <?php $menu = wp_get_nav_menu_object( $locations[ 'white-menu' ] ); ?>
                            <?php $menu_items = wp_get_nav_menu_items($menu->term_id); ?>
                            <?php foreach ( (array) $menu_items as $key => $menu_item ) : ?>
                                <li class="navigation__list-item anihov __type-partners"><a href="<?php echo $menu_item->url; ?>" class="navigation__item __type-partners <?php echo (is_page($menu_item->object_id))?' __active':''; ?>"><?php echo $menu_item->title; ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <!-- Helper Nav-->
<!--             <noindex>
                <ul class="helper-nav">
                    <?php $domain = $_SERVER[ 'HTTP_HOST' ]; ?>
                    <?php if ( strpos( $domain, 'en.' ) !== false ) : ?>
                        <li class="helper-nav__list-item anihov __type-lang"><a href="http://<?php echo str_replace( 'en.', '', $domain ); ?>/" class="helper-nav__item __type-lang"><?php echo 'Ru'; ?></a></li>
                    <?php else : ?>
                        <li class="helper-nav__list-item anihov __type-lang"><a href="http://en.<?php echo $domain; ?>/" class="helper-nav__item __type-lang"><?php echo 'En'; ?></a></li>
                    <?php endif; ?>

                    <?php if ( get_field( 'issa_link', 'options' ) ) : ?>
                        <li class="helper-nav__list-item anihov __type-enter"><a href="<?php the_field( 'issa_link', 'options' ); ?>" class="helper-nav__item __type-enter"><?php echo __( 'Login', IO_THEME_NAME ); ?></a></li>
                    <?php endif; ?>
                </ul>
            </noindex> -->
        </div>
    </div>
    <!-- / Header-->
