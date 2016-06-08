<?php 
function send_mail_after_user_registration($user_id){
    global $redux_demo;
    
    $from = '';
    if(!empty($redux_demo['main_email_adress'])){
       $from = $redux_demo['main_email_adress']; 
    }else{
        $from = 'info@lawdex.co.il';
    }
    
    $user = get_user_by("id",$user_id);

    $to = $user->user_email;
    $subject = 'רישום לאתר אינדקס עורכי דין';
    
    $headers = "From $from ". PHP_EOL;
	$headers .= "Reply-To: $from". PHP_EOL;
	$headers .= "MIME-Version: 1.0". PHP_EOL;
	$headers .= "Content-type: text/html; charset=utf-8". PHP_EOL;
	$headers .= "Content-Transfer-Encoding: quoted-printable". PHP_EOL;
    
    $message = '<html><body style="direction:rtl; text-align:right;">';     
        $message .= '<div><h4>ברוך הבא לאתר Lawdex, אינדקס עורכי הדין הגדול בישראל.</h4>';
        $message .='<p>פרטי הרישום שלך באתר הנם:</p>';
        $message .='<p><strong>שם משתמש: </strong>'.$user->user_nicename.'</p>';
        $message .='<p><strong>אימייל: </strong>'.$user->user_email.'</p>';
        $message .='<p><strong>סיסמא: </strong>'.$_POST['password'].'</p>';
        $message .='<div>';
    $message .= '</body></html>';
    
    wp_mail($to , $subject, $message, $headers );
}
?>