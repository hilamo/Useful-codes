<?php 
// Register Custom Post Types
function products_post_type() {

	$labels = array(
		'name'                => _x( 'מוצרים', 'Post Type General Name', 'nevo' ),
		'singular_name'       => _x( 'מוצר', 'Post Type Singular Name', 'nevo' ),
		'menu_name'           => __( 'מוצרים', 'nevo' ),
		'parent_item_colon'   => __( 'Parent Item:', 'nevo' ),
		'all_items'           => __( 'כל המוצרים', 'nevo' ),
		'view_item'           => __( 'View Item', 'nevo' ),
		'add_new_item'        => __( 'הוסף מוצר חדש', 'nevo' ),
		'add_new'             => __( 'הוסף מוצר', 'nevo' ),
		'edit_item'           => __( 'Edit Item', 'nevo' ),
		'update_item'         => __( 'Update Item', 'nevo' ),
		'search_items'        => __( 'Search Item', 'nevo' ),
		'not_found'           => __( 'Not found', 'nevo' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'nevo' ),
	);
	$args = array(
		'label'               => __( 'product', 'nevo' ),
		'description'         => __( 'Post Type Description', 'nevo' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'product', $args );

}
// Hook into the 'init' action
add_action( 'init', 'products_post_type', 0 );