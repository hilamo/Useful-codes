<?php 
/* Load ajax in functions.php ******/
require_once( dirname( __FILE__ ) . '/admin/ajax-function.php' );

add_action( 'wp_enqueue_scripts', 'add_frontend_ajax_javascript_file' );
function add_frontend_ajax_javascript_file() {
    wp_enqueue_script( 'ajax_custom_script', THEME . '/admin/ajax-scripts.js', array('jquery') );
    wp_localize_script( 'ajax_custom_script', 'ajaxurl', admin_url( 'admin-ajax.php' ));
}
add_action( 'wp_ajax_get_project_gallery', 'get_project_gallery' );
add_action( 'wp_ajax_nopriv_get_project_gallery', 'get_project_gallery' );
