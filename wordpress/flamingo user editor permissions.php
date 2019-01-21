<?php 
// FLAMINGO USER PREMISSIONS
add_filter( 'flamingo_map_meta_cap', 'add_editor_premission_flamingo_map_meta_cap' );
function add_editor_premission_flamingo_map_meta_cap( $meta_caps ) {
	$meta_caps = array_merge( $meta_caps, array(
		'flamingo_edit_contacts' => 'edit_pages',
		'flamingo_edit_contact' => 'edit_pages',
		'flamingo_delete_contact' => 'edit_pages',
		'flamingo_edit_inbound_message' => 'edit_pages',
   		'flamingo_edit_inbound_messages' => 'edit_pages',
		// 'flamingo_edit_inbound_messages' => 'publish_pages',
		'flamingo_delete_inbound_message' => 'publish_pages',
		'flamingo_delete_inbound_messages' => 'publish_pages',
		'flamingo_spam_inbound_message' => 'publish_pages',
		'flamingo_unspam_inbound_message' => 'publish_pages'
	) );

	return $meta_caps;
}