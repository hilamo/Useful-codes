<?php
/** add "Read More button" after the excerpt */
function excerpt_read_more_link($output) {
 global $post;
 return $output . '<span class="read_more_btn"><a href="'. get_permalink($post_id) .'">'. __('Read More >','anstech').'</a></span>';

}
add_filter('the_excerpt', 'excerpt_read_more_link');
?>