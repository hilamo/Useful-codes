<?php 
function nice_web_url($url){
    $input = $url;
    if(empty($input)){
        return '';
    }else{
        // in case scheme relative URI is passed, e.g., //www.google.com/
        $input = trim($input, '/');

        // If scheme not included, prepend it
        if (!preg_match('#^http(s)?://#', $input)) {
            $input = 'http://' . $input;
        }

        $urlParts = parse_url($input); // Parse a URL and return its components

        // remove www
        $domain = preg_replace('/^www\./', '', $urlParts['host']);

        return $domain;
    }

    // output: google.co.uk
}
?>