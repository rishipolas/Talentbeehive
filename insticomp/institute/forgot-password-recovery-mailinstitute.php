<?php
if(!class_exists('PHPMailer')) {
    require('../phpmailer/class.phpmailer.php');
	require('../phpmailer/class.smtp.php');
}

//require_once("mail_configuration.php");


        
		$to =  $_POST["email"];
         $subject = "Forgot Password Mail";
         
          $message = '<html><head>
                <title>Forgot Password</title>
                </head>
                <body>';
        $message .= '<h1>Hi ' . $_POST["institute_name"] . '!</h1>';
        $message .= '<p><a href="http://www.talentbeehive.com/institute/reset_passwordinstitute.php">CLICK HERE TO RESET PASSWORD</a>';
        $message .= "</body></html>";
        
         
          $header .= "MIME-Version: 1.0"."\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $header .= 'From:TALENT BEEHIVE <admin@talentbeehive.com>'."\r\n";
        $header .= 'Cc:info@talentbeehive.com'." \r\n";
        $header .= 'Bcc:palalok1@gmail.com'." \r\n";
        $header .= 'Bcc:sushantk6158@gmail.com'." \r\n";
       
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
           // echo "Message sent successfully...";
		    echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('Check your email for Password Recovery!!')	      
	    </SCRIPT>");
				 }else {
			 echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('Message could not be sent...!!')	      
	    </SCRIPT>");
           // echo "Message could not be sent...";
         }
				
?>
