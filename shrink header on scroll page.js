
var shrinkHeader = 200;
jQuery(window).scroll(function() {
	var scroll = getCurrentScroll();
	if ( scroll >= shrinkHeader ) {
		jQuery('.header').addClass('shrinked');
	}
	else {
		jQuery('.header').removeClass('shrinked');
	}
});

// FUNCTIONS
function getCurrentScroll() {
	return window.pageYOffset || document.documentElement.scrollTop;
	}
	