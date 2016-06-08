<?php 

/** Send contact form - in licenses */
function send_conact_form_email(){
    global $redux;
    //$email_sent = false;
	
    $error_name = false;
    $error_phone = false;
	$error_email = false;
    $error_message  = false;
    
	if(isset($_POST['form_submit_btn'])) {
		$name = '';
        $email = '';
		$phone = '';
        $message = '';
		$reciever_email = '';
		$return = array();
  
		if(trim($_POST['full_name']) === '') {
			$error_name = true;
		} else{
			$name = trim($_POST['full_name']);
		}
		if(trim($_POST['email']) === '' || !is_email($_POST['email'])) {
			$error_email = true;
		} else{
			$email = trim($_POST['email']);
		}
        if(trim($_POST['phone']) != '') {
			$phone = trim($_POST['phone']);
		}
         if(trim($_POST['message']) === '') {
			$error_message = true;
		} else{
			$message = trim($_POST['message']);
		}
        
        // Check if we have errors
		if(!$error_name && !$error_phone && !$error_message && !$error_email) {
			// Get the received email
			$reciever_email = $redux['send_to'];
            echo $reciever_email;
            
			$subject = 'You have been contacted by ' . $name;

			$body = "You have been contacted by $name. Their message is: " . PHP_EOL . PHP_EOL;
			$body .= $message . $phone . PHP_EOL . PHP_EOL;
			$body .= "You can contact $name via email at $email";
			
			$body .= PHP_EOL . PHP_EOL;

			$headers = "From $email ". PHP_EOL;
			$headers .= "Reply-To: $email". PHP_EOL;
			$headers .= "MIME-Version: 1.0". PHP_EOL;
			$headers .= "Content-type: text/plain; charset=utf-8". PHP_EOL;
			$headers .= "Content-Transfer-Encoding: quoted-printable". PHP_EOL;
            
			if(wp_mail($reciever_email, $subject, $body, $headers)) {
		 	    //$email_sent = true;
                //echo "<script>setCookie('sendemail',1,'/','/',30)</script>";
				$return['status'] = 'success';
				$return['msg'] = 'All is well, your email has been sent.';
			} else{
				$return['status'] = 'error';
				$return['msg'] = 'Error while sending a message!';
			}
		}else{
			// Return errors
			$return['status'] = 'error';
			$return['msg'] = 'Please, fill in the required fields!';
		}
	} 
}

?>