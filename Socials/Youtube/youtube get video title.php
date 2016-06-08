<?php 
function youtube_title($id) {
  if(!empty($id)){
        // returns a single line of XML that contains the video title. Not a giant request. Use '@' to suppress errors.
      $videoTitle = @file_get_contents("http://gdata.youtube.com/feeds/api/videos/{$id}?v=2&fields=title");
      // look for that title tag and get the insides
      preg_match("/<title>(.+?)<\/title>/is", $videoTitle, $titleOfVideo);  
      return $titleOfVideo[1];
  }
  else{
    return __('No title','text_domian');
  }
  
}