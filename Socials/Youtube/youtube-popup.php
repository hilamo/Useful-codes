<?php
    $youtubeID       = getYoutubeId( get_field('video_url') );
    if(!empty($youtubeID)){
        $youtubeTitle    = getYoutubeTitle($youtubeID);
        $youtubeThumbUrl = getYoutubeThumbUrl($youtubeID);
    }
?>

<div class="video_popup">
    <a class="popup-youtube" href="https://www.youtube.com/watch?v=<?php echo $youtubeID;?>">
        <img src="<?php echo $youtubeThumbUrl;?>" alt="">
        <div class="title">
            <?php echo $youtubeTitle; ?>
        </div>
        <svg height="40px" version="1.1" viewBox="0 0 68 48" width="60px">
            <path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#212121" fill-opacity="0.8"></path>
            <path d="M 45,24 27,14 27,34" fill="#fff" style=""></path>
        </svg>
    </a>
</div>

<script type="text/javascript">

    jQuery(document).ready(function($) {
        
        // Popup Youtube with Magnific Popup
        $('a.popup-youtube').magnificPopup({
            disableOn: 320,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: true,
            iframe: {
                markup: '<div class="mfp-iframe-scaler">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                    '</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button
                patterns: {
                    youtube: {
                       index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
                       id: 'v=', // String that splits URL in a two parts, second part should be %id%
                       src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0&loop=1' // URL that will be set as a source for iframe.
                    }
                }
            }
        });
    });

</script>

<style media="screen">
    .video_popup {
        position: relative;
        max-width: 400px;
        width: 100%;
    }
    .video_popup a.popup-youtube {
        position: relative;
        display: block;
    }
    .video_popup a.popup-youtube img {
        height: 300px;
    }
    .video_popup a .title {
        position: absolute;
        display: block;
        left: 0;
        top: 0;
        z-index: 80;
        color: #fff;
        background: rgba(72, 70, 70, 0.7);
        padding: 5px;
        font-size: 1rem;
        line-height: 1em;
    }
    .video_popup a svg {
        position: absolute;
        display: block;
        width: 60px;
        height: 40px;
        top: 50%;
        left: 50%;
        margin-top: -20px;
        margin-left: -30px;
        z-index: 80;
    }
    .video_popup a svg path{
        -webkit-transition: all 300ms ease-in-out;
        -moz-transition: all 300ms ease-in-out;
        -ms-transition: all 300ms ease-in-out;
        -o-transition: all 300ms ease-in-out;
        transition: all 300ms ease-in-out;
    }
    .video_popup a:hover svg path.ytp-large-play-button-bg {
        fill: #bb0000;
    }
</style>


<?php
/************************************************************
 PUT IN FUNCTIONS.PHP
/************************************************************/
/**
 * get Youtube ID
 * @param  [type] $video_uri [description]
 * @return [type]            [description]
 */
function getYoutubeId( $video_uri ) {
    // determine the type of video and the video id
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $video_uri, $matches);
    //return thumbnail uri
    return $matches[1];
}
/************************************************************/
/**
 * Gets a Youtube thumbnail url
 * @param $id A vimeo id (ie. K4Rh8fyeJAE)
 * @param $size size of Thumbnail (0,1,2,3,"default","hqdefault","mqdefault","sddefault")
 * @return thumbnails url
*/
function getYoutubeThumbUrl($id , $size="0") {
    $data = "http://img.youtube.com/vi/".$id."/".$size.".jpg";
    return $data;
}
/************************************************************/
/**
 *  get youtube title
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function getYoutubeTitle($id) {
    if(empty($id)){
        return null;
    }
	// returns a single line of XML that contains the video title. Not a giant request. Use '@' to suppress errors.
    $content = @file_get_contents("http://youtube.com/get_video_info?video_id=".$id);
	if($content){
        // look for that title tag and get the insides
        parse_str($content, $ytarr);
        $videoTitle = $ytarr['title'];
        return $videoTitle;
    }
    else{
		return __('No title','text_domian');
    }

}

/************************************************************/
