<?php
function get_woo_cat_image_src($term) {
    global $wp_query;
    $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
    $image        = wp_get_attachment_image_src( $thumbnail_id, 'cat_carousel_thumb' );
    if($image){
        return $image[0];
    }
}

?>