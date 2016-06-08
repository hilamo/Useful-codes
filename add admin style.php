<?php 

/** Admin style */
add_action('admin_head', 'my_custom_admin_style');
function my_custom_admin_style() {
  echo '<link rel="stylesheet" href="'. THEME_DIR .'/css/admin_style.css" type="text/css" media="all" />';
}

?>