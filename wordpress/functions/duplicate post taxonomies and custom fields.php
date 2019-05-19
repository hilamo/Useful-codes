<?php 
// example taken from colibri service Site
function duplicate_custom_post( $post_id ){

	/*****/
	$post = get_post( $post_id );

	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;

	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset($post) && ($post != null) && ($post->post_type == 'product') ) {

		// if device was repaired or is it first time -> get count repeaired
		$count_repaird = '';
		if( strpos($post->post_title, 'R') !== false ){
			$length = 1;
			$num_pos = strpos($post->post_title, 'R')+1 ;
			$num_value = substr($post->post_title, $num_pos, $length);
			$count_repaird = (int)$num_value+1;
			$r = '';
			$postTitle = substr_replace($post->post_title, $count_repaird, $num_pos, $length);
		}else{
			$r = '-R';
			$count_repaird = 0;
			$postTitle = $post->post_title.$r.$count_repaird;
		}


		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $postTitle,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);

		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
		/*
		 * get all current post terms and set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}

		/*
		* duplicate all post meta
		*/
		$data = get_post_custom($post_id);
		foreach ( $data as $key => $values) {
			foreach ($values as $value) {
					add_post_meta( $new_post_id, $key, $value );
			}
		}


		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		// wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		// exit;
	}

	return $new_post_id;
}