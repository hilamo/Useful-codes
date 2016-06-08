<?php 
/** in functions.php **************************************/

add_action( "wpcf7_before_send_mail", "mycf7_before_send_mail" );

function mycf7_before_send_mail($WPCF7_ContactForm) {
    $form_id = $WPCF7_ContactForm->id;
    $forms_api = get_field("forms","option");
    $submission = WPCF7_Submission::get_instance();

    foreach($forms_api as $form){
        if($form["form"] == $form_id){
            $rav_messer_form_id = $form["form_id_rav_messer"];
            break;
        }
    }
    $post = get_post_id_from_wpcf7($submission);

    $mail = $WPCF7_ContactForm->prop('mail');
    $mail['body'] = str_replace("[post_url]",'כתובת עמוד: '.urldecode(get_permalink($post->ID)),$mail['body']);
    $mail['body'] = str_replace("[post_title]",'כותרת עמוד: '.urldecode($post->post_title),$mail['body']);

	$WPCF7_ContactForm->set_properties( array( 'mail' => $mail ) );

    if($rav_messer_form_id){
        $url = $submission->get_meta( 'url' );
        $params = $submission->get_posted_data();

        $params["כתובת הפוסט"] = $url;
        $params["שם הפוסט"] = $post->post_title;
        
		send_to_rav_messer($params,$rav_messer_form_id);

    }
}

function send_to_rav_messer($params,$form_id){
    $url = "https://cp.responder.co.il/subscribe.php";

	// remove unnecessary fields of CF7 before sending to Rav meser
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
function get_post_id_from_wpcf7($submission){
    $unit_tag = $submission->get_meta( 'unit_tag' );

  if ( $unit_tag
      && preg_match( '/^wpcf7-f(\d+)-p(\d+)-o(\d+)$/', $unit_tag, $matches ) ) {
      $post_id = absint( $matches[2] );

      if ( $post = get_post( $post_id ) ) {
              $the_post_id = (string) $post->ID;
              $the_post_name = $post->post_name;
              $the_post_title = $html ? esc_html( $post->post_title ) : $post->post_title;
      }
      return $post;
  }
}


/** Contact form 7 example **********************/
Form: 
<div class="quick_contacts contact_form">
<p><strong>משהו חדש מתחיל... </strong>קבלו בחינם קורס מעולה שילמד אתכם למכור ולהרוויח באיביי!</p>
<div class="wrap_fields"><div class="field">[text* subscribers_name watermark "שם מלא"]</div>
<div class="field">[email* subscribers_email watermark "דוא''ל"]</div>
<div class="field">[tel* subscribers_phone watermark "טלפון"]</div>
<div class="field submit hvr-sweep-to-bottom">[submit "שלחו לי קורס מעולה בחינם!"]</div></div></div>

Message:
מאת: [subscribers_name] 
<[subscribers_email]>
טלפון: [subscribers_phone]

נשלח מעמוד: [post_title]
כתובת: [post_url]

--
אימייל זה נשלח מטופס יצירת קשר ב יעל גלזר (http://213.52.130.243/~glazer)