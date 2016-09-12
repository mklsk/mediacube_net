<?php
/*
 Template Name: Стать партнёром
*/
?>

<?php get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/partner.css">

<div class="main-heading" style="background-color: <?php the_field('bg_color') ?>;">
    <div class="main-heading__outer">
        <div class="main-heading__bg" style="background-image: url('<?php the_field('bg') ?>');"></div>
        <div class="main-heading__inner">
            <h1 class="main-heading__title">
                <strong><?php the_field('title_1'); ?></strong>
                <?php if (get_field('title_2')) : ?>
                    <span class="sp-1"><br></span>
                    <span><?php the_field('title_2'); ?></span>
                <?php endif; ?>
                <?php if (get_field('title_3')) : ?>
                    <span class="sp-2"> </span>
                    <strong><?php the_field('title_3'); ?></strong>
                <?php endif; ?>
            </h1>
            <div class="main-heading__content">
                <?php the_field('description'); ?>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <form class="forms __type-partners">
        <h2 class="m-title"><?php _e('Joining Mediacube Network', IO_THEME_NAME); ?></h2>

        <input type="hidden" name="type" value="partners">
        <div class="forms__grid">
            <div class="forms__col-1">
                <div class="form-group">
                    <span class="i-p">
                        <span class="error_message"><?php _e('Field is obligatory', IO_THEME_NAME); ?></span>
                      <input type="text" name="first_name" id="first_name" required="required" class="i-p__field">
                      <label for="first_name" class="i-p__label">
                          <span class="i-p__label-content"><?php _e('First Name', IO_THEME_NAME); ?></span>
                      </label>
                    </span>
                </div>
                <div class="form-group">
                    <span class="i-p">
                        <span class="error_message"><?php _e('Field is obligatory', IO_THEME_NAME); ?></span>
                      <input type="text" name="last_name" id="last_name" required="required" class="i-p__field">
                      <label for="last_name" class="i-p__label">
                          <span class="i-p__label-content"><?php _e('Last Name', IO_THEME_NAME); ?></span>
                      </label>
                    </span>
                </div>
                <div class="form-group">
                    <span class="i-p __type-birtday">
                        <span class="error_message"><?php _e('Field format is', IO_THEME_NAME); ?> dd.mm.yyyy</span>
                      <input type="text" name="birthday" id="birthday" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required="required" class="i-p__field">
                      <label for="birthday" class="i-p__label">
                          <span class="i-p__label-content"><?php _e('Date of Birth', IO_THEME_NAME); ?></span>
                      </label>
                    </span>
                </div>
            </div>
            <div class="forms__col-2">
                <div class="form-group">
                    <span class="i-p">
                        <span class="error_message"><?php _e('Field format is', IO_THEME_NAME); ?> name@domain.ltd</span>
                      <input type="email" name="email" id="email" required="required" class="i-p__field">
                      <label for="email" class="i-p__label">
                          <span class="i-p__label-content"><?php _e('Email', IO_THEME_NAME); ?></span>
                      </label>
                    </span>
                </div>
                <div class="form-group">
                    <span class="i-p">
                        <span class="error_message"><?php _e('Field format is', IO_THEME_NAME); ?> +375291234567</span>
                      <input type="tel" name="phone" id="phone" pattern="[\+]\d*" required="required" class="i-p__field">
                      <label for="phone" class="i-p__label">
                          <span class="i-p__label-content"><?php _e('Phone', IO_THEME_NAME); ?></span>
                      </label>
                    </span>
                </div>
                <div class="form-group">
                    <span class="i-p">
                        <span class="error_message"><?php _e('Field format is', IO_THEME_NAME); ?> http://domain.ltd/path</span>
                      <input type="url" name="link" id="link" class="i-p__field">
                      <label for="link" class="i-p__label">
                          <span class="i-p__label-content"><?php _e('Link to your profile in social networks', IO_THEME_NAME); ?></span>
                      </label>
                    </span>
                    <span class="help-block">(<?php _e('not obligatory', IO_THEME_NAME); ?>)</span>
                </div>
            </div>

            <div class="form-group">
                <span class="i-p">
                    <span class="error_message"><?php _e('Field format is', IO_THEME_NAME); ?> http://domain.ltd/path</span>
                  <input type="url" name="link2" id="link2" required="required" class="i-p__field">
                  <label for="link2" class="i-p__label">
                      <span class="i-p__label-content"><?php _e('Link to your YouTube-channel', IO_THEME_NAME); ?></span>
                  </label>
                </span>
            </div>
        </div>
        <div class="forms__actions">
            <button class="btn-partners"><span class="text_button"><?php _e('Join', IO_THEME_NAME); ?></span></button>
        </div>
    </form>
</div>

<?php get_footer(); ?>
