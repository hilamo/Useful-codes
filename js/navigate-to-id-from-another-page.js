function handle_navigation_with_hash(objectForOffset){

    var offsetSize = objectForOffset.innerHeight(); // calculate the height of the fixed object

    jQuery("ul.sub-menu li.go_to a").click(function(e) { // clicked item with hash
        var window_url_no_hash;
        var clicked_url_no_hash;
        var scrollToObject = this.hash;

        if(window.location.href.split('#')[0]){
           window_url_no_hash = window.location.href.split('#')[0];
        }
        if(this.href.split('#')[0]){
           clicked_url_no_hash = this.href.split('#')[0];
        }
        if( (typeof clicked_url_no_hash != 'undefined') && (typeof window_url_no_hash != 'undefined')){
            // Navigate to an ID in the same page
            if(clicked_url_no_hash == window_url_no_hash){
                e.preventDefault();
                jQuery("html, body").animate({ scrollTop: jQuery(scrollToObject).offset().top - offsetSize }, "slow");
                return false;
            }
        }
    });

    // Navigate to an ID from another page
    if(jQuery(window.location.hash).length > 0){
        jQuery("html, body").animate({ scrollTop: jQuery(window.location.hash).offset().top - offsetSize }, "slow");
    }
}
