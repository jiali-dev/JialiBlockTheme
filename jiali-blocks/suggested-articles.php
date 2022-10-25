<section class="jiali_suggested_articles">
    <div class="jiali-section-custom-width-transparent">
        <h1 class="jiali-title">
            <?php _e( "Our suggestions", "jiali" ) ?>
        </h1>
        <div class="row">
            <?php
            $suggested_posts = get_posts( array(
                'posts_per_page' => 4,
                'category_name' => 'suggested-posts'
            ) );

            if( $suggested_posts ): 
                $args = array(
                    'post' => []
                )
            ?>
                
                <div class="col-md-6">
                    <?php 
                    
                        $args['post'] = $suggested_posts[0]; 
                        get_template_part('template-parts/card-vertical', null, $args );
                        
                    ?>
                </div>
                <div class="col-md-6">

                    <?php 
                        foreach ($suggested_posts as $index => $value )
                        {
                            if ($index == 0 ) continue;
                            $args['post'] = $value; 
                            get_template_part('template-parts/card-horizontal', null, $args );
                        }
                    ?>
                </div>
                
            <?php endif; ?>
        </div>
    </div>

</section>
