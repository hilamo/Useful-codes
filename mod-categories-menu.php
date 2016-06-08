<?php /** display a list of categories and it's sub-categories */
    $cat_args=array(
          'orderby' => 'name',
          'order' => 'ASC',
          'parent' => 0,
          'hide_empty' => false
       );
    $categories = get_categories($cat_args);
?>

<ul class="tech_tree">
    <?php foreach($categories as $category) :?>   
        <li><h3 class="category_title"><?php echo $category->name;?></h3>  
        <?php $child_categories = get_categories(array("child_of"=>$category->term_id,'hide_empty' => false));?>
            <?php if(!empty($child_categories)):?>
            <ul class="wrap_category">
                <?php foreach($child_categories as $child_category): ?>
                        <li>
                            <h3 class="category_title">
                                <a href="<?php echo get_category_link($child_category->term_id);?>">
                                        <?php echo '&#62; '; echo $child_category->name;?>
                                </a>
                            </h3>
                        </li>
                <?php endforeach; ?>
            </ul>
            <?php endif;?>
        </li>
    <?php endforeach;?>
</ul>