<?php
   
    $recent_media_query = new WP_Query(array(
            'post_type' => array( 'multimedia' ),
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 6,
            'paged' => 1
        )
    );

    $recent_media = $recent_media_query->posts;
    
    if( $recent_media && count($recent_media) > 2 ): 
        $args['thumbnail'] = true;
        $args['title'] = true;
        $args['views'] = true;
        $args['author'] = true;
        $args['date'] = true;
        $args['tags'] = true;
        $args['linked'] = true;
        $args['overlay-color'] = "super-dark-secondary"
    ?>  

    <section class="jiali-recent-media-wrapper">
        <div class="jiali-section-custom-width-transparent">
            <div class="jiali-title-wrapper">
                <h1 class="jiali-title jiali-title-primary">
                    <?php _e( "Recent Media", "jiali" ) ?>
                </h1>
            </div>

            <div class="row jiali-posts-items">

                <div class="col-md-6">
                    <?php
                        $args['thumbnail-size'] = 'large';
                        $args['excerpt'] = true;
                        $args['post'] = get_post($recent_media[0]->ID);
                        get_template_part('template-parts/card-overlayed', null, $args );
                    ?>
                </div>
                <div class="col-md-3">
                    <?php
                        $args['thumbnail-size'] = 'medium';
                        $args['excerpt'] = false;
                        $args['post'] = get_post($recent_media[1]->ID);
                        get_template_part('template-parts/card-overlayed', null, $args );
                    ?>
                </div>
                <div class="col-md-3">
                    <?php
                        $args['thumbnail-size'] = 'medium';
                        $args['excerpt'] = false;
                        $args['post'] = get_post($recent_media[2]->ID);
                        get_template_part('template-parts/card-overlayed', null, $args );
                    ?>
                </div>
                <?php if( count($recent_media) >= 6 ): ?>
                    <div class="col-md-3">
                        <?php
                            $args['thumbnail-size'] = 'medium';
                            $args['excerpt'] = false;
                            $args['post'] = get_post($recent_media[3]->ID);
                            get_template_part('template-parts/card-overlayed', null, $args );
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                            $args['thumbnail-size'] = 'medium';
                            $args['excerpt'] = false;
                            $args['post'] = get_post($recent_media[4]->ID);
                            get_template_part('template-parts/card-overlayed', null, $args );
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                            $args['thumbnail-size'] = 'large';
                            $args['excerpt'] = true;
                            $args['post'] = get_post($recent_media[5]->ID);
                            get_template_part('template-parts/card-overlayed', null, $args );
                        ?>
                    </div>
                <?php endif; ?>


            </div>
            
        </div>
    </section>
<?php endif; ?>

