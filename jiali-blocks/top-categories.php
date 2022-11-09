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

            <div class="row jiali-top-categories-items">
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
