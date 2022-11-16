<?php
    $menu_name = 'primary'; //menu slug
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
?>

<header class="jiali-header">
    <div class="jiali-section-full-width-black">

        <div class="jiali-section-custom-width-transparent">
            <div class="row jiali-header-top">
                
                <div class="col-6 jiali-social-icons">
                    <i class="fa-brands fa-whatsapp"></i>
                    <i class="fa-solid fa-mobile"></i> 09375318813 
                    <!-- - <a class="" href="https://www.instagram.com/nini.heart/"><i class="fa-brands fa-instagram"></i></a> -->
                </div>

                <div class="col-6 jiali-login">
                    <?php if(is_user_logged_in()) { ?>
                        <a href="<?php echo wp_logout_url(); ?>" class="btn jiali-btn-outline-white btn-sm">
                            <?php _e("Log Out", "jiali") ?>
                            <!-- <span class="jiali-avatar">
                                <?php // echo get_avatar(get_current_user_id(), 60); ?>
                            </span> -->
                        </a>
                    <?php } else { ?>
                        <a href="<?php echo wp_login_url(); ?>" class="btn jiali-btn-white btn-sm"><?php _e("Log In", "jiali") ?></a>
                        <a href="<?php echo wp_registration_url(); ?>" class="btn jiali-btn-outline-white btn-sm"><?php _e("Register", "jiali") ?></a>
                    <?php } ?>
                </div>
                
            </div>
        </div>

    </div>
    <!-- <hr class="jiali-divider"> -->
    <div id="jiali-primary-menu-wrapper" class="jiali-section-full-width-gray">
        <div class="jiali-section-custom-width-transparent">

            <nav id="jiali-primary-menu">
        
                <div class="jiali-primary-menu-items-wrapper">

                    <div class="jiali-hamburger-btn">
                        <span class="jiali-bar"></span>
                        <span class="jiali-bar"></span>
                        <span class="jiali-bar"></span>
                    </div>
                    
                    <?php 
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class' => 'jiali-primary-menu-items'
                        ) )
                    ?>
    
                </div>

                <div class="jiali-navbar-brand-wrapper">
                    <a class="jiali-navbar-brand" href="<?php echo site_url('/') ?>">
                        <?php
                                if( has_custom_logo() ) {
                                    echo '<img src="' . esc_url( $logo[0] ) . '" class="jiali-logo-img" alt="' . get_bloginfo( 'name' ) . '">';
                                } else {
                                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                                }
                            ?>
                    </a>
                </div>
    
            </nav>
    
        </div>
    </div>
</header>