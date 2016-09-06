<?php
/*
 Template Name: Главная
*/
?>

<?php get_header(); ?>

<!-- Main Content-->
<div class="main-content">
    <div class="main-partnership">
        <h2 class="main-partnership__title"><?php the_title(); ?></h2>
        <?php the_field( 'description' ); ?>
    </div>
    <?php if ( have_rows( 'enters' ) ): ?>
        <div class="main-enters">
            <ul class="main-enters__list">
                <?php while ( have_rows( 'enters' ) ): the_row(); ?>
                    <li class="main-enters__list-item __type-brands">
                        <a href="<?php the_sub_field( 'link' ) ?>" class="main-enters__item">
                            <div class="main-enters__bg-p" style="background-image: url('<?php the_sub_field( 'bg' ) ?>');"></div>
                            <div class="main-enters__bg-a" style="background-image: url('<?php the_sub_field( 'bg_active' ) ?>');">
                                <?php if ( get_sub_field( 'video' ) ) : ?>
                                    <video autoplay="true" loop="true">
                                        <source src="<?php the_sub_field( 'video' ) ?>" type="video/mp4">
                                    </video>
                                <?php endif; ?>
                            </div>
                            <div class="main-enters__content" id="<?php echo substr(get_sub_field( 'link' ), 25, -1) ?>">
								<h2 class="main-enters__title"><?php the_sub_field( 'title' ) ?></h2>		
                                <p><?php the_sub_field( 'description' ) ?></p>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
<!-- / Main Content-->

<?php get_footer( 'main' ); ?>
