<?php
/** 
 * duplicate options for Multi-languages sites. (options framework)
 * Put this at the end of the options array,
 * before "return options;"
 */
$langs = icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str');  

foreach($langs as $key=>$lang){
	foreach($options as $k=>$option){
		$new_options[$key][$k] = $option;
		if($option["type"]!="heading"){
			$new_options[$key][$k]["id"]   = $option["id"] . "_" . $key;
		}else{
			$new_options[$key][$k]["name"] = __($option["name"] . " - " . $key,"lavi");
		}
	}
}        

$options = array();

foreach($langs as $key=>$lang){
	$options = array_merge($options,$new_options[$key]);
}

	
	
/** 
 * duplicate options for Multi-languages sites. (Bootstrap - options)
 * Put this at the end of the tabs array,
 */
$langs = icl_get_languages('skip_missing=1&orderby=KEY&order=DIR&link_empty_to=str');  

foreach($langs as $key=>$lang){
	foreach($tabs as $k=>$tab){
		$new_tab[$key][$k] = $tab;
		
		if($tab["id"]!=null){
			$new_tab[$key][$k]["id"]   = $key ."_".$tab["id"];
			$new_tab[$key][$k]["name"]   = $tab["name"]." - ".$key;
			
			$new_fields = $new_tab[$key][$k]["fields"];
			foreach($new_fields as $field_key=>$field){
				$new_fields[$field_key]["id"] = __($field["id"] ."_".$key,"legenda");
			}
			$new_tab[$key][$k]["fields"] = $new_fields;
		}  
	}
}       
$tabs = array();
foreach($langs as $key=>$lang){
	$tabs = array_merge($tabs,$new_tab[$key]);
}
----------------------------------------------------------------------------------------
/* add the ICL_LANGUAGE_CODE to the function */
function get_theme_option($option_name) {
    GLOBAL $tabs;
    
    $option_name = str_replace(tk_theme_name,"",$option_name);
    $option_name = tk_theme_name ."_". ICL_LANGUAGE_CODE . $option_name;
    $option_value = get_option($option_name);

    if (is_array($option_value)) {
        if (count($option_value) > 2) {
            return stripslashes_deep($option_value);
        } else {
            return (stripslashes($option_value['0']));
        }
    } else {
        if ($option_value != '') {
            return (stripslashes($option_value));
        }
    }
}