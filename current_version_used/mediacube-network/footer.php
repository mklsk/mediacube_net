<!-- Footer-->
<div class="footer">
    <div class="footer__inner">
        <div class="footer-socials">
            <span class="footer-socials__label"><?php _e('We are in social networks', IO_THEME_NAME); ?>:</span>
            <?php if (get_field('social_fb', 'options')) : ?>
                <span class="footer-socials__item">
                    <a href="<?php the_field('social_fb', 'options'); ?>">FACEBOOK</a>
                </span>
            <?php endif; ?>
            <?php if (get_field('social_fb', 'options') and get_field('social_vk', 'options')) : ?>
                <span class="footer-socials__label">,</span>
            <?php endif; ?>
            <?php if (get_field('social_vk', 'options')) : ?>
                <span class="footer-socials__item">
                    <a href="<?php the_field('social_vk', 'options'); ?>">VKONTAKTE</a>
                </span>
            <?php endif; ?>
            <?php if ((get_field('social_fb', 'options') or get_field('social_vk', 'options')) and get_field('social_youtube', 'options')) : ?>
                <span class="footer-socials__label">,</span>
            <?php endif; ?>
            <?php if (get_field('social_youtube', 'options')) : ?>
                <span class="footer-socials__item">
                    <a href="<?php the_field('social_youtube', 'options'); ?>">YOUTUBE</a>
                </span>
            <?php endif; ?>
        </div>
        <div class="footer-cpr">© MediaCube Network <?php echo date('Y') ?></div>
        <div class="footer-made"><?php _e('Made in', IO_THEME_NAME); ?>
            <a href="http://hainteractive.com" target="_blank">HA</a>
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
