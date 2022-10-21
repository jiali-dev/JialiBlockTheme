<header class="jiali-top-menu-wrapper">
    <div class="jiali-section-has-no-margin-gray">
        <div class="jiali-section-has-margin-transparent">
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
</header>