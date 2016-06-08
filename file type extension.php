<?php 
$file = get_field('custom_file');
$temp_file = new SplFileInfo($file['url']);
$type = $temp_file->getExtension();
?>