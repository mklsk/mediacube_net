<?php

/*********************
 * THEME SUPPORT
 *********************/

/**
 * Register scripts and styles
 */
function io_scripts_and_styles() {
    if ( ! is_admin() ) {
        wp_register_style( 'base', IO_THEME_URI . 'assets/css/base.css', array(), '', 'all' );
        wp_enqueue_style( 'base' );

        wp_deregister_script( 'jquery' );

        wp_register_script( 'modernizr', IO_THEME_URI . 'assets/js/modernizr.js', array(), '', false );
        wp_enqueue_script( 'modernizr' );

        wp_register_script( 'jquery', IO_THEME_URI . 'assets/js/jquery.js', array(), '', true );
        wp_enqueue_script( 'jquery' );

        wp_register_script( 'libraries', IO_THEME_URI . 'assets/js/libraries.js', array(), '', true );
        wp_enqueue_script( 'libraries' );

        wp_register_script( 'ias', IO_THEME_URI . 'assets/js/ias.js', array(), '', true );
        wp_enqueue_script( 'ias' );

        wp_register_script( 'mc', IO_THEME_URI . 'assets/js/mc.js', array(), '', true );
        wp_enqueue_script( 'mc' );

        wp_register_script( 'mc-add', IO_THEME_URI . 'assets/js/mc-add.js', array(), '', true );
        wp_enqueue_script( 'mc-add' );


        global $post;
        $post_slug=$post->post_name;
        if ($post_slug == 'brands') {

        wp_register_script( 'typed', get_template_directory_uri() . '/assets/js/typed.js"', array('jquery'), '', true);
        wp_enqueue_script( 'typed' );

        wp_register_script( 'skrollr', get_template_directory_uri() . '/assets/js/skrollr.js"', array('jquery'), '', true);
        wp_enqueue_script( 'skrollr' );

        wp_register_script( 'odometer', get_template_directory_uri() . '/assets/js/odometer.js"', array('jquery'), '', true);
        wp_enqueue_script( 'odometer' );

        wp_register_script( 'waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.js"', array('jquery'), '', true);
        wp_enqueue_script( 'waypoints' );

        wp_register_script( 'inview', get_template_directory_uri() . '/assets/js/inview.js"', array('jquery', 'waypoints'), '', true);
        wp_enqueue_script( 'inview' );

        wp_register_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js"', array('jquery' ), '', true);
        wp_enqueue_script( 'slick' );

         wp_register_script( 'brand', get_template_directory_uri() . '/assets/js/brand.js"', array('jquery', 'typed', 'skrollr', 'odometer', 'waypoints', 'inview', 'slick'), '', true);
        wp_enqueue_script( 'brand' );

        }
    }
}

/**
 * Register menus
 */
function io_register_menus() {
    add_theme_support( 'menus' );

    register_nav_menus( array(
        'main-menu' => "Основное меню",
        'white-menu' => "Белое меню"
    ) );
}

/**
 * Register image sizes
 */
function io_register_image_sizes() {
    add_image_size( 'top', 240, 240, true );
    add_image_size( 'list', 360, 280, true );
    add_image_size( 'promo', 960, 440, true );
}

/**
 * Register editor style
 */
function io_register_editor_style() {
    add_editor_style( array(
        'assets/css/editor-style.css'
    ) );
}

/**
 * Fix posts OpenGraph image
 *
 * @param $val
 *
 * @return string
 */
function io_opengraph_single_image_filter( $val ) {
    if ( is_single() ) {
        if ( get_field( 'image' ) ) {
            $val = get_field( 'image' );
        }
    } else {
        $val = get_template_directory_uri().'/social.png';
    }

    return $val;
}

add_filter( 'wpseo_opengraph_image', 'io_opengraph_single_image_filter' );
