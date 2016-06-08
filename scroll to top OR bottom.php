<script>
//Scroll page to top / bottom
	jQuery("#back-top").hide();
    jQuery("#go-bottom").hide();
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 550) {
				jQuery('#back-top').fadeIn();
                jQuery('#go-bottom').fadeOut();
			} else {
				jQuery('#back-top').fadeOut();
                jQuery('#go-bottom').fadeIn();
			}
		});

		// scroll body to 0px on click
		jQuery('#back-top').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
    // scroll body to bottom on click
    jQuery('#go-bottom').click(function () {
			jQuery('body,html').animate({
				scrollTop: $(document).height()
			}, 800);
			return false;
		});
</script>
<?php 
/** css 

// Back to top 
#back-top {
	position: fixed;
	bottom: 30px;   
    margin-right: 17px;
    margin-top: 10px; 
    z-index: 9999;
}
// arrow icon 
#back-top a.backtop {
	background: url(images/scrolling.png) no-repeat;
    height: 61px;
    width: 60px;
    text-indent: -9999px;
    display: inline-block;
    float: right;
    margin-left: 7px;
    background-position: -4px 0px;
}
#back-top a.backtop:hover{
    background-position: -4px -102px;
}
// go to bottom 
#go-bottom {
	position: fixed;
	top: 550px;   
    margin-right: 17px;
    margin-top: 10px; 
    z-index: 9999;
}
// arrow icon 
#go-bottom a.gobottom {
	background: url(images/scrolling.png) no-repeat;
    height: 61px;
    width: 60px;
    text-indent: -9999px;
    display: inline-block;
    float: right;
    margin-left: 7px;
    background-position: -94px 0px;
}
#go-bottom a.gobottom:hover{
    background-position: -94px -102px;
}

*/

?>