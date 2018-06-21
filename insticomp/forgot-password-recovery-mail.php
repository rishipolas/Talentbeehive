<?php
if(!class_exists('PHPMailer')) {
    require('phpmailer/class.phpmailer.php');
	require('phpmailer/class.smtp.php');
}

//require_once("mail_configuration.php");

 require_once "phpmailer/class.phpmailer.php";
        
		$to =  $_POST["email"];
         $subject = "Forgot Password Mail";
         
          $message = '<html><head>
                <title>Forgot Password</title>
                </head>
                <body>';
             $message .= '<h1>Hi ' . $_POST["cname"] . '!</h1>';
              
             $message .= '<p><a href="http://www.talentbeehive.com/reset_password.php">CLICK  HERE TO RESET YOUR  PASSWORD</a>';  
           
             $message .= "</body></html>";
        
        
         
         $header .= "MIME-Version: 1.0"."\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $header .= 'From:TALENT BEEHIVE <admin@talentbeehive.com>'."\r\n";
        $header .= 'Cc:info@talentbeehive.com'." \r\n";
        $header .= 'Bcc:sushantk6158@gmail.com'." \r\n";        
        $header .= 'Bcc:abhijeets@talentbeehive.com'." \r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
         
         	echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('Check your email for Password Recovery!!')	      
	    </SCRIPT>");
		    
				 }else {
				 echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('Message could not be sent...!!')	      
	    </SCRIPT>");
				 
			 
           
         }
				/*
$mail = new PHPMailer();

$emailBody = "<div>" . $user["cname"] . ",<br><br><p>Click this link to recover your password<br><a href='" . PROJECT_HOME . "job5/passwordreset.php?name=" . $user["cname"] . "'>" . PROJECT_HOME . "http://www.talentbeehive.com/reset_password.php?name=" . $user["cname"] . "</a><br><br></p>Regards,<br> Admin.</div>";

$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = PORT;  
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host     = MAIL_HOST;
$mail->Mailer   = MAILER;

$mail->SetFrom(SERDER_EMAIL, SENDER_NAME);
$mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);
$mail->ReturnPath=SERDER_EMAIL;	
$mail->AddAddress($user["email"]);
$mail->Subject = "Forgot Password Recovery";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
	$error_message = 'Problem in Sending Password Recovery Email';
} else {
	$success_message = 'Please check your email to reset password!';
}
*/
?>
