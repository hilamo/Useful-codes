<?php 
// Highlight text results 
function wps_highlight_results($text){
	if(is_search()){
		$sr = get_query_var('s');
		if(!empty($sr)){
			$keys = explode(" ",$sr);
			$text = preg_replace('/('.implode('|', $keys) .')/iu', '<span style="background-color:yellow;">'.$sr.'</span>', $text);
		}
	}
    return $text;
}
if( !is_admin() ){
	add_filter('the_excerpt', 'wps_highlight_results');
	add_filter('the_title', 'wps_highlight_results', 10, 2);
}