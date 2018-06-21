<?php
session_start();

include("config1.php");


$q="select * from candidate_job_applied where can_name='{$_SESSION['name']}' and can_email='{$_SESSION['email']}' and fk_func_id=".$_GET['fid'];
$data = mysqli_query($DB,$q);
$rows=mysqli_fetch_array($data);
$num=mysqli_num_rows($data);

if($num==1)
{

  $q1="select * from candidate where name='{$_SESSION['name']}' and email='{$_SESSION['email']}'";
$data1 = mysqli_query($DB,$q1);
$rows1=mysqli_fetch_array($data1);
 $qu=$rows1['qualification'];
$r=$rows1['role'];



	    echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Already Applied for this job',


}, function(isConfirm) {
     document.location.href='candidate-jobs.php?qualification=$qu&role=$r'
});
});

</script>";


}
else
{


$q1="select * from candidate where name='{$_SESSION['name']}' and email='{$_SESSION['email']}'";
$data1 = mysqli_query($DB,$q1);
$rows1=mysqli_fetch_array($data1);


$q2="select * from functionality where id=" .$_GET['fid'];
$data2= mysqli_query($DB,$q2);
$rows2=mysqli_fetch_array($data2);



$query ="INSERT INTO candidate_job_applied (com_name,com_email,can_name,can_email,can_qualification,can_course,can_specialization,role,state,city, fk_func_id, fk_can_id,date) VALUES ( '".$rows2['name']."','".$rows2['email']."','".$rows1['name']."',  '".$rows1['email']."','".$rows1['qualification']."','".$rows1['course']."','".$rows1['specialization']."','".$rows2['role']."', '".$rows2['state']."',".$rows2['city'].",".$rows2['id'].",".$_GET['caid'].",'".date("d-m-y")."')";
$data3 = mysqli_query($DB,$query);
$qu=$rows1['course'];
$r=$rows1['role'];

if($data3){

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

  
  //Attachments
  $mail->addAttachment($_SERVER["DOCUMENT_ROOT"].'/resume/'. $rows1['res'], $rows1['res']);         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  //Content
  $mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject   = 'Candidate Appllication Mail ';
  $mail->Body    = '<html><head>
              <title>Candidate Application</title>
              </head>
              <body>
              <h1>'.$rows2['name'] .'</h1>
              <p>Welcome to TalentBeehive.com, We focus on making your shortlisting<br>
		easier by introducing our new feature of video profile accompanied with<br>
		shared resumes, also visit www.talentbeehive.com for fruitful results. <br><p>
             <br>
              <div style="border:2px solid black;padding:10px;width:400px;height:325px;padding:20px;margin-left:30px;">
<div style="font-size:25px;color:orange;"><marquee>Applied Profile</marquee></div> <b>'. $rows1['name'] .'</b>&nbsp; has applied for profile of <b>'.$rows2['title'] .'</b> and is willing to work in your <b>'.$rows2['name'] .'</b> under the <b>'.$getcoursedetails['course'].' </b>.<br><br>

Best Regards<br>
Team TalentBeehive.com<br><br>
Have a question? E-mail at <a href="#">info@talentbeehive.com</a><br></div>


<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;">Recruters may contact you at '. $rows1['email'].'</div>




<div style="padding:20px;font-size:12px;width:500px;height:500px;">
This is to acknowledge that you have registered as a candidate with TalentBeehive, have agreed to abide to the terms of use and ourprivacy commitment,<br></div>

</div>';
 

  $mail->send();
  echo "
    <script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
    <script>
      $( document ).ready(function() {
        swal({
          title: 'Applied successfully',
        }, function(isConfirm) {
          document.location.href='candidate-jobs.php?course=$qu&role=$r'
        });
      });
    </script>";

} catch (Exception $e) {
	  echo "
      <script type='text/javascript' src='js/jquery-latest.js'></script>
      <script src='js/sweetalert.min.js'></script>
      <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
      <script>
        $( document ).ready(function() {
          swal({
            title: 'Message could not send',
          }, function(isConfirm) {
            document.location.href='candidate-jobs.php?qualification=$qu&role=$r'
          });
        });
      </script>";
	
}
}
}
?>