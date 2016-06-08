<?php 
/** THE HTML FORM 
* !NOTICE : method="post" AND enctype="multipart/form-data" - must be included when using files opload
*/
?>
<form method="post" name="front_end" action="" id="regsitration_form" enctype="multipart/form-data" >
	<label for="wd_img_upload">העלה תמונה:</label>
	<input type="file" name="wd_img_upload" id="wd_img_upload" />
	<input type="submit" id="submit_register_form" value="שלח"/>
</form>


<?php 
// add this to functions.php

function my_update_attachment($f,$pid,$t='',$c='') {
  
  wp_update_attachment_metadata( $pid, $f );
  
  if( !empty( $_FILES[$f]['name'] )) { //New upload
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
	include( ABSPATH . 'wp-admin/includes/image.php' );
    // $override['action'] = 'editpost';
    $override['test_form'] = false;
    $file = wp_handle_upload( $_FILES[$f], $override );
 
    if ( isset( $file['error'] )) {
      return new WP_Error( 'upload_error', $file['error'] );
    }
 
    $file_type = wp_check_filetype($_FILES[$f]['name'], array(
      'jpg|jpeg' => 'image/jpeg',
      'gif' => 'image/gif',
      'png' => 'image/png',
    ));
    if ($file_type['type']) {
      $name_parts = pathinfo( $file['file'] );
      $name = $file['filename'];
      $type = $file['type'];
      $title = $t ? $t : $name;
      $content = $c;
 
      $attachment = array(
        'post_title' => $title,
        'post_type' => 'attachment',
        'post_content' => $content,
        'post_parent' => $pid,
        'post_mime_type' => $type,
        'guid' => $file['url'],
      );
 
      foreach( get_intermediate_image_sizes() as $s ) {
        $sizes[$s] = array( 'width' => '', 'height' => '', 'crop' => true );
        $sizes[$s]['width'] = get_option( "{$s}_size_w" ); // For default sizes set in options
        $sizes[$s]['height'] = get_option( "{$s}_size_h" ); // For default sizes set in options
        $sizes[$s]['crop'] = get_option( "{$s}_crop" ); // For default sizes set in options
      }
 
      $sizes = apply_filters( 'intermediate_image_sizes_advanced', $sizes );
 
      foreach( $sizes as $size => $size_data ) {
        $resized = image_make_intermediate_size( $file['file'], $size_data['width'], $size_data['height'], $size_data['crop'] );
        if ( $resized )
          $metadata['sizes'][$size] = $resized;
      }
 
      $attach_id = wp_insert_attachment( $attachment, $file['file'] /*, $pid - for post_thumbnails*/);
 
      if ( !is_wp_error( $attach_id )) {
        $attach_meta = wp_generate_attachment_metadata( $attach_id, $file['file'] );
        wp_update_attachment_metadata( $attach_id, $attach_meta );
      }
   
   return array(
      'pid' =>$pid,
      'url' =>$file['url'],
      'file'=>$file,
      'attach_id'=>$attach_id
       );
    }
  }
}

// add this lines to the function that creates the new post with acf fields 
	$obj_img    = get_field_object('wd_img_upload');
	$att 		= my_update_attachment('wd_img_upload',$pid);
    update_field($obj_img['key'],$att['attach_id'],$pid);
?>
