<?php $post = $args['post']; ?>
<div class="jiali-card-item">
    <?php if( $args['tags'] ): ?>
        <?php 
            $tags = wp_get_post_tags( $post->ID, array(
                'number' => 3
            ) );

            if( $tags ):
        ?>
            <div class="jiali-card-tags">
                <?php foreach( $tags as $tag ): ?>
                    <span class="jiali-card-tag" style="background-color:<?php echo ( $color = get_field('tag_color', $tag->taxonomy . '_' . $tag->term_id ) ) ? $color : "#fff"  ?>">
                        <?php echo $tag->name ?>
                        <br>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <a class="jiali-permalink" href="<?php echo get_permalink( $post->ID ) ?>">
        <div class="jiali-card-overlay-primary-top"></div>

        <div class="jiali-card jiali-vertical-card">
            <?php if( $args['thumbnail'] ): ?>
                <img class="jiali-card-img-top" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'vertical-card-'.( $args['thumbnail-size'] ? $args['thumbnail-size'] : "large" ) ) ?>" alt="Card image cap">
            <?php endif; ?>

            <div class="jiali-card-body">
                <?php if( $args['title'] ): ?>
                    <h5 class="jiali-card-title"><?php echo $post->post_title ?></h5>
                <?php endif; ?>
                <?php if( $args['excerpt'] ): ?>
                    <p class="jiali-card-text"><?php echo $post->post_excerpt ? wp_trim_words( $post->post_excerpt, 35, NULL ) : wp_trim_words( $post->post_content, 35, NULL ) ?></p>
                <?php endif; ?>
                <p class="jiali-card-info">
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
                </p>
            </div>
        </div>
    </a>
</div>