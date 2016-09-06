<?php get_header(); ?>

<div class="main-heading" style="background-color: <?php the_field( 'bg_color' ) ?>;">
    <div class="main-heading__outer">
        <div class="main-heading__bg" style="background-image: url('<?php the_field( 'bg' ) ?>');"></div>
        <div class="main-heading__inner">
            <h1 class="main-heading__title">
                <strong><?php the_field( 'title_1' ); ?></strong>
                <?php if ( get_field( 'title_2' ) ) : ?>
                    <span class="sp-1"><br></span>
                    <span><?php the_field( 'title_2' ); ?></span>
                <?php endif; ?>
                <?php if ( get_field( 'title_3' ) ) : ?>
                    <span class="sp-2"> </span>
                    <strong><?php the_field( 'title_3' ); ?></strong>
                <?php endif; ?>
            </h1>
            <div class="main-heading__content">
                <?php the_field( 'description' ); ?>
            </div>
        </div>
    </div>
</div>

<?php get_template_part( 'blocks/block', 'acf-info' ); ?>

<?php get_template_part( 'blocks/block', 'acf-form' ); ?>

<?php get_footer(); ?>
