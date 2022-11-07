<!-- <?php
$categories = get_categories( array(
	'orderby' => 'count',
	'order'   => 'DESC',
    'hide_empty' => true,
    'number' => 6
) );

?>
<?php if( $categories ): ?>

    <section class="jiali-top-categories-wrapper jiali-section-full-width-super-ultra-primary">
        <div class="jiali-section-custom-width-transparent">
            <div class="jiali-title-wrapper">
                <h1 class="jiali-title jiali-title-primary">
                    <?php _e( "Frequent topics", "jiali" ) ?>
                </h1>
            </div>

            <h3 class="jiali-sub-title">
                <?php _e( "More than several interesting topics", "jiali" ) ?>
            </h3>

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
                            <img class="jiali-card-img-top" src="<?php echo $category_thumbnail ?>" alt="Card image cap">
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>

            </div>
        </div>
    </section>
<?php endif; ?> -->

<?php
$categories = get_categories( array(
	'orderby' => 'count',
	'order'   => 'DESC',
    'hide_empty' => true,
    'number' => 6
) );

?>
<?php if( $categories ): ?>

    <section class="jiali-top-categories-wrapper jiali-section-full-width-super-ultra-primary">
        <div class="jiali-section-custom-width-transparent">
            <div class="jiali-title-wrapper">
                <h1 class="jiali-title jiali-title-primary">
                    <?php _e( "Frequent topics", "jiali" ) ?>
                </h1>
            </div>

            <h3 class="jiali-sub-title">
                <?php _e( "More than several interesting topics", "jiali" ) ?>
            </h3>

            <div class="row jiali-top-categorirs-items">
                <?php foreach( $categories as $cat ): ?>
                    <div class="col-md-2">
                        <?php
                            $args['category'] = $cat; 
                            $args['linked'] = $cat; 
                            get_template_part('template-parts/card-category', null, $args );
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
