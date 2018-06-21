<?php
session_start();

if(! isset($_SESSION['email']))
   header('location: candidate-login.php');


 
  require_once "phpmailer/class.phpmailer.php";
        
		$to =  $_GET["e"];
		
		 $subject = "Video Profile Requested";
         
         
          $message = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Email Verification</b></title>
                </head>
                <body>';
          
        $message .= '<h4>Dear <b> '.$row->can_name.'</b>,</h4>';
        $message .= '<p>You are Requested To Upload Video Profile By Company </p>';
        $message .= '<p>Welcome to TalentBeehive.com, One stop solution to Search, Find and Apply <br>
jobs online. Where companies and recruiter’s appreciating new ways of easy
shortlisting .<br><br>

<b>'. $row->com_name .'  </b>has viewed your profile and requested for your video <br> Profile as soon as possible
<br><br>
<div style="border:2px solid black;padding:10px;width:400px;height:150px;padding:20px;margin-left:30px;">
<div style="font-size:25px;color:red;"><marquee>Upload Resume</marquee></div><a href="candidate-login.php">Click here</a> to upload your Video Profile on <a href="#">talentbeehives.com</a> and start getting notified for suitable jobs.<br><br>
Best Regards<br>
Team TalentBeehive.com<br><br>
Have a question? E-mail at <a href="#">info@talentbeehive.com</a><br></div><br><br>


<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;">Recruters may contact you at '. $row->can_email .'</div>
<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;"><b></b>Email Address: <a href="#">support@talentbeehive.com</a></div>
<div style="border:1px black;padding:10px;width:250px;height:10px;background-color:#EBEDEF;"><b></b>Contact Number: +91-8623804382</div><br><br>



<div style="padding:20px;font-size:12px;width:500px;height:500px;">
This is to acknowledge that you have registered as a candidate with TalentBeehive, have agreed to abide to the terms of use and ourprivacy commitment,<br></div>

</div>';
        $message .= "</body></html>";
        
         
         $header .= "MIME-Version: 1.0"."\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
       $header .= 'From:TALENT BEEHIVE <admin@talentbeehive.com>'."\r\n";
        $header .= 'Cc:info@talentbeehive.com'." \r\n";
        $header .= 'Bcc:sushantk6158@gmail.com'." \r\n";
        $header .= 'Bcc:mullachandbibi@gmail.com'." \r\n";
        $header .= 'Bcc:abhijeets@talentbeehive.com'." \r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
           // echo "Message sent successfully...";
           
             echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('Request for Video Profile send To Applicant successfully! !!')
	      window.location.href='shared-profile.php';
	    </SCRIPT>");
		   
				 }else {
			  echo '<script type="text/javascript">
		       alert("Message could not be sent...!!");
		        </script>';
           // echo "Message could not be sent...";
         }
 
 
 
 
 
 
 /*
 
 $message = '<html><head>
                <title>UPLOAD VIDEO</title>
                </head>
                <body>';
        $message .= '<h1>Hi' . $_SESSION['name']. '!</h1>';
        $message .= '<p>hello</p>';
        $message .= "</body></html>";
        

        // php mailer code starts
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port = 587;                   // set the SMTP port for the GMAIL server

        $mail->Username = 'kasatsurbhi0@gmail.com';
        $mail->Password = 'kasatsurbhi111';

        $mail->SetFrom('kasatsurbhi0@gmail.com', 'TALENTBEEHIVE');
        $mail->AddAddress($_GET['e']);

        $mail->Subject = trim("Request to Upload Your video Profile");
        $mail->MsgHTML($message);
		
		  try {
          $mail->send();
		 
          echo '<script type="text/javascript">
		alert("Email has been sent to candidate to upload video profile");
		</script>';
          }
		  catch (Exception $ex) {
          $msg = $ex->getMessage();
          $msgType = "warning";
        }*/
		
		include("shared-profile.php");
		?>