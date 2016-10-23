<?
//don't WordPress
if($_SERVER['REQUEST_URI']=='/brands/'):?>


<div class="map_form"> 
    <div class="main-heading-contacts">
        <ul class="main-heading-contacts__list">
            <li class="main-heading-contacts__list-item">
                <div class="main-heading-contacts__label">Брендам</div>
                <div class="main-heading-contacts__text">
                    <p>+375 44 7777554
                    <br /> 
                    <a href="mailto:">info@mediacube.network</a>
                    </p>
                </div>
            </li>
        </ul>

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
</div>

<?endif;?>