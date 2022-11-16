<?php
    // Give vistor country
    $location_contry = strtolower( jiali_ip_info("visitor", "country") );

    while(have_posts()) {
        the_post();
        $post = get_post(  );
        $args['thumbnail'] = true;
        $args['views'] = true;
        $args['author'] = true;
        $args['date'] = true;
        $args['tags'] = true;
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
                    <div class="breadcrumb"><?php jiali_get_breadcrumb(); ?></div>
                </div>
            </div>
            <div class="jiali-single-content">
                <?php echo get_the_content( ) ?>
            </div>
            <div class="jiali-player-box-wrapper jiali-section-full-width-super-ultra-secondary">
                <div class="jiali-title-wrapper">
                    <h3 class="jiali-title jiali-title-secondary">
                        <?php _e("Player Box", "jiali") ?>
                    </h3>
                </div>
                <div class="jiali-player-box">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <?php if( $aparat_url = get_field("aparat_url")): ?>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo ( $location_contry == 'iran' || !get_field("youtube_url") )? 'active' : '' ?>" id="aparat-video-tab" data-bs-toggle="pill" data-bs-target="#aparat-video" type="button" role="tab" aria-controls="aparat-video" aria-selected="true">
                                    <span>
                                        <?php echo __("Watch from Aparat", "jiali") ?>
                                        <span class="jiali-third-part-logo">
                                            <img src="<?php echo get_theme_file_uri("/images/icon--color-black.svg") ?>" alt="">
                                        </span>
                                    </span>
                                </button>
                            </li>

                        <?php endif; ?>

                        <?php if( $youtube_url = get_field("youtube_url")): ?>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo ( $location_contry == 'iran' || !get_field("aparat_url") ) ? '' : 'active' ?>" id="yotube-veideo-tab" data-bs-toggle="pill" data-bs-target="#yotube-veideo" type="button" role="tab" aria-controls="yotube-veideo" aria-selected="false">
                                    <span>
                                        <?php echo __("Watch from Youtube", "jiali") ?>
                                        <span class="jiali-third-part-logo">
                                            <img src="<?php echo get_theme_file_uri("/images/icons8-youtube-96.svg") ?>" alt="">
                                        </span>

                                    </span>
                                </button>
                            </li>

                        <?php endif; ?>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <?php if( $aparat_url = get_field("aparat_url")): 
                            $embed_aparat_id = substr($aparat_url, strrpos($aparat_url, '/') + 1); ?>
                            <div class="tab-pane fade <?php echo ( $location_contry == 'iran' || !get_field("youtube_url") ) ? 'show active' : '' ?>" id="aparat-video" role="tabpanel" aria-labelledby="aparat-video-tab">
                                <div id="30475290781">
                                    <script type="text/JavaScript" src="https://www.aparat.com/embed/<?php echo $embed_aparat_id ?>?data[rnddiv]=30475290781&data[responsive]=yes&recom=none">
                                    </script>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if( $youtube_url = get_field("youtube_url")): 
                            $embed_youtube_id = substr($youtube_url, strrpos($youtube_url, '/') + 1); ?>
                            <div class="tab-pane fade <?php echo ( $location_contry == 'iran' || !get_field("aparat_url") ) ? '' : 'show active' ?>" id="yotube-veideo" role="tabpanel" aria-labelledby="yotube-veideo-tab">
                                <div class="video-responsive">
                                    <iframe id="ytplayer" width="854" height="480" class="embed-responsive-item" type="text/html" 
                                    src="https://www.youtube.com/embed/M7lc1UVf-VE?loop=1"
                                    frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

        $related = get_posts( array( 
            'post_type' => 'multimedia',
            'category__in' => wp_get_post_categories($post->ID),
            'numberposts' => 3, 'post__not_in' => array($post->ID) )
        );

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

