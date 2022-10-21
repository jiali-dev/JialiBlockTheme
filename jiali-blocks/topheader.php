<header class="jiali-top-header">
    <div class="section-has-margin-transparent">
        <div class="row">
            <div class="d-flex col-lg-4 justify-content-start align-self-center">
                <?php if(is_user_logged_in()) { ?>
                    <a href="<?php echo wp_logout_url(); ?>" class="btn btn-lg jiali-btn-secondary">
                        <?php _e("Log Out", "jiali") ?>
                        <span class="jiali-avatar">
                            <?php echo get_avatar(get_current_user_id(), 60); ?>
                        </span>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo wp_login_url(); ?>" class="btn btn-lg jiali-btn-primary"><?php _e("Log In", "jiali") ?></a>
                    <a href="<?php echo wp_registration_url(); ?>" class="btn btn-lg jiali-btn-outline-primary"><?php _e("Register", "jiali") ?></a>
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
            <div class="d-flex col-lg-4 justify-content-end">
                <div class="input-group">
                    <span class="input-group-text jilai-search-icon" ><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control jilai-search-input" placeholder="<?php _e("Search", "jiali") ?>" aria-label="Search" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
    </div>
</header>

