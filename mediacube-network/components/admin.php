<?php

/*********************
 * CUSTOM LOGIN/ADMIN PAGE
 *********************/

/**
 * Change login logo URL
 *
 * @return string
 */
function io_login_url() {
    return home_url();
}

add_filter( 'login_headerurl', 'io_login_url' );

/**
 * Change login logo title
 *
 * @return string
 */
function io_login_title() {
    return get_option( 'blogname' );
}

add_filter( 'login_headertitle', 'io_login_title' );

/**
 * Change login logo
 */
function io_login_logo() {
    ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/assets/icons/logo_login.png);
            background-image: none, url(<?php echo get_bloginfo( 'template_directory' ) ?>/assets/icons/logo_login.svg);
        }
    </style>
    <?php
}

add_action( 'login_enqueue_scripts', 'io_login_logo' );

/**
 * Remove unused menu items
 */
function io_admin_init() {
    if ( ! defined( 'DOING_AJAX' ) or ! DOING_AJAX ) {
        $user = wp_get_current_user();
        if ( $user->user_login != 'developer' ) {
            remove_menu_page( 'tools.php' );
            remove_menu_page( 'plugins.php' );
            remove_menu_page( 'WP-Optimize' );
            //remove_menu_page( 'wpseo_dashboard' );
            remove_menu_page( 'ns-cloner' );
            remove_menu_page( 'bwp_minify_general' );
            remove_menu_page( 'dcl-settings' );
            remove_menu_page( 'edit.php?post_type=acf-field-group' );

            remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
            remove_submenu_page( 'themes.php', 'themes.php' );
            remove_submenu_page( 'themes.php', 'theme-editor.php' );
            remove_submenu_page( 'edit-comments.php', 'edit-comments.php' );

            remove_submenu_page( 'options-general.php', 'options-writing.php' );
            remove_submenu_page( 'options-general.php', 'options-media.php' );
            remove_submenu_page( 'options-general.php', 'options-permalink.php' );
            remove_submenu_page( 'options-general.php', 'codepress-admin-columns' );
            remove_submenu_page( 'options-general.php', 'wpsupercache' );
            remove_submenu_page( 'options-general.php', 'yarpp' );
        }
    }
}

//add_action( 'admin_init', 'io_admin_init' );

/**
 * Remove unused toolbar items
 *
 * @param $wp_admin_bar
 */
function io_admin_bar_menu( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'wpseo-menu' );
}
