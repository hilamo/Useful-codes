<?php 
add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
/**
 * Add argument `post_title_like` to wp_query
 * @param  $where
 * @param  $wp_query
 * @return $where with filtered argument
 */
function title_like_posts_where( $where, &$wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}