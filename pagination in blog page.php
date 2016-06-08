<?php 
/*
* http://adambalee.com/how-to-add-pagination-to-your-wordpress-blog-without-a-plugin/
*/

// Add the following to functions.php in your theme directory:
if ( ! function_exists( 'my_pagination' ) ) :
	function my_pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
	}
endif;
?>


<?php
	// call the function in category.php for example
	my_pagination(); 
?>