<?php 

/** in wp-config.php
* create a tmp folder in root - to save all sessions
*/
$session_path = str_replace("public_html","",ABSPATH);
session_save_path($session_path.'tmp');

