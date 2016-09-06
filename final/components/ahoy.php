<?php

/*********************
 * AHOY
 *********************/

/**
 * Setup theme actions
 */
function io_ahoy() {
    // launching operation cleanup
    add_action( 'init', 'io_head_cleanup' );
    // remove WP version from RSS
    add_filter( 'the_generator', 'io_rss_version' );
    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'io_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action( 'wp_head', 'io_remove_recent_comments_style', 1 );
    // clean up gallery output in wp
    add_filter( 'gallery_style', 'io_gallery_style' );
    // enqueue base scripts and styles
    add_action( 'wp_enqueue_scripts', 'io_scripts_and_styles', 999 );
    // launching this stuff after theme setup
    io_register_menus();
    io_register_image_sizes();
    io_register_editor_style();
}

add_action( 'after_setup_theme', 'io_ahoy' );
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

/*********************
 * WP_HEAD GOODNESS
 *********************/

/*
 * Remove WP stuff from head
 */
function io_head_cleanup() {
    // category feeds
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    // post and comment feeds
    remove_action( 'wp_head', 'feed_links', 2 );
    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // index link
    remove_action( 'wp_head', 'index_rel_link' );
    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version
    remove_action( 'wp_head', 'wp_generator' );
    // remove WP version from css
    add_filter( 'style_loader_src', 'io_remove_wp_ver_css_js', 9999 );
    // remove Wp version from scripts
    add_filter( 'script_loader_src', 'io_remove_wp_ver_css_js', 9999 );
}

/*
 * Remove WP version from RSS
 */
function io_rss_version() {
    return '';
}

/**
 * Remove WP version from scripts
 *
 * @param $src
 *
 * @return string
 */
function io_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }

    return $src;
}

/**
 * Remove injected CSS for recent comments widget
 */
function io_remove_wp_widget_recent_comments_style() {
    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
        remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
}

/**
 * Remove injected CSS from recent comments widget
 */
function io_remove_recent_comments_style() {
    global $wp_widget_factory;
    if ( isset( $wp_widget_factory->widgets[ 'WP_Widget_Recent_Comments' ] ) ) {
        remove_action( 'wp_head', array(
            $wp_widget_factory->widgets[ 'WP_Widget_Recent_Comments' ],
            'recent_comments_style'
        ) );
    }
}

/**
 * Remove injected CSS from gallery
 *
 * @param $css
 *
 * @return mixed
 */
function io_gallery_style( $css ) {
    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}
