jQuery('.project_container a.more_details').click(function(e){
	e.preventDefault();
	var className = jQuery(this).attr('data-id');        
	jQuery('.project_container').each(function(){
		if(jQuery(this).attr('data-id')==className){
			jQuery(this).find('.prime_project_content').css({"overflow":"visible","height":"100%"});
			console.log(3454);
		}
	});
        