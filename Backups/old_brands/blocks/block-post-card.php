<li class="articles-list__list-item animate">
  <div class="articles-list__item">
    <div class="articles-list__figure">
      <a href="<?php the_permalink(); ?>"
         style="background-image: url(<?php the_field('image'); ?>)"
         class="articles-list__figure-item">
        <div style="background-image: url(<?php the_field('image'); ?>)"
             class="articles-list__figure-img">
        </div>
      </a>
    </div>
    <div class="articles-list__item-content">
      <div
        class="articles-list__item-meta"><?php io_the_category(TRUE, TRUE); ?></div>
      <div class="articles-list__title"><a
          href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
      <p><?php echo get_field('anonce'); ?></p>
    </div>
  </div>
</li>

