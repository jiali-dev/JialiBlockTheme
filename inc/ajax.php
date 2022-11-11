<?php

    defined( 'ABSPATH' ) || exit; // Prevent direct access

    // Ajax Functions

    function jiali_load_more_articles_ajax() 
    {
        try {

            /// Check nonce
            if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'jiali-nonce-blog' ))
                throw new Exception( __('Security check failed.', 'jiali') , 1 );
            
            $paged = intval($_POST['paged']);

            $post_per_paged = 12;

            $ajaxposts = new WP_Query([
                'post_type' => array( 'post', 'app', 'multimedia' ),
                'posts_per_page' => $post_per_paged,
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged
            ]);
            
            if( $ajaxposts->have_posts() )
            {
                $data['data'] = $ajaxposts->posts;
                $data['success'] = true;
                $data['is_finished'] = $post_per_paged * $paged > $ajaxposts->found_posts ? true : false;
            } else
            {
                $data['success'] = false;
                $data['message'] = __('There are no other articles', 'jiali');
            }
    
        } catch (Exception $ex) {
    
            $data['success'] = false;
    
            $data['message'] = $ex->getMessage();
        }
        wp_reset_postdata();
        die ( json_encode( $data ) );
    
    }
    add_action('wp_ajax_jiali_load_more_articles_ajax', 'jiali_load_more_articles_ajax');
    add_action('wp_ajax_nopriv_jiali_load_more_articles_ajax', 'jiali_load_more_articles_ajax');

?>