jQuery('#main_products_menu.sub-menu .sub-menu > li > a').click(function(e){
        var clicked_ul = jQuery(this).siblings('ul.sub-menu');
		if(clicked_ul.hasClass('open')){ // if click on same anchor -> close it
			clicked_ul.removeClass('open').slideUp();
		}else{
			// close all other open sub menus
			jQuery(this).parent().siblings('li').children('ul.sub-menu.open').removeClass('open').slideUp();
			// open this clicked ul
			clicked_ul.toggleClass('open').slideToggle();
		}
    });