<?php
    $suggested_posts = get_posts( array(
        'posts_per_page' => 4,
        'category_name' => 'suggested-posts'
    ) );

    if( $suggested_posts ): 
        $args['thumbnail'] = true;
        $args['title'] = true;
        $args['excerpt'] = true;
        $args['author'] = true;
        $args['date'] = true;
        $args['views'] = true;
        $args['tags'] = true;
        $args['linked'] = true;
           
    ?>   
    <section class="jiali-suggested-articles">
        <div class="jiali-section-custom-width-transparent">
            <div class="jiali-title-wrapper">
                <h1 class="jiali-title jiali-title-primary">
                    <?php _e( "Our suggestions", "jiali" ) ?>
                </h1>
            </div>
            <div class="row"> 
                <div class="col-md-6 jiali-suggested-article-col">
                    <?php 
                    
                        $args['post'] = $suggested_posts[0]; 
                        get_template_part('template-parts/card-vertical', null, $args );
                        
                    ?>
                </div>
                <div class="col-md-6 jiali-suggested-article-col">

                    <?php 
                        foreach ($suggested_posts as $index => $value )
                        {
                            if ($index == 0 ) continue;
                            $args['post'] = $value; 
                            get_template_part('template-parts/card-horizontal', null, $args );
                        }
                    ?>
                </div>
                    
                
            </div>
        </div>

    </section>
    
<?php endif; ?>
<?php wp_reset_postdata(); ?>

