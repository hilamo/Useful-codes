<?php 
/***************************************** no hebrew files  ********/
add_filter('wp_handle_upload_prefilter', 'hebrew_files_prevent');
function hebrew_files_prevent($file) {
    $filename = $file['name'];
	if (preg_match('/[אבגדהוזחטיכלמנסעפצקרשתףץךםן]/', $filename, $matches)){
	  $file['error'] = 'נא לא להעלות קבצים עם שמות בעברית!';
	}
    return $file;
}