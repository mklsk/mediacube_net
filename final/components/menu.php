<?php

/**
 * Format nav menu title
 *
 * @param string $title
 *
 * @return string
 */
function io_spanify_title( $title ) {
    $result = '';

    for ( $i = 0; $i < mb_strlen( $title, 'UTF-8' ); $i ++ ) {
        $symbol = mb_substr( $title, $i, 1, 'UTF-8' );
        if ( $symbol != ' ' ) {
            $result .= '<span>' . $symbol . '</span>';
        } else {
            $result .= ' ';
        }
    }

    return $result;
}
