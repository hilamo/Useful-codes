/*****************************************
**  Get Image Thumbnail From Video Link - youtube / viemo
*****************************************/
function video_image( $url ){
    $image_url = parse_url( $url );
    if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
        $array = explode( "&", $image_url['query'] );
        return "http://img.youtube.com/vi/".substr( $array[0], 2 )."/0.jpg";
    } else if( $image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com' ){
        $viemo = unserialize( file_get_contents( "http://vimeo.com/api/v2/video/".substr( $image_url['path'], 1 ).".php" ) );
        return $viemo[0]["thumbnail_small"];
    }
}