<?php
/**
 * Ajax Filter Training List
 */
add_action('wp_ajax_availhub_trainings_filter', 'availhub_trainings_filter_list_ajax');
add_action('wp_ajax_nopriv_availhub_trainings_filter', 'availhub_trainings_filter_list_ajax');
function availhub_trainings_filter_list_ajax() {
    $settings       = $_POST['settings'];
    $query          = $_POST['query'];
    $catFilter = $_POST['catFilter'];
    $yearFilter = $_POST['yearFilter'];
    // $posts_per_page = $_POST['posts_per_page'];
    // $numberposts    = $_POST['numberposts'];
    if ($catFilter == "" && $yearFilter == ""){
        $args = array( 
            'post_type'      => 'trainings',
            'post_status'    => 'publish',
            
        );
    } elseif($catFilter == ""){
        $args = array( 
            'post_type'      => 'trainings',
            'post_status'    => 'publish',
            'tax_query' => array(
                array(
                'taxonomy' => 'trainings_year',
                'field' => 'term_id',
                'terms' => $yearFilter
                 )
              )
        );
    } elseif($yearFilter == ""){
        $args = array( 
            'post_type'      => 'trainings',
            'post_status'    => 'publish',
            'tax_query' => array(
                array(
                'taxonomy' => 'trainings_category',
                'field' => 'term_id',
                'terms' => $catFilter
                 )
              )
        );
    } else{
        $args = array( 
            'post_type'      => 'trainings',
            'post_status'    => 'publish',
            'tax_query' => array(
                array(
                'taxonomy' => 'trainings_category',
                'field' => 'term_id',
                'terms' => $catFilter
                ),

                array(
                    'taxonomy' => 'trainings_year',
                    'field' => 'term_id',
                    'terms' => $yearFilter
                     )
              )
        );
    }
    

    $posts = new \WP_Query( $args );

    if( $posts->have_posts() ) {
        while( $posts->have_posts() ){ $posts->the_post(); 
            get_template_part( 'template-parts/trainings', 'loop' );
        } wp_reset_postdata();
    }else {
        echo __( 'No Training(s) found.', 'availhub' ); 
    }
    die();
}