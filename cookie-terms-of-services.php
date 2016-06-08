<?php

/** In functions.php */
/** create cookie after accepting terms of service */
if(isset($_POST['accept_terms'])){
    global $cookie;
    $cookie = true;
	// this is a cookie created by php
    setcookie("terms_of_service",1,strtotime( '+30 days' ),"/");
}
/** In header.php */
<?php get_template_part('inc/mod','terms-of-services');?>

/** mod-terms-of-services */
<?php global $redux_demo,$cookie;?>
<?php $post_terms = get_post($redux_demo['terms_of_service']);?>

<?php if(!isset($_COOKIE["terms_of_service"]) && !$cookie):?>
<div class="overlay"></div>
<div class="terms_of_service_popup">
    <h2><?php echo $post_terms->post_title;?></h2>
    <div class="terms_content">
        <?php echo $post_terms->post_content;?>
    </div>
    <div class="terms_buttons">
        <form name="terms_form" class="terms_form" action="<?php echo get_permalink($post->ID);?>" method="POST">
            <input id="accept_terms" type="submit" name="accept_terms" value="Accept" />
            <input type="hidden" name="terms-submit" id="terms-submit" value="true" />
            <a id="decline_terms" href="<?php echo $redux_demo['redirection_url']?>">Decline</a>
        </form>        
    </div>
    <script>
        jQuery(document).ready(function(){
            jQuery(".overlay").fadeIn(function(){
                jQuery(".terms_of_service_popup").fadeIn();
            })
        })
    </script>
</div>
<?php endif;?>

/****************************************/

/** CSS **************

.terms_of_service_popup {
    display: none;
    position: fixed;
    top: 20%;
    z-index: 9999;
    max-width: 450px;
    left: 40%;
    background: #fff;
    padding: 40px;
    text-align: center;
    -moz-box-shadow: 0 0 5px #888;
    -webkit-box-shadow: 0 0 5px#888;
    box-shadow: 0 0 5px #888;
}
.overlay{
    background:#000;
    opacity:0.7;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    z-index:9999;
}

********************/

/** if using a cookie with javascript - we need to create this function in scripts.js 

function setCookie(cname,cvalue,exdays){
    var d = new Date();
    d.setTime(d.getTime()+(exdays*24*60*60*1000));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires + ";path=/";
}

*/

?>