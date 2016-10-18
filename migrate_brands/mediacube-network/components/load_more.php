<?php

/**
 * Generate "Load more" tag
 *
 * @param $attrs
 */
function io_load_more( $attrs ) {
    if ( get_next_posts_link() ) {
        echo '<div class="blog-loader"
			data-type="ias"
			data-container="' . $attrs[ 'container' ] . '"
			data-item="' . $attrs[ 'item' ] . '"
			data-pagination="' . $attrs[ 'pagination' ] . '"
			data-next="' . get_next_posts_page_link() . '">
          <div class="blog-loader__tp"></div>
          <div class="blog-loader__bt"></div>
        </div>';
    }
}
