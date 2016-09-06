<?php

/*********************
 * QUERIES FUNCTIONS
 *********************/

/**
 * Original $wp_query container
 */
$original_wp_query = null;

/**
 * Backup original $wp_query
 */
function io_backup_original_query() {
    global $wp_query, $original_wp_query;

    $original_wp_query = $wp_query;
    wp_reset_query();
}

/**
 * Restore original $wp_query
 */
function io_restore_original_query() {
    global $wp_query, $original_wp_query;

    wp_reset_query();
    $wp_query = $original_wp_query;
}

/**
 * Theme pre_get_posts filter
 *
 * @param $query
 *
 * @return mixed
 */
function io_pre_get_posts( $query ) {
    if ( ! is_admin() ) {
        if ( $query->is_home && $query->is_main_query() ) {
            $sticky = array_slice( array_reverse( get_option( 'sticky_posts' ) ), 0, 1 );

            $query->set( 'post__not_in', $sticky );
            $query->set( 'ignore_sticky_posts', true );
        }
    }

    return $query;
}

add_filter( 'pre_get_posts', 'io_pre_get_posts' );

/**
 * Theme posts_join filter
 *
 * @param $join
 *
 * @return string
 */
function io_posts_join( $join ) {
    global $wpdb;

    if ( is_search() ) {
        $join .= " LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.post_id = $wpdb->posts.id ";
    }

    return $join;
}

add_filter( 'posts_join', 'io_posts_join' );

/**
 * Theme posts_where filter
 *
 * @param $where
 *
 * @return mixed
 */
function io_posts_where( $where ) {
    global $wpdb;

    if ( is_search() ) {
        $where = preg_replace( '/' . $wpdb->posts . '.post_content LIKE \'(\%.*\%)\'\)\)\)/', $wpdb->posts . '.post_content LIKE \'$1\') OR (' . $wpdb->postmeta . '.meta_value LIKE \'$1\'))) AND (' . $wpdb->posts . '.post_type = \'post\') ', $where, 1 );
        $where .= 'GROUP BY ' . $wpdb->posts . '.ID';
    }

    return $where;
}

add_filter( 'posts_where', 'io_posts_where' );

/*function dump_request( $input ) {

	print_r($input);

	return $input;
}

add_filter( 'posts_request', 'dump_request' );*/
