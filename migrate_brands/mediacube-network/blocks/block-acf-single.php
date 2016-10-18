<?php
if ( have_rows( 'content' ) ):
    while ( have_rows( 'content' ) ):
        the_row();
        switch ( get_row_layout() ):
            case 'wysiwyg':
                ?>
                <?php the_sub_field( 'wysiwyg' ); ?>
                <?php
                break;
            case 'image_with_caption':
                ?>
                <p class="img-with-caption">
                    <img src="<?php the_sub_field( 'image' ); ?>">
                    <small class="caption"><?php the_sub_field( 'caption' ); ?></small>
                </p>
                <?php
                break;
        endswitch;
    endwhile;
endif;
?>
