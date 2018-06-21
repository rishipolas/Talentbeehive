<?php 
session_start();
$aaa=$_SESSION['myValue']?>
<?php include("config1.php");
//$sess=$aaa;
$inid=$_SESSION['id'];
$instiid=$_SESSION['email'];
$cid=$_POST['cid'];
$id=$_GET['iid'];
$instname=$_POST['cname'];
$email=$_POST['email'];
$fname=$_POST['fname'];


$to=$email;


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
    $mail->addBCC('palalok1@gmail.com');
    $mail->addBCC('sushantk6158@gmail.com');

  
  //Attachments
        // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  //Content
  $mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject   = 'Invitation alert from ' . $instname . ' ';
  $mail->Body    = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Invitation Alert</b></title>
                </head>
                <body>
             
              
              <p>' . $instname . ' has invited your estimed orgnization to go through<br>
		the profiles of students & provide them an opportunity to step<br>
		into career.Click below to view institute profile. <br><p>
              <br>
              
              <a class="btn btn-primary btn-block"" href="https://www.talentbeehive.com/institute/institute_prof_view.php?iid='.$instiid.'&fname='.$fname.'&inid='.$inid.'&cid='.$cid.'">View Institute Profile</a><br><br>


Best Regards<br>
Team TalentBeehive.com<br><br>
Have a question? E-mail at <a href="#">info@talentbeehive.com</a><br></div><br><br>






<div style="padding:20px;font-size:12px;width:500px;height:500px;">
This is to acknowledge that you have registered as a candidate with TalentBeehive, have agreed to abide to the terms of use and ourprivacy commitment,<br></div>

</div>';


  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
    echo "Sent Successfully...!!";

  }
 catch (Exception $e) { 
 echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Server Problem')
	  window.location.href='search_company_institute.php';
	  </SCRIPT>");

  }

 
?>



