<?php
    $recent_posts = get_posts( array(
        'posts_per_page' => 8,
        'orderby' => 'post-date',
        'order' => 'DESC'
    ) );

    if( $recent_posts ): 
        $args['thumbnail'] = true;
        $args['thumbnail-size'] = 'medium';
        $args['title'] = true;
        $args['excerpt'] = false;
        $args['author'] = true;
        $args['date'] = true;
        $args['tags'] = true;
    ?>  

    <section class="jiali-recent-articles-wrapper">
        <div class="jiali-section-custom-width-transparent">
            <div class="jiali-title-wrapper">
                <h1 class="jiali-title">
                    <?php _e( "Recent Articles", "jiali" ) ?>
                </h1>
    </div>

            <div class="row jiali-recent-posts-items">

                <?php foreach($recent_posts as $value ): ?>

                    <div class="col-md-3">
                        <?php
                            $args['post'] = $value;
                            get_template_part('template-parts/card-vertical', null, $args );
                        ?>
                    </div>

                <?php endforeach; ?>
                
            </div>
            <div class="jiali-more-articles">
                <a href="<?php echo home_url('/archive') ?>" class="btn jiali-btn-primary btn-lg"><?php _e("See more articles","jiali") ?> <i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
