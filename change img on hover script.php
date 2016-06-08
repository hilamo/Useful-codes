<?php 
	$image = get_field('category_icon','product_cat_'.$term->term_id);
	$image_active = get_field('category_active_icon','product_cat_'.$term->term_id);
?>

<a class="link_to_cat" href="<?php echo $link;?>">
	<img class="term_img" src="<?php echo $image['url'];?>" data-src="<?php echo $image['url'];?>" data-hover="<?php echo $image_active['url'];?>"/>
	<h3><?php echo $term->name;?></h3>
</a>
<script>
jQuery('.categories_menu .menu_cat a.link_to_cat')
	.mouseenter(function(){
		var new_src = jQuery(this).find('img').attr('data-hover');
		jQuery(this).find('img').attr('src',new_src);
	})
	.mouseleave(function() {
		var src = jQuery(this).find('img').attr('data-src');
		jQuery(this).find('img').attr('src',src);
	});
</script>