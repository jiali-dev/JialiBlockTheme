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
                <div class="col-4">
                    <?php get_template_part('template-parts/card-overlayed', null, $args ); ?>
                </div>
                <div class="col-8 jiali-single-info">
                    <h1 class="jiali-single-title"><?php echo get_the_title(  ) ?></h1>
                    <div class="breadcrumb"><?php get_breadcrumb(); ?></div>

                </div>
            </div>
        </div>
    </section>
    
<?php }

