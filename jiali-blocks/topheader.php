<header class="jiali-top-header">
   <div class="jiali-x-margin">
        <div class="row">
            <div class="d-flex col-lg-4 justify-content-start align-self-center">
                <?php if(is_user_logged_in()) { ?>
                    <a href="<?php echo wp_logout_url(); ?>" class="btn jiali-btn-secondary">
                        <?php _e("Log out", "jiali") ?>
                        <span class="jiali-avatar align-middle">
                            <?php echo get_avatar(get_current_user_id(), 60); ?>
                        </span>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo wp_login_url(); ?>" class="btn jiali-btn-primary"><?php _e("Log In", "jiali") ?></a>
                    <a href="<?php echo wp_registration_url(); ?>" class="btn jiali-btn-outline-primary"><?php _e("Register", "jiali") ?></a>
                <?php } ?>
            </div>
            <div class="d-flex col-lg-4 justify-content-center">
                <?php
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>

                    <a href="<?php site_url('/') ?>" >
                        <?php
                            if( has_custom_logo() ) {
                                echo '<img src="' . esc_url( $logo[0] ) . '" class="jiali-topheader-logo" alt="' . get_bloginfo( 'name' ) . '">';
                            } else {
                                echo '<h1>' . get_bloginfo('name') . '</h1>';
                            }
                        ?>
                    </a>
            </div>
            <div class="d-flex col-lg-4 justify-content-end">z</div>
        </div>
   </div>
</header>