<?php 
/** A custom function for language switcher with select-option tags */
function language_switcher(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        echo '<div class="language_list"><select name="choose_lang" id="choose_lang">';
        foreach($languages as $l){
            //print_r($l);
            if(LANG == $l['language_code']){ $selected = 'selected';} else{$selected='';}
            echo '<option value='.$l['native_name'].' data-value="'. $l['url'] .'" '.$selected.' >'.$l['native_name'].'</option>';
        }
        echo '</select></div>';
    }
}
?>
<script>
jQuery('#choose_lang').change(function(){
	var optionSelected = jQuery("option:selected", this);
	var url = jQuery(optionSelected).attr('data-value');
	window.location = url;
})
	</script>