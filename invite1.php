<?php session_start();
$company=$_SESSION['cnames'];
$aaa=$_SESSION['cid'];?>
<?php include("config1.php");
//$sess=$aaa;
$id=$_GET['iid'];
$email=$_GET['emails'];
//echo $email;
$instname=$_GET['instname'];
//echo $id;



//$dupesql = "SELECT * FROM invitation_to_institute where (institute_id = '$id')";

//$duperaw = mysql_query($dupesql);

//if (mysql_num_rows($duberaw) > 0) {
  //your code ...
//}


 $sql="insert into invitation_to_institute (institute_id,company_id,institute_name,course_id,status) values ('$id','$aaa','$instname','mca','invite')";
$query=mysqli_query($DB,$sql);

 $to = $email;
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
    $mail->addBCC('mullachandbibi@gmail.com');
    $mail->addBCC('sushantk6158@gmail.com');

  
  //Attachments
        // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  //Content
  $mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject   = 'Invitation alert from ' . $company . ' ';
  $mail->Body    = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Invitation Alert</b></title>
                </head>
                <body>
             
              
              <p>' . $company . ' wants to hire your students through campus <br>
		             hiring activity on talentbeehive.com<br>
		        <p>
              <br>
              
              <button class="class="btn btn-primary btn-block"" href="https://www.talentbeehive.com/institute/institute_prof_view.php?iid='.$aaa.'">View Institute Profile</button><br><br>


Best Regards<br>
Team TalentBeehive.com<br><br>
Have a question? E-mail at <a href="#">info@talentbeehive.com</a><br></div><br><br>






<div style="padding:20px;font-size:12px;width:500px;height:500px;">
This is to acknowledge that you have registered as a candidate with TalentBeehive, have agreed to abide to the terms of use and ourprivacy commitment,<br></div>

</div>';


  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Invite Sent')
	  window.location.href='search_institutes.php';
	  </SCRIPT>");

  }
 catch (Exception $e) { 
 echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Server Problem')
	  window.location.href='search_institutes.php';
	  </SCRIPT>");

  }
				      

       
				


?>