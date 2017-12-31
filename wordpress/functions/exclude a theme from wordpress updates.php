<?php 
/**
 * Ensure that a specific theme is never updated. This works by removing the
 * theme from the list of available updates.
 */
add_filter( 'http_request_args', function ( $response, $url ) {
	if ( 0 === strpos( $url, 'https://api.wordpress.org/themes/update-check' ) ) {
		$themes = json_decode( $response['body']['themes'] );
		unset( $themes->themes->{get_option( 'template' )} );
		unset( $themes->themes->{get_option( 'stylesheet' )} );
		$response['body']['themes'] = json_encode( $themes );
	}
	return $response;
}, 10, 2 );


/*
	Note: 
	This only works if the theme is active! 
	If you want to prevent updates even if the theme is inactive, 
	then you will need to add the code to a plugin and use hardcoded values 
	instead of get_option( 'template' ) and get_option( 'stylesheet' ).
*/
?>