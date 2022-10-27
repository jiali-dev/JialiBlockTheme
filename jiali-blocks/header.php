<header class="jiali-header">
    <div class="jiali-section-custom-width-transparent">
        <div class="row jiali-header-top">
            <div class="col-lg-4 jiali-search">
                <div class="input-group">
                    <a href="<?php echo esc_url(site_url('/search')); ?>" class="input-group-text jilai-search-icon" ><i class="fas fa-search"></i></a>
                    <input type="text" class="form-control jilai-search-input" placeholder="<?php _e("Search", "jiali") ?>" aria-label="Search" aria-describedby="basic-addon1">
                </div>
            </div>
            
            <div class="col-lg-4 jiali-logo">
                <?php
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>

                    <a href="<?php site_url('/') ?>" >
                        <?php
                            if( has_custom_logo() ) {
                                echo '<img src="' . esc_url( $logo[0] ) . '" class="jiali-header-logo" alt="' . get_bloginfo( 'name' ) . '">';
                            } else {
                                echo '<h1>' . get_bloginfo('name') . '</h1>';
                            }
                        ?>
                    </a>
            </div>

            <div class="col-lg-4 jiali-login">
                <?php if(is_user_logged_in()) { ?>
                    <a href="<?php echo wp_logout_url(); ?>" class="btn jiali-btn-secondary">
                        <?php _e("Log Out", "jiali") ?>
                        <span class="jiali-avatar">
                            <?php echo get_avatar(get_current_user_id(), 60); ?>
                        </span>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo wp_login_url(); ?>" class="btn jiali-btn-primary"><?php _e("Log In", "jiali") ?></a>
                    <a href="<?php echo wp_registration_url(); ?>" class="btn jiali-btn-outline-primary"><?php _e("Register", "jiali") ?></a>
                <?php } ?>
            </div>
            
        </div>
    </div>
    <hr class="jiali-divider">
    <div class="jiali-top-menu-wrapper">
        <div class="jiali-section-custom-width-transparent">
            <nav class="navbar navbar-expand-md jiali-navbar" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#jiali-top-menu" aria-controls="jiali-top-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse jiali-top-menu',
                        'container_id'      => 'jiali-top-menu',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>
                <div class="jiali-social-icons">
                    <a class="" href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a class="" href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </nav>
        </div>
    </div>
    
    <div class="jiali-site-title">
        <h1>وبسایت دکتر محمد رادگودرزی</h1>
        <p>فوق تخصص قلب اطفال</p>
        <div>
            <a href="#jiali-services" class="btn jiali-btn-secondary btn-lg"><?php _e("See Our Service", "jiali") ?></a>
            <a href="#jiali-reserve" class="btn jiali-btn-primary btn-lg"><?php _e("Reserve apointment", "jiali") ?></a>
        </div>
    </div>
</header>


