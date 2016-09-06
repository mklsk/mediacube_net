<?php

if ( ! function_exists( 'get_cat_ID_by_slug' ) ) {
    /**
     * Add get_cat_ID_by_slug function
     *
     * @param $slug
     *
     * @return int
     */
    function get_cat_ID_by_slug( $slug ) {
        $cat = get_category_by_slug( $slug );
        if ( $cat ) {
            return $cat->term_id;
        }

        return 0;
    }
}

/**
 * Check is the current category in list
 *
 * @param $needle
 *
 * @return bool
 */
function io_in_category( $needle ) {
    $categories = get_the_category();

    if ( ! empty( $categories ) ) {
        foreach ( $categories as $category ) {
            if ( in_array( $category->slug, $needle ) ) {
                return true;
            }
        }
    }

    return false;
}

/**
 * Check is the current category in list
 *
 * @param $needle
 *
 * @return bool
 */
function io_in_category_by_id( $needle ) {
    $categories = get_the_category();

    if ( ! empty( $categories ) ) {
        foreach ( $categories as $category ) {
            if ( in_array( $category->term_id, $needle ) ) {
                return true;
            }
        }
    }

    return false;
}

/**
 * Get cleaned categories list
 *
 * @param bool $with_links
 * @param bool $only_one
 */
function io_the_category( $with_links = true, $only_one = false ) {
    if ( $with_links ) {
        the_category( ', ' );
    } else {
        $categories = get_the_category();

        if ( empty( $categories ) ) {
            echo 'Без категории';
        }

        if ( $only_one ) {
            echo $categories[0]->name;
        } else {
            $thelist = '';

            $i = 0;
            foreach ( $categories as $category ) {
                if ( 0 < $i ) {
                    $thelist .= ', ';
                }
                $thelist .= $category->name;

                ++ $i;
            }

            echo $thelist;
        }
    }
}

/**
 * Get first category link
 */
function io_category_link() {
    $categories = get_the_category();

    if ( empty( $categories ) ) {
        echo '/';
    } else {
        echo get_category_link( $categories[ 0 ]->term_id );
    }
}

/**
 * Get first category link
 */
function io_category_title() {
    $categories = get_the_category();

    if ( empty( $categories ) ) {
        echo '/';
    } else {
        echo $categories[ 0 ]->name;
    }
}

function io_plural( $n, $forms ) {
    return $n % 10 == 1 && $n % 100 != 11 ? $forms[ 0 ] : ( $n % 10 >= 2 && $n % 10 <= 4 && ( $n % 100 < 10 || $n % 100 >= 20 ) ? $forms[ 1 ] : $forms[ 2 ] );
}
