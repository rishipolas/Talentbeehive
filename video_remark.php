<?php

                                  
                                 require_once "config1.php";
                                 require_once "phpmailer/class.phpmailer.php";
                                 
                                 
                                  if(isset($_POST['btnSubmit'])) 
                                  {
				     $id =$_REQUEST['id'];
                                     $video_remark = $_REQUEST['video_remark'];
                                     $name =$_REQUEST['name'];

									
									 
                                      $q= "update candidate set video_remark='$video_remark'  where id=".$id;
                                      
                                   $s=mysqli_query($DB,$q);
								  
	 if($s==1)
	{
								  
	 $to = $_POST['email'];
	 
         //$subject = "Your Video Format is wrong";
         
          $message = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Email Verification</b></title>
                </head>
                <body>';
        $message .= '<h4>Dear '. $name .',</h4>';
        $subject = "Your Video Format is wrong";
       .$video_remark
        $message .= '<p>We have rejected your video resume which you have uploaded<br>
We have not activated your video resume for the following reason.<br>
<b>' .$video_remark. '</b>
<br><br>
<div style="border:2px solid black;padding:10px;width:400px;height:150px;padding:20px;margin-left:30px;">
<div style="font-size:25px;color:red;"><marquee>Update Resume</marquee></div><a href="candidate_login.php">Click here</a> &nbsp;to upate your Video Profile on <a href="#">talentbeehives.com</a> and start getting notified for suitable jobs.<br><br>
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
           // echo "Message sent successfully...";
		  /* echo '<script type="text/javascript">
		       alert("Remark Send!!");
		        </script>';*/
            //  echo "check your email for verification code".'<br>';
            
           // $sql = "insert into random values (NULL,'$email',$a)";
           // mysql_query($sql);

         echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('Remark Send')
	      window.location.href='candidate-display.php';
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
								         window.alert('Message could not be sent...!!')
										 window.location.href='candidate-display.php';
										 </SCRIPT>");
								   }
								   
								   
								   
								   
				  
	 
							// echo"hie";
			
}
								  
								   
                                  

                            ?>