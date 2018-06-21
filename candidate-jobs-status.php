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




$select_status=mysqli_query($DB,"select * from candidate_job_applied where fk_can_id='$id' and  fk_func_id='$fid' ");
if($row=mysqli_fetch_object($select_status))
{
$email=$row->can_email;
$c_status=$row->status;
$can_email=$row->can_email;
if($c_status!='onhold')			
{
$status1='onhold';		
}



$update=mysqli_query($DB,"update candidate_job_applied set status='$status1' where fk_can_id='$id' and fk_func_id='$fid' ");

if($update)
{




	 $to =$email;			
	 //$subject = "".$video_remark;
         $subject = "Application Status";
         
         $message = '<html><head>
                <title>Application Status</title>
                </head>
                <body>';
     
    
          
        $message .= '<h4>Dear Candidate,</h4>';
        $message .= '<p>Your Application Status is Onhold </p>';
        
        
        
        $message .= '<p>Talent Beehive is a platform which gives you an opportunity to upload video resume about your convincing candidature which will help to bridge gaps in between requirements from various industries and jobseekers.<p><a href="http://www.talentbeehive.com/candidate-login.php">CLICK TO LOGIN YOUR ACCOUNT</a>';
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
         
         	/*  echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('Email sent successfully...')	      
	    </SCRIPT>");*/
		      
           // echo "Message sent successfully...";
		  /* echo '<script type="text/javascript">
		       alert("Remark Send!!");
		        </script>';*/
            //  echo "check your email for verification code".'<br>';
            
           // $sql = "insert into random values (NULL,'$email',$a)";
           // mysql_query($sql);

         echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('Status Updated')
	      window.location.href='shared-profile.php';
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
	  window.location.href='shared-profile.php';
	  </SCRIPT>");
}
}
}
}
}
 ?>





