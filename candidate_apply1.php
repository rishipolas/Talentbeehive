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



 
$query ="INSERT INTO candidate_job_applied (com_name, com_email,can_name,can_email,can_qualification,can_course,can_specialization,role,location, fk_func_id, fk_can_id,date) VALUES ( '".$rows2['name']."',  '".$rows2['femail']."','".$rows1['name']."',  '".$rows1['email']."',".$rows1['qualification'].", ".$rows1['course'].",".$rows1['specialization'].",'".$rows2['role']."', '".$rows2['location']."',".$rows2['id'].",".$_GET['caid'].",'".date("d-m-y")."')";
$data3 = mysqli_query($DB,$query);
$qu=$rows1['qualification'];
$r=$rows1['role'];

if($data3){



  $to=$rows2['femail'];
  require_once "phpmailer/class.phpmailer.php";
  require 'phpmailer/PHPMailerAutoload.php';

  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->Port = 25;

    //Recipients
    $mail->setFrom('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addAddress($to, 'user');     // Add a recipient
    $mail->addReplyTo('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addCC('info@talentbeehive.com');
    $mail->addBCC('abhijeets@talentbeehive.com');
    $mail->addBCC('mullachandbibi@gmail.com');
    $mail->addBCC('ujwwala@talentbeehives.com');

    //Attachments
    $mail->addAttachment($_SERVER["DOCUMENT_ROOT"].'/resume/'. $rows2['role'].' '  , 'Resume.pdf');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject   = 'Candidate Application Mail New';
    $mail->Body    = "<html><head>
                <title>Candidate Application</title>
                </head>
                <body>
                <h1>Hi ".$rows1['name'] ."</h1>
                <p>Talent Beehive is a platform which gives you an opportunity to upload video resume about your convincing candidature which will help to bridge gaps in between requirements from various industries and jobseekers.<p>
                <b>" . $rows1['name'] . "</b> applied for role of <b>" . $rows2['role'] . "</b>
                </body>
                </html>";

    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message sent successfully.';
    
    
    echo "
    <script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
    <script>
      $( document ).ready(function() {
        swal({
          title: 'Applied successfully',		
        }, function(isConfirm) {
          document.location.href='candidate-jobs.php?qualification=$qu&role=$r'
        });
      });
    </script>";
  } catch (Exception $e) {
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
    
    
      echo "
      <script type='text/javascript' src='js/jquery-latest.js'></script>
      <script src='js/sweetalert.min.js'></script>
      <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
      <script>
        $( document ).ready(function() {
          swal({
            title: 'Applied successfully',		
          }, function(isConfirm) {
            document.location.href='candidate-jobs.php?qualification=$qu&role=$r'
          });
        });
      </script>";
  }

}
}

?>





