<div class="postThumb">
  <?php  $thumbUrl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ,"page_thumb" );?>
	<img src="<?php echo $thumbUrl[0] ?>" alt="<?php the_title();?>" />
</div>