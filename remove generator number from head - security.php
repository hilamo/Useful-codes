<?php
/**
* remove version string from js and css
*/
function mythume_remove_wp_version_strings($src){
	global $wp_version;
	
	parse_str( parse_url($src, PHP_URL_QUERY), $query ); // the result of the parse_url() will be stored in the variable $query
	if(!empty($query['ver']) && $query['ver'] === $wp_version){
		$src = remove_query_arg('ver',$src);
	}
	return $src;
}

// all the scripts and styles that included in the functions
add_filter('script_loader_src', 'mythume_remove_wp_version_strings');
add_filter('style_loader_src', 'mythume_remove_wp_version_strings');



/**
* remover meta tag generator from header 
*/
function mytheme_remove_meta_version(){
	return '';
}
add_filter('the_genereator', 'mytheme_remove_meta_version');

?>