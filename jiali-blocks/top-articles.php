<?php
   
    $top_articles = jiali_get_top_post();
    
    if( $top_articles && count($top_articles) > 2 ): 
        $args['thumbnail'] = true;
        $args['title'] = true;
        $args['views'] = true;
        $args['author'] = true;
        $args['date'] = true;
        $args['tags'] = true;
        $args['linked'] = true;
        $args['overlay-color'] = "dark-primary"
    ?>  

    <section class="jiali-top-posts-wrapper">
        <div class="jiali-section-custom-width-transparent">
            <div class="jiali-title-wrapper">
                <h1 class="jiali-title jiali-title-primary">
                    <?php _e( "Top Articles", "jiali" ) ?>
                </h1>
            </div>

            <div class="row jiali-posts-items">

                <div class="col-md-6">
                    <?php
                        $args['thumbnail-size'] = 'large';
                        $args['excerpt'] = true;
                        $args['post'] = get_post($top_articles[0]->id);
                        get_template_part('template-parts/card-overlayed', null, $args );
                    ?>
                </div>
                <div class="col-md-3">
                    <?php
                        $args['thumbnail-size'] = 'medium';
                        $args['excerpt'] = false;
                        $args['post'] = get_post($top_articles[1]->id);
                        get_template_part('template-parts/card-overlayed', null, $args );
                    ?>
                </div>
                <div class="col-md-3">
                    <?php
                        $args['thumbnail-size'] = 'medium';
                        $args['excerpt'] = false;
                        $args['post'] = get_post($top_articles[2]->id);
                        get_template_part('template-parts/card-overlayed', null, $args );
                    ?>
                </div>
                <?php if( $top_articles && count($top_articles) > 6 ): ?>
                    <div class="col-md-3">
                    <?php
                        $args['thumbnail-size'] = 'large';
                        $args['excerpt'] = true;
                        $args['post'] = get_post($top_articles[3]->id);
                        get_template_part('template-parts/card-overlayed', null, $args );
                    ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                            $args['thumbnail-size'] = 'medium';
                            $args['excerpt'] = false;
                            $args['post'] = get_post($top_articles[4]->id);
                            get_template_part('template-parts/card-overlayed', null, $args );
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                            $args['thumbnail-size'] = 'medium';
                            $args['excerpt'] = false;
                            $args['post'] = get_post($top_articles[5]->id);
                            get_template_part('template-parts/card-overlayed', null, $args );
                        ?>
                    </div>
                <?php endif; ?>


            </div>
            
        </div>
    </section>
<?php endif; ?>

