<?php 
/** Register Custom Taxonomy - GALLERY */

// Register Custom Taxonomy
function gallery_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Gallery categories', 'Taxonomy General Name', 'nativ' ),
		'singular_name'              => _x( 'Gallery category', 'Taxonomy Singular Name', 'nativ' ),
		'menu_name'                  => __( 'Gallery categories', 'nativ' ),
		'all_items'                  => __( 'All Items', 'nativ' ),
		'parent_item'                => __( 'Parent Item', 'nativ' ),
		'parent_item_colon'          => __( 'Parent Item:', 'nativ' ),
		'new_item_name'              => __( 'New Item Name', 'nativ' ),
		'add_new_item'               => __( 'Add New Item', 'nativ' ),
		'edit_item'                  => __( 'Edit Item', 'nativ' ),
		'update_item'                => __( 'Update Item', 'nativ' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'nativ' ),
		'search_items'               => __( 'Search Items', 'nativ' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'nativ' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'nativ' ),
		'not_found'                  => __( 'Not Found', 'nativ' ),
	);
	
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'gallery_cat', array( 'gallery' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'gallery_taxonomy', 0 );