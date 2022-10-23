<?php
    $post = get_post( 2642 )
?>
<section class="jiali_suggested_articles">

    <div class="jiali-section-has-margin-transparent">
        <h1 class="jiali-title">
            <?php _e( "Our suggestions", "jiali" ) ?>
        </h1>
        <div class="row">

            <div class="col-md-6">
                <div class="jiali-card jiali-vertical-card">
                    <img class="jiali-card-img-top" src="http://jialibluetheme.local/wp-content/uploads/2018/11/Doctor-baby.jpg" alt="Card image cap">
                    <div class="jiali-card-body">
                        <h5 class="jiali-card-title"><?php echo $post->post_title ?></h5>
                        <p class="jiali-card-text"><?php echo wp_trim_words( $post->post_content, 35, NULL ) ?></p>
                        <p class="jiali-card-info">
                            <span class="jiali-avatar">
                                <?php echo get_avatar($post->post_author, 60); ?>
                            </span>
                            <span class="jiali-card-author"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
                            <span class="text-muted">-</span>
                            <span class="jiali-card-date"><?php echo $post->post_date ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="jiali-card jiali-horizontal-card">                
                    <div class="jiali-card-body">
                        <h5 class="jiali-card-title"><?php echo $post->post_title ?></h5>
                        <p class="jiali-card-text"><?php echo wp_trim_words( $post->post_content, 10, NULL ) ?></p>
                        <div class="jiali-card-info">
                            <span class="jiali-avatar">
                                <?php echo get_avatar($post->post_author, 60); ?>
                            </span>
                            <span class="jiali-card-author"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
                            <span class="text-muted">-</span>
                            <span class="jiali-card-date"><?php echo $post->post_date ?></span>
                    </div>
                    </div>
                    <img class="jiali-card-img-side" src="http://jialibluetheme.local/wp-content/uploads/2018/11/Doctor-baby.jpg" alt="Card image cap">

                </div>
                <div class="jiali-card jiali-horizontal-card">                
                    <div class="jiali-card-body">
                        <h5 class="jiali-card-title"><?php echo $post->post_title ?></h5>
                        <p class="jiali-card-text"><?php echo wp_trim_words( $post->post_content, 10, NULL ) ?></p>
                        <div class="jiali-card-info">
                            <span class="jiali-avatar">
                                <?php echo get_avatar($post->post_author, 60); ?>
                            </span>
                            <span class="jiali-card-author"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
                            <span class="text-muted">-</span>
                            <span class="jiali-card-date"><?php echo $post->post_date ?></span>
                    </div>
                    </div>
                    <img class="jiali-card-img-side" src="http://jialibluetheme.local/wp-content/uploads/2018/11/Doctor-baby.jpg" alt="Card image cap">

                </div>
                <div class="jiali-card jiali-horizontal-card">                
                    <div class="jiali-card-body">
                        <h5 class="jiali-card-title"><?php echo $post->post_title ?></h5>
                        <p class="jiali-card-text"><?php echo wp_trim_words( $post->post_content, 10, NULL ) ?></p>
                        <div class="jiali-card-info">
                            <span class="jiali-avatar">
                                <?php echo get_avatar($post->post_author, 60); ?>
                            </span>
                            <span class="jiali-card-author"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
                            <span class="text-muted">-</span>
                            <span class="jiali-card-date"><?php echo $post->post_date ?></span>
                    </div>
                    </div>
                    <img class="jiali-card-img-side" src="http://jialibluetheme.local/wp-content/uploads/2018/11/Doctor-baby.jpg" alt="Card image cap">

                </div>

            </div>
        </div>
    </div>

</section>
