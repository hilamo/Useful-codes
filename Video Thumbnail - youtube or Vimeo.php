<?php 
/**
 * Gets a Youtube thumbnail url
 * @param $id A vimeo id (ie. K4Rh8fyeJAE)
  * @param $size size of Thumbnail (0,1,2,3,"default","hqdefault","mqdefault","sddefault")
 * @return thumbnail's url
*/
function getYoutubeThumbUrl($id , $size="0") {
    $data = "http://img.youtube.com/vi/".$id."/".$size.".jpg";
    return $data;
}

/**
 * Gets a vimeo thumbnail url
 * @param  [type] $id   [A vimeo id (ie. 1185346)]
 * @param  string $size [description]
 * @return [type]       [thumbnail's url]
 */
function getVimeoThumb($id , $size="thumbnail_medium") {
    $data = file_get_contents("http://vimeo.com/api/v2/video/$id.json");
    $data = json_decode($data);
    return $data[0]->$size;
}