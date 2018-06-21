<?php

require_once 'config1.php';



if (isset($_POST["btnregister"])) 
{


    require_once "../phpmailer/class.phpmailer.php";
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    
    
    date_default_timezone_set("Asia/Kolkata");
    $dt=date("d-m-y")."/".date("h:i:sa");
   
   
	$sql = "SELECT * from institute_registration where email = '".$email."'";

    try {
//code to be executed

	$result = mysqli_query($DB, $sql);
	$res = mysqli_num_rows($result);
	
	    if ($res == 1)
	    {
		echo '<script type="text/javascript">
		alert("Email already exist");
		</script>';
		
	
      		$msgType = "warning";
	    }
	
	   else
      	   {

    	   if($password == $cpassword)
	     {
                
              
		//$insert   = "INSERT into institute_registration (institute_name,contact_person,email,website_url,qualifications,courses,state,city,mobile,landline,password,confirm_password,video,institute_logo,date_time) VALUES('$name','','$email','','','','','','','','$password','$cpassword','','','$dt')";
		
		$insert   = "INSERT into institute_registration (institute_name,email,password,confirm_password,date_time) VALUES('$name','$email','$password','$cpassword','$dt')";
		
		
		
		if ($DB->query($insert) === TRUE) 
		{
		$getsearch = mysqli_query($DB,"SELECT * from institute_registration where email='".$email."'") or die(mysqli_error($DB)); 
		$getsearchdetails = mysqli_fetch_array($getsearch);
		$result=$getsearchdetails['id'];
   		mkdir("./excel/".$result."",0777);
   		mkdir("./excel/".$result."/filter",0777);
		mkdir("./excel/".$result."/shortlist",0777);
		

            		$to = $email;
			$subject = "Institute Email Verification";
        		$message = '<!DOCTYPE html>
<html><head>
 <title>Institute Email Verification</title>
</head>
<body>
<div style="margin:40px;"><b></b><br><br>
';
        $message .= '<b>Dear ' . $name . ',</b><br>';
        $message .='<p>Welcome to TalentBeehive.com, We focus on making your shortlisting<br> 
easier by introducing our new feature of video profile accompanied with<br> shared resumes, also visit <a href="www.talentbeehive.com">www.talentbeehive.com</a> for fruitful results.
<br><br>
<div style="border:2px solid black;padding:10px;width:400px;height:150px;padding:20px;margin-left:30px;">
<div style="font-size:25px;color:red;"><marquee>Registration Link</marquee></div><a href="https://www.talentbeehive.com/insticomp/institute_activate.php">Click here</a> &nbsp;to complete your registration process on <a href="#">talentbeehive.com</a> and start posting your jobs.<br><br>
Best Regards,<br>
Team Talent Beehive<br><br>
Have a question? E-mail at <a href="#">info@talentbeehive.com</a><br></div><br><br>


<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;">Connect to us for all your enquiries</div>
<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;"><b></b>Email Address: <a href="#">support@talentbeehive.com</a></div>
<div style="border:1px black;padding:10px;width:250px;height:10px;background-color:#EBEDEF;"><b></b>Contact Number: +91-8623804382</div><br><br>



<div style="padding:20px;font-size:12px;width:500px;height:500px;">
This is to acknowledge that you have registered as a institute with Talent Beehive, have agreed to abide to the terms of use and our privacy commitment.</div>

</div>';
       $message .= "</body></html>";
        
         
      
         
          $header .= "MIME-Version: 1.0"."\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $header .= 'From:TALENT BEEHIVE <admin@talentbeehive.com>'."\r\n";
        $header .= 'Cc:info@talentbeehive.com'." \r\n";
        $header .= 'Bcc:sushantk6158@gmail.com'." \r\n";
        $header .= 'Bcc:kanchanshinde5495@gmail.com'." \r\n";
        $header .= 'Bcc:abhijeets@talentbeehive.com'." \r\n";
       

         
         $retval = mail ($to,$subject,$message,$header);
         
         

         if( $retval == true ) {
         
		
echo "
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Check your email for verification!! Also check your SPAM',
       text: 'Account Created Successfully!!',
       type: 'success',
}, function(isConfirm) {
     document.location.href='institute_login.php'
});
});

</script>";
		
           
         

        

         }else {
			/*  echo '<script type="text/javascript">
		       alert("Message could not be sent...!!");
		        </script>';*/
          			
          			echo "
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
	 swal(Oops,'Message could not be sent...!!', 'error') 

</script>";

           }
           
	   }// if insert true
	  else 
	  {
        $msg = "Failed to create User";
        $msgType = "warning";
          }
         }// if password==cpswd
	else{
			/* echo '<script type="text/javascript">
		       alert("password is couldnt match please try again...!!");
		        </script>'; */
		        
		        
	 echo "
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
	 swal(Oops,'password couldnt match please try again...!!', 'error') 

</script>";
          }
	
	}
	
      } 
      catch (Exception $ex)
      {
    		echo $ex->getMessage();
      }
          
	
}//if isset
			
	
?>