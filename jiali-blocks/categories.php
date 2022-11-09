<?php
$categories = get_categories( array(
	'orderby' => 'count',
	'order'   => 'DESC',
    'hide_empty' => true,
) );

?>
<?php if( $categories ): ?>

    <section class="jiali-categories-wrapper">
        <div class="jiali-section-custom-width-transparent">
            <div class="jiali-title-wrapper">
                <h1 class="jiali-title jiali-title-primary">
                    <?php _e( "Topics", "jiali" ) ?>
                </h1>
            </div>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach( $categories as $cat ): ?>
                        <?php 
                            $category_thumbnail = get_field('category_thumbnail', $cat->taxonomy . '_' . $cat->term_id );
                            if ( !$category_thumbnail )
                            {
                                $category_thumbnail = get_template_directory_uri() . '/images/cat-thumb.jpeg';
                            } else
                            {
                                $category_thumbnail = $category_thumbnail['sizes']['category-card'];
                            }
                        ?>
                
                        <div class="swiper-slide">
                            <?php
                                $args['category'] = $cat; 
                                $args['linked'] = $cat; 
                                get_template_part('template-parts/card-category', null, $args );
                            ?>
                        </div>

                    <?php endforeach; ?>
                </div>
                
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>
<?php endif; ?> 
