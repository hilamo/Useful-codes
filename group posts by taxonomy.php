<?php
	// List posts by the terms for a custom taxonomy of any post type
	$post_type = 'post';
	$tax = 'mytaxonomy';
	$tax_terms = get_terms( $tax, 'orderby=name&order=ASC');
	if ($tax_terms) {
		foreach ($tax_terms  as $tax_term) {
			$args = array(
				'post_type'			=> $post_type,
				"$tax"				=> $tax_term->slug,
				'post_status'		=> 'publish',
				'posts_per_page'	=> -1
			);

			$my_query = null;
			$my_query = new WP_Query($args);

			if( $my_query->have_posts() ) : ?>

				<div class="clearfix">
					<h1><?php echo $tax_term->name; ?></h1>

					<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
    							<h2><?php the_title(); ?></h2>
					<?php endwhile; // end of loop ?>
				</div>
				
			<?php endif; // if have_posts()
			wp_reset_query();

		} // end foreach #tax_terms
	} // end if tax_terms
?>