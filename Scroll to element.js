<script>
//Scroll to Element
jQuery("a").click(function(e) {
	e.preventDefault();
	var gotoObject = jQuery(this).attr('href');
	jQuery('html, body').animate({
		 scrollTop: jQuery(gotoObject).offset().top
	 }, 600);
});
</script>
