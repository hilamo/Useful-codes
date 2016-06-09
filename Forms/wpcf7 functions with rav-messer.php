<?php 
function mycf7_before_send_mail($WPCF7_ContactForm) {
    $form_id = $WPCF7_ContactForm->id;
    $forms_api = get_field("forms","option"); // ACF repeater field which holds and Form Object and rav_messer form ID
    $submission = WPCF7_Submission::get_instance();

    foreach($forms_api as $form){
        if($form["form"] == $form_id){
            $rav_messer_form_id = $form["form_id_rav_messer"];
            break;
        }
    }

    $post = get_post_id_from_wpcf7($submission);

    $mail = $WPCF7_ContactForm->prop('mail');

    $mail['body'] = str_replace("[post_url]",'כתובת עמוד: '.urldecode($submission->get_meta("url")),$mail['body']); // Only translation
    $mail['body'] = str_replace("[post_title]",'כותרת עמוד: '.urldecode($post->post_title),$mail['body']); // Only translation

	$WPCF7_ContactForm->set_properties( array( 'mail' => $mail ) );

    if($rav_messer_form_id){

        $url = $submission->get_meta( 'url' );
        $params = $submission->get_posted_data();

        $params["כתובת הפוסט"] = $url; // add custom parameter to submission
        $params["שם הפוסט"] = $post->post_title; // add custom parameter to submission

        send_to_rav_messer($params,$rav_messer_form_id); // send mail to rav messer with new parameters

    }
}
add_action( "wpcf7_before_send_mail", "mycf7_before_send_mail" );

/********************************************************************************/

function send_to_rav_messer($params,$form_id){
    $url = "https://cp.responder.co.il/subscribe.php";

    unset($params["_wpcf7"]);
    unset($params["_wpcf7_version"]);
    unset($params["_wpcf7_locale"]);
    unset($params["_wpcf7_unit_tag"]);
    unset($params["_wpcf7_is_ajax_call"]);
    $new_params = array();

    foreach($params as $key=>$param){
        $new_params["fields[".$key."]"] = $param;
    }

    $new_params["form_id"] = $form_id; 

    $params_string = http_build_query($new_params);

    //open connection
    $ch = curl_init();
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($params));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $params_string);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);
}

/********************************************************************************/

function get_post_id_from_wpcf7($submission){
    $unit_tag = $submission->get_meta( 'unit_tag' );

  if ( $unit_tag  && preg_match( '/^wpcf7-f(\d+)-p(\d+)-o(\d+)$/', $unit_tag, $matches ) ) {
		$post_id = absint( $matches[2] );  //  $unit_tag for example: _wpcf7_unit_tag:wpcf7-f4-p6-o1. "f" is the form ID, "p" is the post ID that holds the form
	
      if ( $post = get_post( $post_id ) ) {
              $the_post_id = (string) $post->ID;
              $the_post_name = $post->post_name;
              $the_post_title = $html ? esc_html( $post->post_title ) : $post->post_title;
      }
      return $post;
  }
}
