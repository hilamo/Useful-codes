// custom parallx image

function custom_parallx(){
	var bgTop = 50;
	var windowTop = jQuery(window).scrollTop();
	jQuery(window).scroll( function() {

		// Home background images - foxed to top
		var currentTop = jQuery(window).scrollTop();
			if(windowTop < currentTop){
				bgTop -= 2;
			} else{
				bgTop += 2;
			}
		windowTop = currentTop;
		jQuery('.bg_image').css('background-position','50% '+bgTop+'%');
	});
}		
	
	/** CSS of the image
	
	.home_background_slider .background_slider .bg_slide{
		background-position: center center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		text-align: center;
		height: 823px;
	}
	
	***/
	
	/** html
		<div class="bg_slide" style="background-image: url(<?php echo $bg['url'];?>);"></div>
	**/
	