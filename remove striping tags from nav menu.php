<?php 
// Prevent striping tags from menu descriptions
remove_filter( 'nav_menu_description', 'strip_tags' );
function setup_nav_menu_item_description( $menu_item ) {
    if ( isset( $menu_item->post_type ) ) {
        if ( 'nav_menu_item' == $menu_item->post_type ) {
            $menu_item->description = apply_filters( 'nav_menu_description', $menu_item->post_content );
        }
    }
    return $menu_item;
}
add_filter( 'wp_setup_nav_menu_item', 'setup_nav_menu_item_description' );

/**
*	in menu walker do this:
**/
	if(! empty ( $item->description )){
		$link_title = $item->description;
	}else{
		$link_title = apply_filters( 'the_title', $item->title, $item->ID );
	}

	// Build HTML output and pass through the proper filter.
	$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
		$args->before,
		$attributes,
		$args->link_before,
		$link_title,
		$args->link_after,
		$args->after
	);