<?php 
if ( ! function_exists( 'qs_pagination' ) ) :
	function qs_pagination($query) {
		
		$big = 999999999; // need an unlikely integer
		$pagination = '<div class="qs_pagination">';
		$pagination .=  
				paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $query->max_num_pages
				));
		$pagination .= '</div>';
		echo $pagination;
	}
endif;
?>

<?php 
	/** inside archive / category / search ... pages */
	$paged = (get_query_var('paged')) ?  get_query_var('paged') : 1;
	//in the Query add: 'paged' => $paged

	/**
	* Call the function: qs_pagination($custom_query);
	*/
?>