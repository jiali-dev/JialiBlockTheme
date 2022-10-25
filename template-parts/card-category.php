<?php $cat = $args['category']; ?>
<a class="jiali-permalink" href="<?php echo get_category_link( $cat->term_id ) ?>">
    <div class="jiali-card jiali-vertical-card jiali-top-categorirs-item">
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
        <img class="jiali-card-img-top" src="<?php echo $category_thumbnail ?>" alt="Card image cap">
        <div class="jiali-card-body">
            <h5 class="jiali-card-title"><?php echo $cat->name ?></h5>
            <p class="jiali-card-text"><?php echo $cat->count . ' ' . __( _n( 'Article', 'Articles', $cat->count, 'jiali' ) ); ?></p>
        </div>
    </div>
</a>