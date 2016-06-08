/**
 * Customize WooCommerce Products Search Form
 * woo_custom_product_searchform
*/
add_filter( 'get_product_search_form' , 'woo_custom_product_searchform' );

function woo_custom_product_searchform( $form ) {
	
	$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
		<div class="product_search_holder">
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="חיפוש מוצרים" />
			<input type="submit" id="searchsubmit" value="" />
			<input type="hidden" name="post_type" value="product" />
		</div>
	</form>';
	
	return $form;
	
}