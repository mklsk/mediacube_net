<?php

/**
 * Get thumbnail url with fallback
 *
 * @param $image
 * @param $size
 * @param bool $post_id
 *
 * @return string
 */
function io_get_thumbnail_url( $image, $size, $post_id = false ) {
    if ( ! is_array( $image ) ) {
        $image = get_field( $image, $post_id );
    }

    if ( $size !== 'original' ) {
        $thumb = $image[ 'sizes' ][ $size ];
    } else {
        $thumb = $image[ 'url' ];
    }

    return $thumb;
}

/**
 * Get thumbnail with fallback
 *
 * @param $field
 * @param $size
 * @param string $class
 * @param bool $post_id
 *
 * @return string
 */
function io_get_thumbnail( $field, $size, $class = '', $post_id = false ) {
    return '<img
				src="' . io_get_thumbnail_url( $field, $size, $post_id ) . '"
				alt="' . the_title_attribute( array( 'echo' => false ) ) . '"
				class="' . $class . '"
			/>';
}

/**
 * Show thumbnail with fallback
 *
 * @param $field
 * @param $size
 * @param string $class
 * @param bool $post_id
 */
function io_the_thumbnail( $field, $size, $class = '', $post_id = false ) {
    echo io_get_thumbnail( $field, $size, $class, $post_id );
}

/**
 * Show original image with fallback
 *
 * @param $field
 * @param $size
 * @param string $class
 * @param bool $post_id
 */
function io_the_original( $field, $size, $class = '', $post_id = false ) {
    echo io_get_original( $field, $size, $class, $post_id );
}

/**
 * Get original image with fallback
 *
 * @param $field
 * @param string $class
 * @param bool $post_id
 *
 * @return string
 */
function io_get_original( $field, $class, $post_id = false ) {
    return '<img
				src="' . io_get_original_url( $field, $post_id ) . '"
				alt="' . the_title_attribute( array( 'echo' => false ) ) . '"
				class="' . $class . '"
			/>';
}

/**
 * Get original image url with fallback
 *
 * @param $field
 * @param bool $post_id
 *
 * @return string
 */
function io_get_original_url( $field, $post_id = false ) {
    $image = get_field( $field, $post_id );

    if ( is_array( $image ) ) {
        $image = $image[ 0 ];
    }

    return $image[ 'url' ];
}

/**
 * Get thumbnail post url
 *
 * @param $type
 */
function io_get_category_url( $type ) {
    if ( $type == 'categories' ) {
        $category = get_sub_field( 'category' );
        $current_url = esc_url( get_category_link( $category->term_id ) );
    } elseif ( get_field( 'type' ) == 'authors' ) {
        $author = get_sub_field( 'author' );
        $current_url = esc_url( get_author_posts_url( $author[ 'ID' ] ) );
    } elseif ( get_field( 'type' ) == 'posts' ) {
        $current_post = get_sub_field( 'post' );
        $current_url = esc_url( get_permalink( $current_post->ID ) );
    } else {
        $current_url = esc_url( the_sub_field( 'link' ) );
    }

    echo $current_url;
}

/**
 * Get external url flag
 *
 * @param $type
 */
function io_get_external( $type ) {
    if ( $type == 'links' && get_sub_field( 'external_link' ) ) {
        echo 'target="_blank"';
    }
}
