<?php
    $ajaxposts = new WP_Query([
        'post_type' => array( 'post', 'app', 'multimedia' ),
        'posts_per_page' => $post_per_paged,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged
    ]);
    var_dump($ajaxposts->posts)
?>