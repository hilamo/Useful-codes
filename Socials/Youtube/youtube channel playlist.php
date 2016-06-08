<?php /* Template Name: Youtube channel */ get_header(); ?>
<?php global $redux; ?>	
	
    
<?php 
    function getVideos($channel){
        if($channel == ""){
            return false;   
        }
        /* Get number of videos */
        $books = simplexml_load_file('http://gdata.youtube.com/feeds/base/users/'.$channel.'/uploads?max-results=1&start-index=1');
        $numb_videos = $books->children( 'openSearch', true )->totalResults; 
        settype($numb_videos, "integer");
    
        $ids = array();
        $i = 1;
        for($i = 1; $i <= $numb_videos; $i++){
            $books = simplexml_load_file('http://gdata.youtube.com/feeds/base/users/'.$channel.'/uploads?max-results=1&start-index='.$i);
            $ApiLink  = $books->entry->id;
            settype($ApiLink, "string");
            $ApiLink = str_replace("http://gdata.youtube.com/feeds/base/videos/", "", $ApiLink);
            array_push($ids, $ApiLink);
        }
        return $ids;    
    }
    
    $array = getVideos('GigiCosmetic');
    print_r($array);
?>



<?php get_footer(); ?>
