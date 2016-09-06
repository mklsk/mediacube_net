<?php

function io_comments_list( $comment, $args, $depth ) {
    $GLOBALS[ 'comment' ] = $comment;
    ?>
    <div class="comment" id="comment-<?php comment_ID(); ?>">
        <div class="comment__userpic">
            <?php echo get_avatar( $comment, 64 ); ?>
        </div>
        <header class="comment__header">
            <div class="comment__username"><?php echo get_comment_author(); ?></div>
            <time class="comment__date" datetime="<?php echo get_comment_date( 'Y-m-d' ) . 'T' . get_comment_time( 'H:i:s' ); ?>">
                <?php echo get_comment_date( 'd / M / Y' ) . ', ' . get_comment_time(); ?>
            </time>
        </header>
        <div class="comment__body"><?php comment_text(); ?></div>
        <footer class="comment__footer">
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <?php _e( 'Your comment is awaiting moderation.' ); ?>
            <?php else : ?>
                <?php comment_reply_link( array_merge( $args, array(
                    'reply_text' => __( 'Reply', 'rada' ),
                    'depth' => $depth,
                    'max_depth' => $args[ 'max_depth' ]
                ) ) ); ?>
            <?php endif; ?>
        </footer>
    </div>
    <?php
}
