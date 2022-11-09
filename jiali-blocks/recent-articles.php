<?php
    $recent_posts = new WP_Query(array(
            'paged' => get_query_var('paged', 1),
            'post_type' => array( 'post', 'app', 'multimedia' ),
            'post_status' => 'publish',
            'orderby' => 'post-date',
            'order' => 'DESC',
            'posts_per_page' => 12
        )
    );
    
    if( have_posts($recent_posts ) ): 
        $args['thumbnail'] = true;
        $args['thumbnail-size'] = 'medium';
        $args['title'] = true;
        $args['excerpt'] = false;
        $args['views'] = true;
        $args['author'] = true;
        $args['date'] = true;
        $args['tags'] = true;
        $args['linked'] = true;
    ?>  

    <section class="jiali-posts-wrapper">
        <div class="jiali-section-custom-width-transparent">
            <div class="jiali-title-wrapper">
                <h1 class="jiali-title jiali-title-primary">
                    <?php _e( "Recent Articles", "jiali" ) ?>
                </h1>
            </div>

            <div class="row jiali-posts-items">

                <?php while($recent_posts->have_posts()):
                    $recent_posts->the_post(); 
                    
                    $post = get_post()
                    
                    ?>

                    <div class="col-md-3">
                        <?php
                            $args['post'] = $post;
                            get_template_part('template-parts/card-vertical', null, $args );
                        ?>
                    </div>

                <?php endwhile; ?>
                
            </div>
            <div class="jiali-more-articles">
                <a href="<?php echo home_url('/blog') ?>" class="btn jiali-btn-primary btn-lg"><?php _e("See more articles","jiali") ?> <i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
