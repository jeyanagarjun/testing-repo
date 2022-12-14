<form id="signin" action="login" method="post" class="form-material">
    <p class="status"></p>
    <div class="form-group form-float">
        <div class="form-line">
            <label class="form-label"><?php esc_html_e( 'Username', 'rekord' ); ?></label>
            <input id="username" class="form-control" type="text" name="username">
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            <label class="form-label"><?php esc_html_e( 'Password', 'rekord' ); ?></label>
            <input id="password" class="form-control" type="password" name="password">
        </div>
    </div>

    <input class="submit_button btn btn-outline-primary btn-sm pl-4 pr-4" type="submit"
        value="<?php esc_html_e( 'Login', 'rekord' ); ?>" name="submit">
    <div class="pt-3">
        <small>
            <div class="d-flex">
          
                <?php if ( get_option( 'users_can_register' ) ) : ?>
                <?php if(function_exists('pmpro_login_forms_handler_nav')){ ?>
                      <?php   pmpro_login_forms_handler_nav( 'login' ); ?>
                <?php }else{ ?>
                    <a class="lost"
                    href="<?php echo wp_lostpassword_url(); ?>"><?php esc_html_e( 'Lost your password?', 'rekord' ); ?></a>

                <a class="ml-auto"
                    href="<?php echo esc_url( get_page_link(get_theme_mod('page_user_register')) ); ?>"><?php esc_html_e( 'Create An Account?', 'rekord' ); ?></a>
                <?php } ?>
                <?php endif;?>
            </div>
        </small>
    </div>
    <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
</form>