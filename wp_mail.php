<?php 
function send_mail_after_user_registration($user_id){
    
    $from = '';
    if(!empty(get_field('main_email_adress','option'))){
       $from = get_field('main_email_adress','option'); 
    }else{
        $from = 'info@example.com';
    }
    
    $user = get_user_by("id",$user_id);

    $to = $user->user_email;
    $subject = 'Registration';
    
    $headers = "From $from ". PHP_EOL;
	$headers .= "Reply-To: $from". PHP_EOL;
	$headers .= "MIME-Version: 1.0". PHP_EOL;
	$headers .= "Content-type: text/html; charset=utf-8". PHP_EOL;
	$headers .= "Content-Transfer-Encoding: quoted-printable". PHP_EOL;
    
    $message = '<html><body style="direction:rtl; text-align:right;">';     
        $message .= '<div><h4>Welcome to site</h4>';
        $message .='<p>Your registration details are:</p>';
        $message .='<p><strong>Username: </strong>'.$user->user_nicename.'</p>';
        $message .='<p><strong>Email: </strong>'.$user->user_email.'</p>';
        $message .='<p><strong>Password: </strong>'.$_POST['password'].'</p>';
        $message .='<div>';
    $message .= '</body></html>';
    
    wp_mail($to , $subject, $message, $headers );
}
?>