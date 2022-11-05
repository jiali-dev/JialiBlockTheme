<?php 
    if( have_posts(  )): 
    $args['thumbnail'] = true;
    $args['thumbnail-size'] = 'medium';
    $args['title'] = true;
    $args['excerpt'] = false;
    $args['author'] = true;
    $args['date'] = true;
    $args['views'] = true;
    $args['tags'] = true;
    $args['linked'] = true;
    ?>
    
    <section class="jiali-posts-wrapper">
        <div class="jiali-section-custom-width-transparent">
            <div class="jiali-title-wrapper">
                <h1 class="jiali-title jiali-title-primary">
                    <?php echo get_the_archive_title() ?>
                </h1>
            </div>

            <div class="row jiali-posts-items">

                <?php while(have_posts()):
                    the_post(); 
                    $post = get_post(  );
                    ?>

                    <div class="col-md-3">
                        <?php
                            $args['post'] = $post;
                            get_template_part('template-parts/card-vertical', null, $args );
                        ?>
                    </div>

                <?php endwhile; ?>
                
            </div>
        </div>
        <div class="jiali-pagination-wrapper">
            <?php echo paginate_links(); ?>
        </div>
    </section>

<?php else: ?>
    <div class="jiali-section-custom-width-transparent">
        <p> </p>
        <div class="alert alert-warning" role="alert">
            <?php _e("Ooops! There is no result.", "jiali") ?>
        </div>
    </div>
<?php endif; ?>

