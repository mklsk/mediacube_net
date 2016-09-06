<?php get_header(); ?>

<div class="main-heading"
     style="background-color: <?php the_field('bg_color', get_option('page_for_posts')) ?>;">
  <div class="main-heading__outer">
    <div class="main-heading__bg"
         style="background-image: url('<?php the_field('bg', get_option('page_for_posts')) ?>');"></div>
    <div class="main-heading__inner">
      <h1 class="main-heading__title">
        <strong><?php the_field('title_1', get_option('page_for_posts')); ?></strong>
        <?php if (get_field('title_2', get_option('page_for_posts'))) : ?>
          <span class="sp-1"><br></span>
          <span><?php the_field('title_2', get_option('page_for_posts')); ?></span>
        <?php endif; ?>
        <?php if (get_field('title_3', get_option('page_for_posts'))) : ?>
          <span class="sp-2"> </span>
          <strong><?php the_field('title_3', get_option('page_for_posts')); ?></strong>
        <?php endif; ?>
      </h1>
    </div>
  </div>
</div>

<div class="blog">
  <?php io_backup_original_query(); ?>
  <?php $sticky = array_slice(array_reverse(get_option('sticky_posts')), 0, 1); ?>
  <?php if (!empty($sticky)) : ?>
    <?php $sticky = new WP_Query(array(
      'post__in' => $sticky,
      'ignore_sticky_posts' => TRUE,
      'nopaging' => TRUE,
      ''
    )); ?>

    <?php if ($sticky->have_posts()) : ?>
      <?php while ($sticky->have_posts()) : $sticky->the_post(); ?>
        <div class="featured-article">
          <div class="featured-article__col-1">
            <div style="background-image: url(<?php the_field('image'); ?>)"
                 class="featured-article__figure">
              <div style="background-image: url(<?php the_field('image'); ?>)"
                   class="featured-article__figure-img">
              </div>
            </div>
          </div>
          <div class="featured-article__col-2">
            <div
              class="featured-article__meta"><?php io_the_category(TRUE, TRUE); ?></div>
            <div class="featured-article__title"><a
                href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
            <div
              class="featured-article__description"><?php echo get_field('anonce'); ?></div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  <?php endif; ?>

  <?php io_restore_original_query(); ?>

  <?php $categories = get_categories(); ?>

  <?php if (count($categories) > 0) : ?>
    <div class="blog-filters">
      <div class="blog-filters__scene">
        <a href="#" class="blog-filters-prev"></a><a href="#"
                                                     class="blog-filters-next"></a>
        <div class="blog-filters__frame">
          <ul class="blog-filters__list">
            <li
              class="blog-filters__list-item<?php echo is_home() ? ' __active' : ''; ?>">
              <a
                href="<?php echo get_permalink(get_option('page_for_posts')); ?>"
                class="blog-filters__item">Все</a>
            </li>
            <?php foreach ($categories as $category) : ?>
              <li
                class="blog-filters__list-item<?php echo (get_query_var('cat') == $category->term_id) ? ' __active' : ''; ?>">
                <a href="<?php echo get_term_link($category); ?>"
                   class="blog-filters__item"><?php echo $category->cat_name; ?></a>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <ul class="articles-list">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('blocks/block', 'post-card'); ?>
      <?php endwhile; ?>
    <?php else : ?>
      <li class="articles-list__list-item">
        <div class="articles-list__item">
          <div class="articles-list__item-content">
            <div
              class="articles-list__title"><?php _e('This section is empty.', IO_THEME_NAME); ?></div>
          </div>
        </div>
      </li>
    <?php endif; ?>
  </ul>

  <?php io_load_more(array(
    'container' => '.articles-list',
    'item' => '.articles-list__list-item',
    'pagination' => '.blog-loader'
  )); ?>


</div>

<div class="subscribe-blog">
  <div class="subscribe-blog__inner">
    <h2 class="m-title"><?php _e('Stay tuned!', IO_THEME_NAME); ?></h2>
    <form class="subscribe-blog__form">
      <input type="hidden" name="type" value="subscribe">
      <div class="subscribe-blog__input">
        <div class="subscribe-blog__input-inner">
          <input type="email" name="email"
                 placeholder="<?php _e('Email', IO_THEME_NAME); ?>"
                 required="required" class="i-p">
          <div class="ta-bdr">
            <div class="ta-bdr__tl"></div>
            <div class="ta-bdr__tr"></div>
            <div class="ta-bdr__bl"></div>
            <div class="ta-bdr__br"></div>
          </div>
        </div>
      </div>
      <div class="subscribe-blog__btn">
        <button
          class="btn"><?php _e('Subscribe now!', IO_THEME_NAME); ?></button>
      </div>
    </form>
    <p
      class="subscribe-blog__note"><?php _e('Twice a month, no spam', IO_THEME_NAME); ?></p>
  </div>
</div>

<?php get_footer(); ?>
