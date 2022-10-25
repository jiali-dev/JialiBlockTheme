<?php
$categories = get_categories( array(
	'orderby' => 'count',
	'order'   => 'DESC',
    'hide_empty' => true,
    'number' => 6
) );

?>
<?php if( $categories ): ?>

    <section class="jiali-top-categories-wrapper jiali-section-full-width-secondary">
        <div class="jiali-section-custom-width-transparent">
            <h1 class="jiali-title">
                <?php _e( "Top Categories", "jiali" ) ?>
            </h1>

            <h3 class="jiali-sub-title">
                <?php _e( "Top Categories", "jiali" ) ?>
            </h3>

            <div class="row jiali-top-categorirs-items">
                <?php foreach( $categories as $cat ): ?>
                    <div class="col-md-2">
                        <?php
                            $args['category'] = $cat; 
                            get_template_part('template-parts/card-category', null, $args );
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
