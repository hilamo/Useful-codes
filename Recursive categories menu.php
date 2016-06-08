<?php
/**
 * get_categories_menu
 * print categories list and posts of current category
 * @param int $term_id (Required)
 * @param string $taxonomy (default = 'category')
 * @param string $post_type (default = 'post')
 * @param int $countRecursive (default = 0)
 */
function get_categories_menu($term_id, $taxonomy = 'category', $post_type = 'post', $countRecursive = 0){
	
	// Ensure taxonomy and post type exists
	if(!taxonomy_exists($taxonomy) || !post_type_exists($post_type)){
		if(!taxonomy_exists($taxonomy)){
			echo 'ERROR: Taxonomy Name: '.$taxonomy. ' does not exist!';
		}
		if(post_type_exists($post_type)){
			echo 'ERROR: Post Type: '.$post_type. ' does not exist!';
		}
		return;
	}
    $currentTerm = get_term_by('id', $term_id, $taxonomy);
    if($currentTerm){ // Check if term exist

        $args = array('hide_empty'=> true, 'child_of'=>$term_id);

        if($countRecursive == 0){ // Do this only at FIRST iteration
            $object = get_queried_object();
            $parent_id = 0;

            if(is_tax() || is_category()){ // if taxonomy page -> save current term id
                $currentTermID = $object->term_id;
            }
            elseif(is_single()) { // if is post page -> save current term id
                $object_terms = get_the_terms($object->ID,$taxonomy);
                if($object_terms){
                    $first_term = reset($object_terms);
                    $currentTermID = $first_term->term_id;
                }
            }else{
                $currentTermID = '';
            }

            if(!$currentTerm->parent){
                $args = array('hide_empty'=> true, 'parent'=>$parent_id);
                $flag = false;
            }
        }

        $terms = get_terms($taxonomy,$args);
        if($terms ): ?>
        <ul class="<?php if(!$countRecursive){echo 'categories';}else {echo 'sub_categories';} ?>">
            <?php foreach($terms as $term):?>

            <?php if($currentTermID == $term->term_id){
                    $current = 'current_cat';
                }else $current =''; ?>

                <li class="cat-item cat-item-<?php echo $term->term_id. ' '.$current;?>">
                    <a href="<?php echo get_term_link($term);?>"><?php echo $term->name;?></a>

                        <?php // Print for current category it's posts list ?>
                            <?php if($currentTermID == $term->term_id):?>
                                <?php $posts_query = new WP_Query(array( 'post_type'=> $post_type,'post_per_page'=>-1,'tax_query'=> array(array(
                                                                                                                                'taxonomy'=>$taxonomy,
                                                                                                                                'field'=>'term_id',
                                                                                                                                'terms'=>$currentTermID
                                                                                                                            ))
                                                                ));
                                ?>
								<?php if ( $posts_query->have_posts() ) : $currentPost = $object; ?>
									<ul class="posts">
										 <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>

											 <?php if($currentPost->ID == get_the_ID()){
													 $currentPostClass = 'current_post';
												 }else $current =''; ?>
												 <li class="<?php echo 'post-'. get_the_ID().' '. $post_type.' '.$currentPostClass;?>">
													 <a href="<?php the_permalink();?>"><?php the_title();?></a>
												 </li>
										 <?php endwhile;  wp_reset_query();?>
									</ul>                                    
								<?php endif; ?> 
                        <?php endif;?>

                    <?php
                        // Call the Recursive function
                        get_categories_menu($term->term_id, $taxonomy, $post_type, $countRecursive = 1);?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: // Print for each last sub category it's posts ?>
            <?php /*
            <?php $posts_query = new WP_Query(array( 'post_type'=> $post_type,'post_per_page'=>-1,'tax_query'=> array(array(
                                                                                                                                'taxonomy'=>$taxonomy,
                                                                                                                                'field'=>'term_id',
                                                                                                                                'terms'=>$term_id
                                                                                                                            ))
                                                                ));
                                ?>
								<?php if ( $posts_query->have_posts() ) : $currentPost = $object; ?>
									<ul class="posts">
										 <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>

											 <?php if($currentPost->ID == get_the_ID()){
													 $currentPostClass = 'current_post';
												 }else $current =''; ?>
												 <li class="<?php echo 'post-'. get_the_ID().' '. $post_type.' '.$currentPostClass;?>">
													 <a href="<?php the_permalink();?>"><?php the_title();?></a>
												 </li>
										 <?php endwhile;  wp_reset_query();?>
									</ul>                                    
								<?php endif; ?> 
            */?>
        <?php endif;?>

<?php
    }else{
		echo 'NOTICE: Term ID: '.$term_id.' does not exist!';
        return;
    }
}
