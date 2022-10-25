<?php $post = $args['post']; ?>

<a class="jiali-permalink" href="<?php echo get_permalink( $post->ID ) ?>">

    <div class="jiali-card jiali-vertical-card">
        <img class="jiali-card-img-top" src="<?php the_post_thumbnail_url('vertical-card') ?>" alt="Card image cap">
        <div class="jiali-card-body">
            <h5 class="jiali-card-title"><?php echo $post->post_title ?></h5>
            <p class="jiali-card-text"><?php echo wp_trim_words( $post->post_content, 35, NULL ) ?></p>
            <p class="jiali-card-info">
                <span class="jiali-avatar">
                    <?php echo get_avatar($post->post_author, 60); ?>
                </span>
                <span class="jiali-card-author"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
                <span class="text-muted">-</span>
                <span class="jiali-card-date"><?php echo( function_exists("parsidate") ? parsidate( "d M Y", $post->post_date, 'per' ) : date_format(date_create($post->post_date), "Y M d") ) ?></span>
            </p>
        </div>
    </div>
</a>