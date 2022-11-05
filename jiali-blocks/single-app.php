<?php

    while(have_posts()) {
        the_post();
        $post = get_post(  );
        $args['thumbnail'] = true;
        $args['author'] = true;
        $args['date'] = true;
        $args['post'] = $post;
    ?>

    <section class="jiali-single-wrapper">
        <div class="jiali-section-custom-width-transparent">
            <div class="row jiali-single-top">
                <div class="col-md-4">
                    <?php get_template_part('template-parts/card-overlayed', null, $args ); ?>
                </div>
                <div class="col-md-8 jiali-single-info">
                    <h1 class="jiali-single-title"><?php echo get_the_title(  ) ?></h1>
                    <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
                </div>
            </div>
            <div class="jiali-single-content">
                <?php echo get_the_content( ) ?>
            </div>
            <div class="jiali-app-download-box-wrapper jiali-section-full-width-super-ultra-secondary">
                <div class="jiali-title-wrapper">
                    <h3 class="jiali-title jiali-title-secondary">
                        <?php _e("Download Box", "jiali") ?>
                    </h3>
                </div>
                <div class="jiali-app-download-box">
                    <?php if( get_field("apk_url")): ?>
                        <a href="<?php echo get_field("apk_url") ?>" class="btn jiali-btn-outline-apk btn-lg">
                            <?php _e("Go to Google Play", "jiali") ?> <i class="fa-brands fa-android"></i>
                        </a>
                    <?php endif; ?>
                    <?php if( get_field("ios_url")): ?>
                        <a href="<?php echo get_field("ios_url") ?>" class="btn jiali-btn-outline-ios btn-lg">
                            <?php _e("Go to App Store", "jiali") ?> <i class="fa-brands fa-apple"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php

        $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
        if( $related ):
            ?>  
            <section class="jiali-related-posts-wrapper">
                <div class="jiali-section-custom-width-transparent">
                    <div class="jiali-title-wrapper">
                        <h1 class="jiali-title jiali-title-primary">
                            <?php _e( "Related Articles", "jiali" ) ?>
                        </h1>
                    </div>

                    <div class="row jiali-related-posts-items">

                        <?php foreach($related as $value ): ?>

                            <div class="col-md-4">
                                <?php
                                    // $params['thumbnail'] = true;
                                    // $params['thumbnail-size'] = 'medium';
                                    $params['title'] = true;
                                    $params['excerpt'] = false;
                                    $params['author'] = true;
                                    $params['date'] = true;
                                    // $params['tags'] = true;
                                    $params['post'] = $value;
                                    $params['linked'] = true;
                                    get_template_part('template-parts/card-vertical', null, $params );
                                ?>
                            </div>

                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>
        
    <?php 
        endif; 
        wp_reset_postdata();
    ?>
    
    
<?php }

