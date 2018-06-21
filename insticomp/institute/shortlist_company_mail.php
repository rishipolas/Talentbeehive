<?php 
include 'config1.php';


$cid=$_GET['cid'];
$instid=$_GET['instid'];


$query = $DB->query("SELECT email FROM users where id=".$cid."");
$getemail =$query->fetch_assoc();

$query1 = $DB->query("SELECT institute_name FROM institute_registration where id=".$instid."");
$getname =$query1->fetch_assoc();

$to=(string)$getemail['email'];
date_default_timezone_set("Asia/Kolkata");
$dt=$cid.",".date("d-m-y");
$sfile=$dt.".xls";
$path="./excel/".$instid."/shortlist/$sfile";
$path = str_replace(' ', '', $path);
$path=trim($path);

 require_once "phpmailer/class.phpmailer.php";
  require 'phpmailer/PHPMailerAutoload.php';
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
  /*
   $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->Port = 25;
    */

   //Recipients
    $mail->setFrom('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addAddress($to, 'user');     // Add a recipient
    $mail->addReplyTo('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addCC('info@talentbeehive.com');
    $mail->addBCC('abhijeets@talentbeehive.com');
    $mail->addBCC('sushantk6158@gmail.com');

  
  //Attachments
        // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  //Content
  $mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject   = 'Shortlisted students of ' .$getname['institute_name']. ' ';
  $mail->Body    = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Shortlisting Alert</b></title>
                </head>
                <body>     
                Dear user,
                 
              <p>Thank you for using campus hiring feature of talentbeehive.com.<br>
               Attatched is the list of candidates shortlisted from student database of ' .$getname['institute_name']. '. <br><p>
              <br>
              
             


Best Regards<br>
Team TalentBeehive.com<br><br>
Have a question? E-mail at <a href="#">info@talentbeehive.com</a><br></div><br><br>







<div style="padding:20px;font-size:12px;width:500px;height:500px;">
This is to acknowledge that you have registered as a company with TalentBeehive, have agreed to abide to the terms of use and ourprivacy commitment,<br></div>

</div>';


  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->addAttachment($path);
  $mail->send();
    $query1 = $DB->query("DELETE FROM `shorlist` WHERE cid=".$cid."");
echo ("<SCRIPT LANGUAGE='JavaScript'>			          
				 window.alert('Mail Sent Successfully')
	         		window.location.href='../index.php';
	                        </SCRIPT>");
  }
 catch (Exception $e) { 
 echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Server Problem')
	  
	  </SCRIPT>");
	


  }


 
?>



