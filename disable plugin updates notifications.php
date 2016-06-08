<?php 

/** disable plugins updates notifications - in functions.php */
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );


/** disable Wordpress Core updates - in functions.php */
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

/** disable Wordpress Core updates - in wp-config */
define( 'WP_AUTO_UPDATE_CORE', false ); 
define( 'AUTOMATIC_UPDATER_DISABLED', true );
?>