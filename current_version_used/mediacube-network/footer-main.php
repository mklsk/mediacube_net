<!-- Footer-->
<div class="footer">
    <div class="footer__inner">
        <div class="footer-socials">
            <span class="footer-socials__label"><?php _e('Подпишись', IO_THEME_NAME); ?>:</span>
            <?php if (get_field('social_vk', 'options')) : ?>
                <span class="footer-socials__item">
                    <a href="<?php the_field('social_vk', 'options'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/vkontakte-logo.png"></a>
                </span>
            <?php endif; ?>
            <?php if (get_field('social_fb', 'options') and get_field('social_vk', 'options')) : ?>
                
            <?php endif; ?>
            <?php if (get_field('social_vk', 'options')) : ?>
                <span class="footer-socials__item">
                    <a href="<?php the_field('social_fb', 'options'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/fb-logo.png"></a>
                </span>
            <?php endif; ?>
            <?php if ((get_field('social_fb', 'options') or get_field('social_vk', 'options')) and get_field('social_youtube', 'options')) : ?>
            <?php endif; ?>
            <?php if (get_field('social_youtube', 'options')) : ?>
                <span class="footer-socials__item">
                    <a href="<?php the_field('social_youtube', 'options'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/youtube-logo.png"></a>
                </span>
            <?php endif; ?>
            <a href="<?php echo get_option('admin_email') ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/email-logo.png"></a>

        </div>
        <div class="footer-partners">
            <span class="footer-socials__label"><?php _e('В партнерстве с', IO_THEME_NAME); ?>:</span>
            <a href="http://google.com"><div class="footer-img-wrap google-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/google-logo.png"></div></a>
            <a href="http://youtube.com"><div class="footer-img-wrap youtube-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/youtube-logo-light.png"></div></a>
            <a href="http://www.epidemicsound.com/"><div class="footer-img-wrap es-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/es-logo.png"></div></a>
            <a href="https://pladform.ru/"><div class="footer-img-wrap plad-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/plad-logo.png"></div></a>
            <a href="https://www.tubebuddy.com/"><div class="footer-img-wrap buddy-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tubebuddy-logo.png"></div></a>
            <div id="preload1"></div>
            <div id="preload2"></div> 
            <div id="preload3"></div> 
            <div id="preload4"></div> 
            <div id="preload5"></div> 
        </div>
    </div>
</div>

<?php if ( is_single() ) : ?>
<div class="modal modal-partnersend modal-subscribe">
    <div class="modal-dialog">
        <div class="modal-line">
            <div class="modal-line__tl"></div>
            <div class="modal-line__tr"></div>
            <div class="modal-line__bl"></div>
            <div class="modal-line__br"></div>
        </div>
        <div class="modal-content">
            <button type="button" data-dismiss="modal" aria-label="Close" class="modal-close"><span
                    aria-hidden="true"></span></button>
            <div class="modal-header">
                <h2 class="m-title"><?php _e('Subscribed!', IO_THEME_NAME); ?></h2>
            </div>
            <div class="modal-body">
                <p><?php _e('Thank you for your trust. We\'ll do our best not to disappoint you.', IO_THEME_NAME); ?></p>
            </div>
        </div>
    </div>
</div>
<?php elseif ( is_page_template('page-contacts.php') ) : ?>
<div class="modal modal-partnersend modal-contacts">
    <div class="modal-dialog">
        <div class="modal-line">
            <div class="modal-line__tl"></div>
            <div class="modal-line__tr"></div>
            <div class="modal-line__bl"></div>
            <div class="modal-line__br"></div>
        </div>
        <div class="modal-content">
            <button type="button" data-dismiss="modal" aria-label="Close" class="modal-close"><span
                    aria-hidden="true"></span></button>
            <div class="modal-header">
                <h2 class="m-title"><?php _e('Message sent!', IO_THEME_NAME); ?></h2>
            </div>
            <div class="modal-body">
                <p><?php _e('Thank you for your message. We will respond as soon as we can.', IO_THEME_NAME); ?></p>
            </div>
        </div>
    </div>
</div>
<?php elseif ( is_page_template('page-partners.php') ) : ?>
<div class="modal modal-partnersend modal-partners">
    <div class="modal-dialog">
        <div class="modal-line">
            <div class="modal-line__tl"></div>
            <div class="modal-line__tr"></div>
            <div class="modal-line__bl"></div>
            <div class="modal-line__br"></div>
        </div>
        <div class="modal-content">
            <button type="button" data-dismiss="modal" aria-label="Close" class="modal-close"><span
                    aria-hidden="true"></span></button>
            <div class="modal-header">
                <h2 class="m-title"><?php _e('Application sent!', IO_THEME_NAME); ?></h2>
            </div>
            <div class="modal-body">
                <p><?php _e('We will send you the result of your application by email within 3 working days.', IO_THEME_NAME); ?></p>
                <p><?php _e('Welcome to MediaCube Network!', IO_THEME_NAME); ?></p>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="modal-backdrop"></div>

<!-- // SCRIPTS SECTION // -->
<?php wp_footer(); ?>
<!-- // end SCRIPTS SECTION // -->
<?php the_field('counters', 'options', false); ?>
</div>
</body>
</html>
