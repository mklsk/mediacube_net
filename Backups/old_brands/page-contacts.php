<?php
/*
 Template Name: Контакты
*/
?>

<?php get_header(); ?>

<div class="main-heading __type-contacts" style="background-color: <?php the_field('bg_color') ?>;">
    <div class="main-heading__outer">
        <div class="main-heading__bg" style="background-image: url('<?php the_field('bg') ?>');"></div>
        <div class="main-heading__bg main-heading__bg_mobile"
             style="background-image: url('<?php the_field('bg_mobile') ?>');"></div>
        <div class="main-heading-contacts">
            <h1><?php the_title(); ?></h1>
            <?php if (have_rows('contacts')): ?>
                <ul class="main-heading-contacts__list">
                    <?php while (have_rows('contacts')): the_row(); ?>
                        <li class="main-heading-contacts__list-item">
                            <div class="main-heading-contacts__label"><?php the_sub_field('title') ?></div>
                            <div class="main-heading-contacts__text"><?php the_sub_field('description') ?></div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="content">
    <h2 class="m-title"><?php _e('We will hear you!', IO_THEME_NAME); ?></h2>

    <form class="forms __type-contacts">
        <input type="hidden" name="type" value="contacts">
        <div class="forms__grid">
            <div class="forms__col-1">
                <div class="form-group"><span class="i-p">
                        <span class="error_message"><?php _e('Field is obligatory', IO_THEME_NAME); ?></span>
                  <input type="text" name="name" id="name" class="i-p__field" required="required">
                  <label for="name" class="i-p__label"><span
                          class="i-p__label-content"><?php _e('Name', IO_THEME_NAME); ?></span></label></span>
                </div>
                <div class="form-group"><span class="i-p">
                        <span class="error_message"><?php _e('Field format is', IO_THEME_NAME); ?> name@domain.ltd</span>
                  <input type="email" name="email" id="email" class="i-p__field" required="required">
                  <label for="email" class="i-p__label"><span
                          class="i-p__label-content"><?php _e('Email', IO_THEME_NAME); ?></span></label></span>
                </div>
                <div class="form-group"><span class="i-p">
                        <span class="error_message"><?php _e('Field format is', IO_THEME_NAME); ?> +375291234567</span>
                  <input type="tel" name="phone" id="phone" pattern="[\+]\d*" class="i-p__field" required="required">
                  <label for="phone" class="i-p__label"><span
                          class="i-p__label-content"><?php _e('Phone', IO_THEME_NAME); ?></span></label></span>
                </div>
            </div>
            <div class="forms__col-2">
                <div class="sel-outer">
                    <select name="help" placeholder="<?php _e('How can we help you?', IO_THEME_NAME); ?>"
                            class="cs-select cs-skin-underline">
                        <option selected hidden disabled><?php _e('How can we help you?', IO_THEME_NAME); ?></option>
                        <?php if (have_rows('options')): ?>
                            <?php while (have_rows('options')): the_row(); ?>
                                <option><?php the_sub_field('title') ?></option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="ta-outer">
                    <textarea name="message" placeholder="<?php _e('Message', IO_THEME_NAME); ?>"
                              class="t-a"></textarea>
                    <div class="ta-bdr">
                        <div class="ta-bdr__tl"></div>
                        <div class="ta-bdr__tr"></div>
                        <div class="ta-bdr__bl"></div>
                        <div class="ta-bdr__br"></div>
                    </div>
                </div>
                <div class="forms__actions">
                    <button class="btn btn-contact"><span class="text_button"><?php _e('Send', IO_THEME_NAME); ?></span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php get_footer(); ?>
