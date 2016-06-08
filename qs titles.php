<?php

function qs_title(){
    global $redux;
    $object = get_queried_object();
    
    $title = '' ;
    $home_title = __('Home','textdomain');
    
    $title .= '<h1 class="main_title">' ;
    /** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
            
            if(is_tax()){
                $title .= $object->name;
            }
            elseif(is_category()){
                $title .= $object->name;
            } 
            elseif(is_archive()){
                $post_type = $object->name;
                $title .= $object->label;
            } 
            elseif(is_single()){
                $post_type = $object->post_type;
                if(is_singular($post_type)){
					$title .= get_the_title($object->ID);
                }
            }
            elseif(is_page() && !is_home() && !is_front_page()){
				$title .= get_the_title($object->ID);
			}
                  
        /** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
    $title .= '</h1>' ;
    
    echo $title; 
}