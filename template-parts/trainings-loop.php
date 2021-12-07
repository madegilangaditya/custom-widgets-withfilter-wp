<?php

$post_id = get_the_ID();
$post_terms = get_the_terms( $post_id, 'trainings_category' ); 
$year_terms = get_the_terms( $post_id, 'trainings_year' ); 
$image = get_field('thumbnail', $post_id);


?>
<a href="<?php the_permalink( $post_id ); ?>" class="avb-training-listing__item-link">
    <div class="avb-training-listing__item avb-training <?php foreach($post_terms as $terms) : echo strtolower($terms->slug). ' '; endforeach; ?> avb-training-listing__item-<?php echo $post_id; ?> avb-trainings-category-item-<?php echo $terms->term_id; ?> avb-trainings-year-">
            <div class="avb-featured-image-wrap" style="background-image:url(<?php echo esc_url($image['url']); ?>)">
                <div class="avb-featured-image-overlay"></div>
            </div>
            <div class="avb-training-listing-wrapper__content">
                <h6 class="avb-training-listing__title">
                    <?php the_title(); ?>
                    
                </h6>
                <div class="avb-training-listing__content-item"><?php echo get_field( 'short_description', $post_id ); ?></div>
                <div class="avb-training-listing-wrapper__price">
                    <p class="avb-training-listing__price"><?php if(get_field( 'price', $post_id )) : echo get_field( 'price', $post_id ); endif;?></p>
                </div>
            </div>
        
            

    </div>
</a>
