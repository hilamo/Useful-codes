<?php
add_action( 'wpcf7_before_send_mail', 'my_conversion',10,1 );
function my_conversion( $cf7 ){

    $submission = WPCF7_Submission::get_instance();
       if($submission) {
       $posted_data = $submission->get_posted_data();

        // the fields from contact form 7
        $email       = $posted_data["email"];
        $first_name  = $posted_data["first_name"];
        $last_name   = $posted_data["last_name"];
        $region      = $posted_data["region"];
        $country     = $posted_data["country"];
        $company     = $posted_data["company"];
        $description = $posted_data["description"];
        $industry    = $posted_data["industry"];
    }

    // the fields according to Salesforce contact form
    $post_items[] = 'oid=00D20000000CdDP';
    $post_items[] = 'email=' . $email;
    $post_items[] = 'first_name=' . $first_name;
    $post_items[] = 'last_name=' . $last_name;
    $post_items[] = '00Nw0000003yjRn=' . $region;
    $post_items[] = 'country='.$country;
    $post_items[] = 'company='.$company;
    $post_items[] = 'description='.$description;
    $post_items[] = 'industry='.implode('',$industry);


  if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($company) && !empty($region) && !empty($description)){ // check required fields
        $post_string = implode ('&', $post_items);
        // Create a new cURL resource
        $ch = curl_init();

        if (curl_error($ch) != ""){
          // error handling
        }

        $con_url = 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
        curl_setopt($ch, CURLOPT_URL, $con_url);
        // Set the method to POST
        curl_setopt($ch, CURLOPT_POST, 1);
        // Pass POST data
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_string);
        curl_exec($ch); // Post to Salesforce
        curl_close($ch); // close cURL resource
    }
}
