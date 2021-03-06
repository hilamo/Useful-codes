<?php 

/** Remove http://, www and slash from URL  */
function clear_url($url){
        $input = $url;
    // in case scheme relative URI is passed, e.g., //www.google.com/
    $input = trim($input, '/');
    // If scheme not included, prepend it
    if (!preg_match('#^http(s)?://#', $input)) {
        $input = 'http://' . $input;
    }
    $urlParts = parse_url($input);
    // remove www
    $domain = preg_replace('/^www\./', '', $urlParts['host']);
    return $domain;
}

?>