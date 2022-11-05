<?php $post = $args['post']; ?>
<div class="jiali-card-item">
    <?php if( $args['linked']) : ?>

        <a class="jiali-permalink" href="<?php echo get_permalink( $post->ID ) ?>">
    
    <?php endif; ?>
        <div class="jiali-card jiali-horizontal-card">                
            <div class="jiali-card-body">
                <div>
                    <?php if( $args['title'] ): ?>
                        <h4 class="jiali-card-title"><?php echo $post->post_title ?></h4>
                    <?php endif; ?>
                    <?php if( $args['excerpt'] ): ?>
                        <p class="jiali-card-text"><?php echo wp_trim_words( $post->post_content, 10, NULL ) ?></p>
                    <?php endif; ?>               
                </div>
                <div class="jiali-card-info">
                    <?php if( $args['author'] ): ?>
                        <span class="jiali-avatar">
                            <?php echo get_avatar($post->post_author, 60); ?>
                        </span>
                        <span class="jiali-card-author"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
                        <span class="text-muted">-</span>
                    <?php endif; ?>
                    <?php if( $args['date'] ): ?>
                        <span class="jiali-card-date"><?php echo( function_exists("parsidate") ? parsidate( "d M Y", $post->post_date, 'per' ) : date_format(date_create($post->post_date), "Y M d") ) ?></span>
                    <?php endif; ?>
                    <?php if( function_exists("wp_statistics_visit")  && $args['views'] ): ?>
                        <?php if( $args['linked'])
                            echo '<span class="text-muted">-</span>'
                        ?>
                        <span class="jiali-card-views">
                            <i class="fa-solid fa-eye"></i>
                            <?php echo wp_statistics_pages('total', get_permalink( $post->ID ) ,$post->ID ) ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <?php if( $args['thumbnail'] ): ?>
                <div class="jiali-card-img-side">
                    <img src="<?php the_post_thumbnail_url('horizontal-card') ?>" alt="Card image cap">
                </div>
            <?php endif; ?>
        </div>
    <?php if( $args['linked']) : ?>

        </a>
    
    <?php endif; ?>
</div>
                    