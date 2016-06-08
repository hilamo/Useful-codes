<?php
/** Revolution Slider Navigation Menu **************************************************************/
add_shortcode("rev_navigation","rev_navigation_handler");

function rev_navigation_handler($atts){
    extract( shortcode_atts( array(
		'slider' => ""
	), $atts, 'wsource' ) );
    
    if($slider){
        $slider_id = get_slider($slider);
        if(!empty($slider_id)){
            $slides = get_slides($slider_id);
        }
    }
    
    ob_start();
    if(!empty($slides)){
        echo '<div class="slider_menu_bg">';
        echo '<div class="row"><div class="twelve columns">';
        echo "<ul class='slider_text_navigation'>";
        foreach($slides as $key=>$value){
            echo "<li><a href='' rel='{$key}'>{$value->title}</a></li>";
        }
        echo "<ul></div></div></div>";
    }
    return ob_get_clean();
}

function get_slides($slider_id){
    global $wpdb;
    
    $slides_obj_array = array();
    $slides = $wpdb->get_results("SELECT params,slide_order FROM {$wpdb->base_prefix}revslider_slides WHERE slider_id ='$slider_id'",ARRAY_A);
    if(!empty($slides)){
        foreach($slides as $slide){
            $slides_obj_array[$slide['slide_order']] = json_decode($slide['params']);
        }
    }
    return $slides_obj_array;
}

function get_slider($slider){
    global $wpdb;
    
    $slider_id = $wpdb->get_results("SELECT id FROM {$wpdb->base_prefix}revslider_sliders WHERE alias ='$slider'",ARRAY_A);

    if(!empty($slider_id)){
        $slider_id = reset($slider_id);
        $slider_id = $slider_id['id'];
    }
    
    return $slider_id;
}?>

<script>
	// Revolution Slider navigation menu
   jQuery(".slider_text_navigation li a").click(function(e){
        e.preventDefault();
        var rel = jQuery(this).attr("rel");
        revapi1.revshowslide(rel);
   });
</script>
<?php 
/** 
 Shortcode Example : [rev_navigation slider="home_slider"]
*/

