<?php

function qs_breadcrumbs(){
    global $redux;     
    $object = get_queried_object();
    
    $output = '' ;
    $sep = '<span class="seperator">&gt;</span>' ;
    
    $home_title = __('Home','inbar');
    $home = '<div class="crumb home"><a href="'.home_url().'">'.$home_title.'</a></div>';
    
    
    $output = '<div id="qs_breadcrumbs" class="clearfix">';
        $output .= '<div class="crumbs clearfix">';
            $output .= $home;
    /** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
            
            if(is_tax()){
                $tax_id = $object->term_id;
                $output .= $sep.'<div class="crumb last"><a href="'.get_term_link($object->taxonomy,$object).'">'.$tax_id->name.'</a></div>';
            }
            elseif(is_category()){
                $cat_id = $object->term_id;
                $output .= $sep.'<div class="crumb last"><a href="'.get_category_link($cat_id).'">'.$object->name.'</a></div>';
            } 
            elseif(is_archive()){
                $post_type = $object->name;
                $name = $object->label;
                if(is_post_type_archive($post_type)){
                   $output .= $sep.'<div class="crumb last"><a href="'.get_post_type_archive_link($post_type).'">'.$name.'</a></div>';
                }
            } 
            elseif(is_single()){
                $post_type = $object->post_type;
                $archive_title = '';
                if(is_singular($post_type)){
					if($post_type == 'post'){
					   $cats = get_the_terms($object->ID,'category');
                       if(!empty($cats)){ 
                            $cat = reset($cats);
                            $output .= $sep.'<div class="crumb"><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></div>';
                       }
					}else{ 
					    if($post_type == 'event'){
					       $archive_title = $redux['events_page_title'];
					    }else{$archive_title = $post_type;}
                        $output .= $sep.'<div class="crumb"><a href="'.get_post_type_archive_link($post_type).'">'.$archive_title.'</a></div>';
                    }
                    $output .= $sep.'<div class="crumb last"><a href="'.get_permalink($object->ID).'">'.get_the_title($object->ID).'</a></div>';
                }
            }
            elseif(is_page() && !is_home() && !is_front_page()){
				if($object->post_parent){
			        $parent = get_post($object->post_parent);
			        
                    $output .= $sep.'<div class="crumb"><a href="'. get_the_permalink($parent->ID).'">'.get_the_title($parent->ID).'</a></div>';
                    $output .= $sep.'<div class="crumb last"><a href="'. get_the_permalink($object->ID).'">'.get_the_title($object->ID).'</a></div>';
                }
                else{
					$output .= $sep.'<div class="crumb last"><a href="'. get_the_permalink($object->ID).'">'.get_the_title($object->ID).'</a></div>';
				}   
			}
                  
        /** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
        
        $output .= '</div>';
    $output .= '</div>';
    
    echo $output; 
}
?>
<style>
/** BREADCRUMBS *************************/
#qs_breadcrumbs{
    position: relative;
    display: inline-block;
    float: right;
}
#qs_breadcrumbs .crumbs{
    position: relative;
    display: block;
    width:100%;
}
#qs_breadcrumbs .crumbs .crumb{
    position: relative;
    display: inline-block;
    float: left;
}
#qs_breadcrumbs .crumbs .crumb a{
    position: relative;
    display: block;
    color: #9ce8ff;
    font-size: 14px;
    line-height: 33px;
}
#qs_breadcrumbs .crumbs .crumb a:hover{
    text-decoration: none;
}
#qs_breadcrumbs .crumbs .seperator{
    color: #fff;
    line-height: 33px;
    margin: 0 5px;
    font-size: 12px;
    float: left;
}
#qs_breadcrumbs .crumbs .crumb.last a{
    color: #fff;
    text-decoration: none;
}
</style>


