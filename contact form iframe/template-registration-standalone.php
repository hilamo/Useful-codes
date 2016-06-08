<?php
/**
 * Template Name: Registration form
 */
 global $site_options;
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<meta name="HandheldFriendly" content="True" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/ico"/>
        <?php
            $css                = array();
            $css['url']         = $_GET['css'];

            if( url_exist( $css['url'] ) ){
                echo "<link rel='stylesheet'
                      href='" . $css['url'] . "'
                      type='text/css' media='all' />
                     ";
            }
            /*
            //echo  base64url_encode( $css['encode'] );

            if( isset( $css['encode'] ) && $css['encode'] != '' ){
                $css['decode']  = base64url_decode( $css['encode'] );
                $css['url']     = fixUrl( $css['decode'] );

                if( url_exist( $css['url'] ) ){
                    echo "<link rel='stylesheet'
                          href='" . $css['url'] . "'
                          type='text/css' media='all' />
                         ";
                } else{
                    echo $css['url'];
                }
            }
            */
        ?>
        <?php //enque_new_mobile_style(); ?>
	</head>
    <?php $class = array();
          if(isset($_GET['noheader'])) $class[] = "noheader";
          if(isset($_GET['ver']))      $class[] = sanitize_text_field($_GET['ver']);
          if(isset($_GET['lead'])){
            echo "<script>var lead = true</script>";
          }
    ?>
	<body <?php body_class(implode(" ",$class));?>>
        <a href="#" class="help-btn"></a>
        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N98P6G"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N98P6G');</script>
        <!-- End Google Tag Manager -->

    	<div class="wrapper">
            <div class="header">
                <div class="language_selector">
                    <?php do_action('icl_language_selector'); ?>
                </div>
                <div class="logo">
                    <?php /*img alt="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri();?>/images/mobile_logo.png"/>*/?>
                </div>
            </div>
            <div class="main_content">
                <div class="form_wrapper">
                    <div id="customForm" class="customForm">
                        <div class="content">
                            <div class="slogan">
                                <?php while(have_posts()): the_post();?>
                            	   <?php the_content();?>
                                <?php endwhile;?>
                            </div>
							<?php $bg_color = isset($_GET["bgcolor"]) ? "background-color:#".sanitize_text_field($_GET["bgcolor"]).";" : "";  ?>
                            <div class="registration_form" style="<?php echo $bg_color;?>">
                                <?php get_template_part("inc/registration_form"); ?>
                            </div>

                        </div>
                    </div>
                </div>

              <!--main_content ends-->
            </div>
            <?php /*<div class="footer">
                <div class="row clearfix">
                    <?php echo follow_us_handler(); ?>
                    <div class="play_store_link">
                        <?php if($image = get_field("google_play_image")): ?>
                            <a href="<?php the_field("google_play_download_link");?>" target="_blank">
                                <img src="<?php echo $image["url"];?>" alt="Google play" />
                            </a>
                        <?php endif;?>
                    </div>
                </div>
                <div class="footer_content">
                    <?php echo wpautop($site_options["opt-footer-disclaimer"]);?>
                </div>
                <p class="visitFullSite_wrapper">
                    <a class="visitFullSite" href="/?fullsite=true" title="Visit Full Website"><?php _e("Visit Full Website","optionsclick");?></a></p>
                <div class="footerText"><?php the_field("disclaimer");?></div>
            </div> */ ?>
        </div> <!--wrapper ends-->
        <script src="<?php echo site_url();?>/wp-includes/js/jquery/jquery.js"></script>
        <script src="<?php echo site_url();?>/wp-includes/js/jquery/jquery-migrate.min.js"></script>
        <script src="<?php echo get_template_directory_uri() . '/js/jquery.validate.js' ?>"></script>

        <script src="<?php echo get_template_directory_uri();?>/js/tracking.js"></script>


        <?php
            /*$langfile = get_template_directory_uri() . '/js/localization/messages_'.strtolower(ICL_LANGUAGE_CODE).'.js';
            if(file_exists($langfile)){
                echo "<script src='".$langfile."'></script>";
            }*/
        ?>

        <?php wp_footer(); ?>
        <script type="text/javascript">
            (function($){
               function update_login_tracking_code(){
                      var query_string = window.location.search;
                      var $login_form = $('#customForm');
                      var form_action  = $login_form.attr('action');
                      $login_form.attr('action', form_action + query_string);
               }
               update_login_tracking_code();

            })(jQuery);
            jQuery(document).ready(function(){
                Change2NewLookup();

                /* COUNTRY BY IP */
                try{
                    jQuery.get("//ipinfo.io/?token=2b9796fb88ec27", function(response) {
                        if(typeof response.country != "undefined")
                            jQuery(".register_countrybox").val(response.country);
                            jQuery(".register_countrybox").trigger("change");
                    }, "jsonp");
                }catch(err){

                }
                /* SET EXTENTION */
                jQuery(".register_countrybox").change(function(){
                    var extension = jQuery("#country option:selected").attr("data-ext");
                    if(extension)
                        jQuery("#phoneRow").val(extension);
                    else{
                        jQuery("#phoneRow").val("");
                    }
                });

                if(typeof letters_only == "undefined"){
                    letters_only = "Only Letters please";
                }
                jQuery.validator.addMethod("lettersonly", function(value, element) {
                  return this.optional(element) || /^[a-z]+$/i.test(value);
                }, letters_only);
                jQuery.validator.addMethod('selectcheck', function (value) {
                    return (value != '0');
                }, "This field is required");

                jQuery("#account_lead_form_m").validate({
                    rules: {
                        name: "required",
                        email: {
                          required: true,
                          email: true
                        },
                        lastname: {
                          required: true,
                          minlength:2,
                          maxlength:25,
                          lettersonly: true
                        },
                        firstname: {
                          required: true,
                          minlength:2,
                          maxlength:25,
                          lettersonly: true
                        },
                        telephone: {
                          required: true,
                          number:true,
                          minlength:6,
                          maxlength:15
                        },
                        terms: {
                          required: true,
                        },
                        countryid:{
                          required: true,
                          selectcheck: true
                        }
                      },
                      submitHandler: function(form) {
                            if(typeof lead != "undefined"){
                                return ajax_submit_lead();
                            }else{
                                return true;
                            }
                        }
                });
            })
            /* SET LANGUAGE SELECTOR */
            function Change2NewLookup() {
                jQuery("#lang_sel_list").prepend("<div class=language_selector_selected>"+  jQuery(".lang_sel_sel").html()  + "</div>");

                jQuery(".language_selector_selected").click(function() {
                    if(jQuery("#lang_sel_list ul").css("display")=="block") jQuery("#lang_sel_list ul").css("display","none");
                    else jQuery("#lang_sel_list ul").css("display","block");}
                );

                jQuery("body").click(function(event) {
                    if(event.target.className!="language_selector_selected")
                        jQuery("#lang_sel_list ul").css("display","none");
                    }
                );

            }
            function ajax_submit_lead(){
                firstname = jQuery("#firstname").val();
                lastname  = jQuery("#lastname").val();
                email     = jQuery("#email").val();
                telephone = jQuery("#telephone").val();
                currency  = jQuery("[name=currency]").val();
                countryid = jQuery("[name=countryid]").val();
                ajax_url  = '<?php echo admin_url('admin-ajax.php');?>';
                oftc = jQuery(".oftc").val();
                p1 = jQuery(".p1").val();
                p2 = jQuery(".p2").val();
                p3 = jQuery(".p3").val();

                jQuery.ajax({
                  dataType: "json",
                  type: "POST",
                  url: ajax_url,
                  data: {
                    firstname: firstname,
                    lastname : lastname,
                    email : email,
                    telephone : telephone,
                    currency : currency,
                    countryid : countryid,
                    oftc : oftc,
                    p1 : p1,
                    p2 : p2,
                    p3 : p3,
                    ajax: true,
                    action: "oc_lead"
                  },
                  success: function(result){
                    if(typeof result.results !="undefined" && result.results){
                        if(result.results == "ok"){
                            jQuery("#account_lead_form_m").append("<div class='ok'>OK</div>");
                            jQuery("#account_lead_form_m").find("input[type=tel],input[type=text], textarea,select").val("");
                            window.setInterval(function(){
                                jQuery(".ok,.err").remove();
                            },4000)
                        }else{
                            jQuery("#account_lead_form_m").append("<div class='ok'>ERROR:"+reason+"</div>");
                        }
                    }
                  }
                });

                return false;
            }
         </script>
         <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300" rel="stylesheet" type="text/css">
         <link type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet">
	</body>
</html>

<?php

    function base64url_encode($data) {
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    function base64url_decode($data) {
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

    function fixUrl( $url ){
        $tmp['array']   = explode('.css' , $url );
        $tmp['result']  = substr( $tmp['array'][0], 0, -2 );

        $result = $tmp['result'] . '.css' . $tmp['array'][1];

        return $result;
    }

    function url_exist($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($code == 200){
            $status = true;
        }else{
            $status = false;
        }
        curl_close($ch);

        return $status;
    }

?>
