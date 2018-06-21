<?php 

session_start();

include("config1.php");

$q="select * from candidate_job_applied where can_name='{$_SESSION['name']}' and can_email='{$_SESSION['email']}' and fk_func_id=".$_GET['uid'];
$data = mysqli_query($DB,$q);
$rows=mysqli_fetch_array($data);
$num=mysqli_num_rows($data);

if($num==1)
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Already Shared.');
	  window.location.href='search_company.php';
	  </SCRIPT>");
	
}
else
{

//echo $_GET['cid'];

$q1="select * from candidate where name='{$_SESSION['name']}' and email='{$_SESSION['email']}'";
$data1 = mysqli_query($DB,$q1);
$rows1=mysqli_fetch_array($data1);

$getcourse=mysqli_query($DB, "select course  from course where c_id=".$rows1['course']);
                       $getcoursedetails = mysqli_fetch_array($getcourse);

$q2="select * from users where id=" .$_GET['uid'];
$data2= mysqli_query($DB,$q2);
$rows2=mysqli_fetch_array($data2);

//echo $rows2['title'];

$query ="INSERT INTO candidate_job_applied (com_name,com_email,industry_type,can_name,can_email,can_qualification,can_course,can_specialization,state,city,fk_func_id,fk_can_id,date,status) 
VALUES ('".$rows2['cname']."','".$rows2['email']."','".$rows2['type']."','".$rows1['name']."','".$rows1['email']."',".$rows1['qualification'].", ".$rows1['course'].",".$rows1['specialization'].",".$rows2['state'].",".$rows2['city'].",".$rows2['id'].",".$rows1['id'].",'".date("d-m-y")."','shared')";

$data=mysqli_query($DB,$query);

if($data==1)
{
//echo "hello";
 $to=$rows2['email'];

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
	$mail->Subject   = 'Candidate Shared Profile Mail ';
  $mail->Body    = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Candidate Shared Profile</b></title>
                </head>
                <body>
              <h1>'.$rows2['name'] .'</h1>
              
              <p>Welcome to TalentBeehive.com, We focus on making your shortlisting<br>
		easier by introducing our new feature of video profile accompanied with<br>
		shared resumes, also visit www.talentbeehive.com for fruitful results. <br><p>
              <br>
              <div style="border:2px solid black;padding:10px;width:400px;height:325px;padding:20px;margin-left:30px;">
<div style="font-size:25px;color:orange;"><marquee>Shared Profile</marquee></div> <b>'. $rows1['name'] .'</b>&nbsp; has shared his profile  and is willing to work in your <b>'.$rows2['name'] .'</b> under the <b>'.$getcoursedetails['course'].' </b>.<br><br>
How shared profile feature first time introduced by TalentBeehive
can help prevent getting junk applications.
<ul>
<li>Candidates willing to work with your organization but not
having suitable profile to listed jobs can
share profiles with company.</li>
<li>Companies can view shared profile in seperate folder on their
account.</li>
</ul>
Best Regards<br>
Team TalentBeehive.com<br><br>
Have a question? E-mail at <a href="#">info@talentbeehive.com</a><br></div><br><br>


<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;">Recruiters may contact you at '. $rows1['email'].'</div>




<div style="padding:20px;font-size:12px;width:500px;height:500px;">
This is to acknowledge that you have registered as a candidate with TalentBeehive, have agreed to abide to the terms of use and ourprivacy commitment,<br></div>

</div>';
$mail->addAttachment($_SERVER["DOCUMENT_ROOT"].'/resume/'. $rows1['res'], $rows1['res']);   
              $message .= "</body></html>";

  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Successfully Shared Profile To Company ')
	  window.location.href='search_company.php';
	  </SCRIPT>");

  }
 catch (Exception $e) { 
 echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Some Server Problem ')
	  window.location.href='search_company.php';
	  </SCRIPT>");

  }
}
}	

?>




