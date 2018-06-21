<?php

include_once("config1.php");
session_start();
if(!isset($_POST['btnpost']))
  header('location:company-login.php');

  $index1=$index2="";
  
$id=$_POST['id'];
$type=$_POST['type'];
$title=$_POST['title'];
$name=$_POST['name'];
$role=$_POST['role'];
$openings=$_POST['openings'];

$qualification=$_POST["qualification"];
    $qualification1= implode(',', $qualification);
//echo '<script>alert("'.$qualification1.'")</script>';
    
    $course=$_POST["course"];
    $course1= implode(',', $course);
// echo '<script>alert("'.$course1.'")</script>';
  
    $specialization=$_POST["specialization"];
    $specialization1= implode(',', $specialization);

$skills=$_POST['skills'];
$atype=$_POST['atype'];
$year1=$_POST['year1'];
$month1=$_POST['month1'];
$year2=$_POST['year2'];
$month2=$_POST['month2'];
$ayear=$year1.".".$month1;
$byear=$year2.".".$month2;
$year=$ayear."-".$byear;
$state=$_POST['state'];
$city=$_POST['city'];
$description=$_POST['description'];

date_default_timezone_set("Asia/Kolkata");
$dt=date("d-m-y")."/".date("h:i:sa");
//$DB=mysqli_connect('localhost','root','');

//$con=mysqli_connect('localhost','root','');
//$DB=mysqli_connect('166.62.10.54','roottalent','beehive@root');
//mysqli_select_db($DB,'socialuser');
$query="INSERT INTO functionality(type,title,name,email,role,openings,qualification,course,specialization,skills,atype,year,state,city,description,date)    values('$type','$title','$name','{$_SESSION['email']}','$role','$openings','$qualification1','$course1','$specialization1','$skills','$atype','$year',$state,$city,'$description','$dt')";
$status=mysqli_query($DB,$query);



							$str2 = $qualification1;	
						    $strs2=explode(",",$str2);
						     $qual="";
							  foreach($strs2 as $q2){
							
							 $q1="select qualification from qualification where id='$q2'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['qualification'];
							   $qual=$qual.$c.", ";
							  }
							 
						//echo $qual;
                        
                 			$str3 = $course1;	
					$strs3=explode(",",$str3);
					$st1="";
					foreach($strs3 as $q3)
					{
						$q1="select course from course where c_id='$q3'";
						$result1=mysqli_query($DB,$q1);
						$row1=mysqli_fetch_array($result1);
						$c=$row1['course'];
						$st1=$st1.$c.", ";
					}
												 
					//echo $st1;
							$str1 = $specialization1;	
						    $strs=explode(",",$str1);
						     $str="";
							  foreach($strs as $b){
							
							 $q1="select specialization from specialization where s_id='$b'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['specialization'];
							   $str=$str.$c.", ";
							  }
    			$getstate=mysqli_query($DB,"select statename  from state where id=".$state);
              $getstatedetails = mysqli_fetch_array($getstate);
              $stat=$getstatedetails['statename'];
              
              $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$city);
              $getcitydetails = mysqli_fetch_array($getcity);
              $cit=$getcitydetails['cityname'];
    
    
    
    

    // part of email
        $status=mysqli_query($DB,$query);
	 $qualification= explode(',', $qualification1);
	$course= explode(',', $course1);
	//echo '<script>alert("'.$qualification.'")</script>';
       if ($status > 0) 
       {
          $count=count($qualification);
          for ($index1 = 0; $index1 < count($qualification); $index1++)
          {
      //echo '<script>alert("heyy")</script>';
           for($index2=0; $index2 <count($course); $index2++)
           {
        
        //for($index3=0; $index3 < count($specialization); $index3++) 
         
          $sql="select email from candidate where qualifications='$qualification[$index1]'"
            . " and ( courses='$course[$index2]')"; 
   
    
          $result = mysqli_query($DB, $sql);
              
              require_once "phpmailer/class.phpmailer.php";
  //require 'phpmailer/PHPMailerAutoload.php';

  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
 

    //Recipients
    $mail->setFrom('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addAddress('donotreply@talentbeehive.com', 'user');     // Add a recipient
    $mail->addReplyTo('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addCC('info@talentbeehive.com');
    $mail->addBCC('abhijeets@talentbeehive.com');
    $mail->addBCC('sushantk6158@gmail.com');
    
   
    while ($row = mysqli_fetch_array($result)) {
      $mail->addBCC($row['email']); 
    }
   
  
   

     

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject   = 'Job Posted';
    $mail->Body    = '<!DOCTYPE html>
<html><head>
</head>
<body>
    
    <div style="margin:40px;">
                <b>Dear Candidate,</b><br><br>
                <p>Talent Beehive is a platform which gives you an opportunity to upload video resume about your convincing candidature which will help to bridge gaps in between requirements from various industries and jobseekers.<p>
                <table border="2"><tr><th>Employer Name</th><td>'.$name.'</td></tr>
                <tr><th>Job Title</th>  <td>'. $title.'</td></tr>
</table>
<br><a href="www.talentbeehive.com/candidate-login.php">Click here to Apply</a><br><br>

<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;">Recruiters may try to contact you at </div>
<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;"><b></b>Email Address: info@talentbeehive.com<a href="#"></a></div>
<div style="border:1px black;padding:10px;width:250px;height:10px;background-color:#EBEDEF;"><b></b>Contact Number: 7030122842</div><br><br>

<b>Best Regards, <br>
Talentbeehive.com</b>
</div>
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
            
      }//for index2
    }//for index1

    
    
  }//if status

 
 



?>