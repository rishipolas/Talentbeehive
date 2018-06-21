<?php 
session_start();

if(!isset($_SESSION['email']))
	header('location:company-login.php');

include('config1.php');

 if(isset($_GET['status']) )
{
	 require_once "phpmailer/class.phpmailer.php";
	 
	if(isset($_GET['id']) )
	{
		if(isset($_GET['fid']) )
	    {   
	

$c_status=$_GET['status'];
$id=$_GET['id'];
$fid=$_GET['fid'];



$select_status=mysqli_query($DB,"select * from candidate_job_applied where fk_can_id='$id' and  fk_func_id='$fid' ");
if($row=mysqli_fetch_object($select_status))
{

$email=$row->can_email;
$c_status=$row->status;
if($c_status!='shortlisted')
{
$status1=shortlisted;

}
$update=mysqli_query($DB,"update candidate_job_applied set status='$status1' where fk_can_id='$id' and  fk_func_id='$fid' ");

if($update)
{
     
      $to = $email;
				      
        $subject = "Application Status";
         
         
         $message = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Email Verification</b></title>
                </head>
                <body>';
          
        $message .= '<h4>Dear<b> '. $row->can_name.',</b></h4>';
        $message .= '<p> Application status </p>';
        $message .= '<p>Welcome to TalentBeehive.com, One stop solution to Search,<br> Find and Apply 
jobs online. Where companies and recruiter’s<br>  appreciating new ways of easy
shortlisting. Get your profile<br> highlighted by uploading your video profile and 
convince<br> employer’s about suitability of your profile. 

<br>This is  for the application status for the job you had applied .

<br><br>
<div style="border:2px solid black;padding:10px;width:400px;height:195px;padding:20px;margin-left:30px;">
<div style="font-size:25px;color:blue;"><marquee>Application Status </marquee></div> <b>'.$status1.'</b> to the <b>'.$row->com_name.'</b> for the <b>'.$row->role.' </b>.<br><br>
For any queries or need any information, Feel free to contact us.<br><br>
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
        $header .= 'Bcc:abhijeets@talentbeehive.com'." \r\n";
        $header .= 'Bcc:palalok1@gmail.com'." \r\n";

         
         $retval = mail ($to,$subject,$message,$header);
		   if( $retval == true ) {
         
       
		        
		     echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Successfully Shortlisted Profile')
	  window.location.href='candidate-applied.php';
	
	  </SCRIPT>"); 

	

        

         }else {
           
              echo '<script type="text/javascript">
		       alert("Message could not be sent...!!");
		        </script>'; 
         
         }
         
         

	
}
else
{
echo "<script>alert('something went wrong')</script>";
}
}
}
}
}

 ?>





