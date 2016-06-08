<div class="wrap_field wrap_file">
	<label for="profile_image"><?php _e("Profile Image","pukka");?></label>
	<input type="file" name="profile_image" id="profile_image" >
</div>


<?php 
// in functions.php OR ajax.php
if(isset($_FILES["profile_image"]) && isset($_FILES["profile_image"]["tmp_name"])){
	if ( ! function_exists( 'wp_handle_upload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}

	$uploadedfile = $_FILES['profile_image'];
	$upload_overrides = array( 'test_form' => false );
	$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );


	if ( $movefile && ! isset( $movefile['error'] ) ) {
		
		// set attachment object arguments
		$attachment = array(
			'post_title' => $uploadedfile['name'],
			'post_content' => '',
			'post_type' => 'attachment',
			'post_parent' => '',
			'post_mime_type' => $uploadedfile['type'],
			'guid' => $movefile['url']
		);
		
		// create an Attachment
		$attachment_id = wp_insert_attachment( $attachment,$movefile['file']);
		
		// Update profile image (acf)
		update_field("field_56f3e827f5a87",$attachment_id,"user_{$curr_userid}");
		$result['image_update'] = true;
		
	} else {
		$result['image_update'] = false;
	}
}


// send attachment in wp_mail
$attachments = array(ABSPATH . '/uploads/abc.png');
wp_mail( $to, $subject, $message, $headers, $attachments);

