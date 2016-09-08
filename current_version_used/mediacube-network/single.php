<?php get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/single.css">

<?php if ( have_posts() ) : ?>
    <div class="main-heading __type-article">
            <div style="background-image: url(<?php the_field( 'image' ); ?>)" class="main-heading__bg"></div>
                <div class="abs_start">
                    <div class="rel_start">
                        <p class="small-cat"><?php io_the_category( false, true ); ?></p>
                        <h2 class="big-title"><?php the_title(); ?></h2>
                        <div class="stop-block"></div>
                    </div>
                </div>
    </div>
    <div class="blog-article">
        <div class="editor-content">
            <ul class="entry-meta">
                <li class="entry-meta__item"><?php echo get_the_date( 'j F Y' ); ?></li>
                <li class="entry-meta__item"><?php the_field('meta_1'); ?></li>
                <li class="entry-meta__item"><?php the_field('meta_2'); ?></li>
            </ul>
            <?php get_template_part( 'blocks/block', 'acf-single'); ?>


        </div>

        <div class="article-social">
            <a href="#" data-sharer="facebook" data-url="<?php the_permalink(); ?>" class="article-social__item __type-fb sharer"></a>
            <a href="#" data-sharer="twitter" data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" class="article-social__item __type-tw sharer"></a>
            <a href="#" data-sharer="googleplus" data-url="<?php the_permalink(); ?>" class="article-social__item __type-gp sharer"></a>
            <a href="#" data-sharer="vk" data-url="<?php the_permalink(); ?>" class="article-social__item __type-vk sharer"></a>
        </div>
        <div class="similar-articles">
            <h2 class="m-title similar"><?php _e( 'Read more news on the topic', IO_THEME_NAME ); ?></h2>

            <ul class="articles-list">
                <?php $related = get_field( 'related' ); ?>
                <?php $i = 0; ?>
                <?php if ( $related ) : ?>
                    <?php foreach ( $related as $post ): $i ++; ?>
                        <?php setup_postdata( $post ); ?>

                        <li class="articles-list__list-item <?php echo ( $i > 2 ) ? '__hide-tablet' : ''; ?>">
                            <div class="articles-list__item">
                                <div class="articles-list__figure">
                                    <a href="<?php the_permalink(); ?>" style="background-image: url(<?php the_field( 'image' ); ?>)" class="articles-list__figure-item"></a>
                                </div>
                                <div class="articles-list__item-content">
                                    <div class="articles-list__item-meta"><?php io_the_category( true, true ); ?></div>
                                    <div class="articles-list__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    <p><?php echo get_field( 'anonce' ); ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php io_backup_original_query(); ?>

                    <?php $related = new WP_Query( array(
                        'ignore_sticky_posts' => true,
                        'posts_per_page' => 3,
                        'orderby' => 'rand',
                        'post__not_in' => array( get_the_id() )
                    ) ); ?>

                    <?php if ( $related->have_posts() ) : ?>
                        <?php while ( $related->have_posts() ) : $i ++;
                            $related->the_post(); ?>
                            <li class="articles-list__list-item <?php echo ( $i > 2 ) ? '__hide-tablet' : ''; ?>">
                                <div class="articles-list__item">
                                    <div class="articles-list__figure">
                                        <a href="<?php the_permalink(); ?>" style="background-image: url(<?php the_field( 'image' ); ?>)" class="articles-list__figure-item"></a>
                                    </div>
                                    <div class="articles-list__item-content">
                                        <div class="articles-list__item-meta"><?php io_the_category( true, true ); ?></div>
                                        <div class="articles-list__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <p><?php echo get_field( 'anonce' ); ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php io_restore_original_query(); ?>
                <?php endif ?>
            </ul>
        </div>
    </div>
    <div class="subscribe-blog">
        <div class="subscribe-blog__inner">
            <h2 class="m-title"><?php _e('Stay tuned!', IO_THEME_NAME); ?></h2>
            <form class="subscribe-blog__form">
                <input type="hidden" name="type" value="subscribe">
                <div class="subscribe-blog__input">
                    <div class="subscribe-blog__input-inner">
                        <input type="email" name="email" placeholder="<?php _e('Email', IO_THEME_NAME); ?>" required="required" class="i-p">
                        <div class="ta-bdr">
                            <div class="ta-bdr__tl"></div>
                            <div class="ta-bdr__tr"></div>
                            <div class="ta-bdr__bl"></div>
                            <div class="ta-bdr__br"></div>
                        </div>
                    </div>
                </div>
                <div class="subscribe-blog__btn">
                    <button class="btn"><?php _e('Subscribe now!', IO_THEME_NAME); ?></button>
                </div>
            </form>
            <p class="subscribe-blog__note"><?php _e('Twice a month, no spam', IO_THEME_NAME); ?></p>
        </div>
    </div>
<?php else : ?>
    <?php get_template_part( 'blocks/block', '404-error' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
