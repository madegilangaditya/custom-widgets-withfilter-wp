<?php

$post_id = get_the_ID();
$image = get_field('profile_picture', $post_id);
$logo = get_field('company_logo', $post_id);

?>

<!-- <a href="<?php //the_permalink( $post_id ); ?>" class="avb-training-listing__item-link"> -->
    <div class="avb-presenter-listing__item avb-presenter avb-presenter-listing__item-<?php echo $post_id; ?>">
            <div class="avb-featured-image-wrap">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
            </div>
            <div class="avb-presenter-listing-wrapper__content">
                <h6 class="avb-presenter-listing__title">
                    <?php the_title(); ?>
                    
                </h6>
                <div class="avb-presenter-listing__job"><?php echo get_field( 'job_role', $post_id ); ?></div>
                <div class="avb-presenter-listing-wrapper__logo">
                    <img src="<?php echo esc_url($logo['url']); ?>">
                </div>
            </div>
    </div>
<!-- </a> -->
