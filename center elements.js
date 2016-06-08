jQuery(window).load(function(){
	if(jQuery('.clients_grid').length){
		center_element(jQuery('.clients_grid .client_box img'));
		jQuery('.clients_grid .client_box').animate({opacity: '1'});
	}
})

// center elements inside div with fixed height
function center_element(el) {
    var max_height = el.parent().height();
	var top = 0;
    jQuery(el).each(function(){
       if (jQuery(this).height() < max_height) {
		   top = (max_height - jQuery(this).height())/2;
		   jQuery(this).css('top',top + 'px');
	   }
	});
}


/**** CSS
.clients_grid .client_box {
    position: relative;
    display: inline-block;
    width: 31.75%;
	height: 146px;
	opacity: 0;
}

.clients_grid .client_box .c_logo{
	position: relative;
	width: 100%;
	height: 100%;
}
.clients_grid .client_box .c_logo img{
	position: relative;
	display: block;
	margin: 0 auto;
}




****/