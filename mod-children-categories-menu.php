<?php 
    $this_category = get_queried_object();
    if($this_category->parent !=0):
        $categories = get_categories(array(
                                        "parent"=>$this_category->parent,
                                        'hide_empty' => false));
        //echo 'this is child';
    else: 
        $categories = get_categories(array(
                                        "child_of"=>$this_category->term_id,
                                        'hide_empty' => false));
        //echo 'this is a parent';
    
    endif;
?>
<div class="children_menu">

<?php if(!empty($categories)):?>
    <ul class="children_list">
    <?php foreach($categories as $category): ?>
    <?php if($category->term_id == $this_category->term_id)$class_active='active';else $class_active='';?>
        <li class="page_item cat-item-<?php echo $category->term_id;  echo ' '.$class_active;?>">
            <a href="<?php echo get_category_link($category->term_id);?>">
                <?php echo $category->name;?>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif;?>
  
</div>
