<?php
session_start();


if(!isset($_SESSION['email']))
	echo ("<SCRIPT LANGUAGE='JavaScript'>	   
	                        window.location.href('company-login.php');
	                        </SCRIPT>");  
	//header('location:company-login.php');

include('config1.php');

 if(isset($_GET['status']) )
{
	
	if(isset($_GET['id']) )
	{
		if(isset($_GET['fid']) )
	    {   
	
$c_status=$_GET['status'];

$id=$_GET['id'];
$fid=$_GET['fid'];

$select_status=mysqli_query($DB,"select * from candidate_job_applied where fk_can_id='$id' and   fk_func_id='$fid' ");

if($row=mysqli_fetch_object($select_status))
{

echo '<script>alert('.$row->can_name.')</script>';
$ca_status=$row->status;

if($ca_status!='Video')
{
$status1=Video;
}
$update=mysqli_query($DB,"update candidate_job_applied set status='$status1' where fk_can_id='$id' and  fk_func_id='$fid' ");

if($update)
{


      
	$to=$row->can_email;
	 $subject = "Video Profile Requested";
         
         
          $message = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Email Verification</b></title>
                </head>
                <body>';
          
        $message .= '<h4>Dear '.$row->can_name.',</h4>';
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
         
         	  echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('Email sent successfully...')	      
	    </SCRIPT>");
		      
           // echo "Message sent successfully...";
		  /* echo '<script type="text/javascript">
		       alert("Remark Send!!");
		        </script>';*/
            //  echo "check your email for verification code".'<br>';
            
           // $sql = "insert into random values (NULL,'$email',$a)";
           // mysql_query($sql);

         echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('Status Updated')
	      window.location.href='candidate-applied.php';
	    </SCRIPT>");

	   }
	   else
	    {
            echo '<script type="text/javascript">
		       alert("Message could not be sent...!!");
		        </script>';
		        
		     
         }
}
else
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Cant Perform ')
	  window.location.href='candidate-applied.php';
	  </SCRIPT>");

}
}
}
}
}

		?>