<?php $post = $args['post']; ?>
<div class="jiali-card-item jiali-card-overlayed">
    <?php if( $args['tags'] ): ?>
        <?php 
            $tags = jiali_custom_get_post_tags($post->ID);

            if( $tags ):
        ?>
            <div class="jiali-card-tags">
                <?php foreach( $tags as $tag ): ?>
                    <a href="<?php echo $tag['permalink'] ?>" target="_blank" >
                        <span class="jiali-card-tag" style="background-color:<?php echo $tag['tagColor'] ?>">
                            <?php echo $tag['name'] ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if( $args['linked']) : ?>

        <a class="jiali-permalink" href="<?php echo get_permalink( $post->ID ) ?>">
    <?php endif; ?>
            <div class="jiali-overlayed-card-overlay-<?php echo $args["overlay-color"] ? $args["overlay-color"] : "ultra-secondary" ?>"></div>
            <?php if( $args['thumbnail'] ): ?>
                <img class="jiali-card-img-top" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'vertical-card-'.( $args['thumbnail-size'] ? $args['thumbnail-size'] : "large" ) ) ?>" alt="Card image cap">
            <?php endif; ?>
            <div class="jiali-card jiali-vertical-card">
                
                <div class="jiali-card-body">
                
                    <?php if( $args['title'] ): ?>
                        <h5 class="jiali-card-title"><?php echo wp_trim_words($post->post_title, 5, NULL ); ?></h5>
                    <?php endif; ?>
                    <?php if( $args['excerpt'] ): ?>
                        <p class="jiali-card-text"><?php echo $post->post_excerpt ? wp_trim_words( $post->post_excerpt, 25, NULL ) : wp_trim_words( $post->post_content, 25, NULL ) ?></p>
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
                        <?php if( function_exists("wp_statistics_visit")  && $args['views'] ): ?>
                            <?php if( $args['date'] ): ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                            <span class="jiali-card-views">
                                <i class="fa-solid fa-eye"></i>
                                <?php echo wp_statistics_pages('total', get_permalink( $post->ID ) ,$post->ID ) ?>
                            </span>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
    <?php if( $args['linked']) : ?>
        
         </a>
    <?php endif; ?>
    
</div>