// get the element with max height and set it to all
function heightEqualzier(el) {
    var max_height = 0;
    jQuery(el).each(function(){
       if (jQuery(this).height() > max_height) { max_height = jQuery(this).height(); }
    });
    jQuery(el).height(max_height);
}