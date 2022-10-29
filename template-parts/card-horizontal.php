<?php $post = $args['post']; ?>
<div class="jiali-card-item">

    <a class="jiali-permalink" href="<?php echo get_permalink( $post->ID ) ?>">
        <div class="jiali-card-overlay-primary-left"></div>

        <div class="jiali-card jiali-horizontal-card">                
            <div class="jiali-card-body">
                <div>
                    <h4 class="jiali-card-title"><?php echo $post->post_title ?></h4>
                    <p class="jiali-card-text"><?php echo wp_trim_words( $post->post_content, 10, NULL ) ?></p>
                </div>
                <div class="jiali-card-info">
                    <span class="jiali-avatar">
                        <?php echo get_avatar($post->post_author, 60); ?>
                    </span>
                    <span class="jiali-card-author"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
                    <span class="text-muted">-</span>
                    <span class="jiali-card-date"><?php echo( function_exists("parsidate") ? parsidate( "d M Y", $post->post_date, 'per' ) : date_format(date_create($post->post_date), "Y M d") ) ?></span>
                </div>
            </div>
            <div class="jiali-card-img-side">
                <img src="<?php the_post_thumbnail_url('horizontal-card') ?>" alt="Card image cap">
            </div>

        </div>

    </a>
</div>
                    