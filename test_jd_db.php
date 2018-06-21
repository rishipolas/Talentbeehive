<?php


//session_start();
//if(!isset($_SESSION['email']))
//	header('location:company-login.php');



$id=$_POST['id'];
$type=$_POST['type'];
$title=$_POST['title'];
$name=$_POST['name'];
$role=$_POST['role'];
$openings=$_POST['openings'];
$qualification=$_POST['qualification'];
$course=$_POST['course'];
$specialization=$_POST['specialization'];
$skills=$_POST['skills'];
$atype=$_POST['atype'];
/*$year1=$_POST['year1'];
$month1=$_POST['month1'];
$ayear=$year1.".".$month1;
$year2=$_POST['year2'];
$month2=$_POST['month2'];
$byear=$year2.".".$month2;
$year=$ayear."-". $byear;
*/
$state=$_POST['state'];
$city=$_POST['city'];
$description=$_POST['description'];

date_default_timezone_set("Asia/Kolkata");
$dt=date("d-m-y")."/".date("h:i:sa");

//$con=mysqli_connect('localhost','root','');
$con=mysqli_connect('166.62.10.54','roottalent','beehive@root');
mysqli_select_db($con,'socialuser');
$q="INSERT INTO 
    functionality(type,title,name,femail,role,openings,qualification,course, specialization,skills,atype,year,state,city,description,date) 
    values('$type','$title','$name','abc@gmail.com','$role','$openings','$qualification', '$course', '$specialization','$skills','$atype','k',$state,$city,'$description','$dt')";
$status=mysqli_query($con,$q);


if ($status > 0) {
	  $query = "SELECT email FROM  candidate  WHERE  specialization= '$specialization' OR course='$course'";

  // submit the query

  $result = mysqli_query($con, $query);

  // create array to store all the emails
  
  //echo "hhhhh";
  
  
  

  require_once "phpmailer/class.phpmailer.php";
  require 'phpmailer/PHPMailerAutoload.php';

  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
 

    //Recipients
    $mail->setFrom('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addAddress('donotreply@talentbeehive.com', 'user');     // Add a recipient
    $mail->addReplyTo('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addCC('info@talentbeehive.com');
    $mail->addBCC('abhijeets@talentbeehive.com');
    $mail->addBCC('mullachandbibi@gmail.com');
    
   
    while ($row = mysqli_fetch_array($result)) {
      $mail->addBCC($row['email']); 
    }
   
  
   

     

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject   = 'Job Posted';
    $mail->Body    = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Job Post</b></title>
                </head>
                <body>
                <b>Dear Candidate,</b><br><br>
                <p>Talent Beehive is a platform which gives you an opportunity to upload video resume about your convincing candidature which will help to bridge gaps in between requirements from various industries and jobseekers.<p>
                <table border="2"><tr><th>Employer Name</th><td>'.$name.'</td></tr>
                <tr><th>Job Title</th>	<td>'. $title.'</td></tr>
</table>
<br><a href="www.talentbeehive.com/candidate-login.php">Click here to Apply</a><br><br>

Wishing you a great career ahead.<br><br>

<b>Best Regards, <br>
Talentbeehive.com</b>
                </body>
                </html>';

   
    $mail->send(); 
   
echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Successfully Posted',
       text: 'success',
       type: 'success',
}, function(isConfirm) {
     document.location.href='job-post.php'
});
});

</script>";
 
 }
 catch (Exception $e)  {                                                 echo ("<SCRIPT>
	 						  window.alert('Can't Post')
	  						window.location.href='jd.php';
	   						</SCRIPT>");
						 
}
 }



?>