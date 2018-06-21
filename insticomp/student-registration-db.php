<?php

require_once '../config1.php';
if (isset($_POST["btnregister"])) 
{
    require_once "../phpmailer/class.phpmailer.php";
   
    $cname=$_POST['cname'];
    $iid=$_POST['institute_id'];
    $gender=$_POST['gender'];
    $number=$_POST['mnumber']."-".$_POST['num'];
    $email=$_POST['email2'];
   $dob=$_POST['dob'];
   $language=$_POST['language'].",".$_POST['language1'].",".$_POST['language2'];
    // $language=$_POST['language'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    
    $qualification=$_POST["qualification"];
    $qualification1= implode(',', $qualification);
//echo '<script>alert("'.$qualification1.'")</script>';
    
    $course=$_POST["course"];
    $course1= implode(',', $course);
// echo '<script>alert("'.$course1.'")</script>';
  
    $specialization=$_POST["specialization"];
   $specialization1= implode(',', $specialization);
    
     $ssc=$_POST['ssc'];
	$hsc=$_POST['hsc']; 
          
      date_default_timezone_set("Asia/Kolkata");
      $dt=date("d-m-y")."/".date("h:i:sa");
   

    $res=$_FILES['clogo']['name']; 
	$exti=(explode('.',$res));
	$ci=count($exti);
 	//echo "<br>ext=".$ext[$c-1];
	//$imagename=$exti[0]."_".date("d-m-Y")."_".time(). ".".$exti[$ci-1];
	$imagename=$exti[0].$exti[$ci-1];	
    
    
    $res1=$_FILES['photo']['name']; 
	$extp=(explode('.',$res1));
	$cp=count($extp);
 	//echo "<br>ext=".$ext[$c-1];
	//$imagename1=$extp[0]."_".date("d-m-Y")."_".time(). ".".$extp[$cp-1];
	$imagename1=$extp[0].$extp[$cp-1];
    
 	$video=$_FILES['video']['name']; 
	$extv=(explode('.',$video));
	$cv=count($extv);
 	//echo "<br>ext=".$ext[$c-1];
	//$vname=$extv[0]."_".date("d-m-Y")."_".time(). ".".$extv[$cv-1];	
	$vname=$extv[0].".".$extv[$cv-1];	
	
	if($extv[$cv-1] != "mp4" && $extv[$cv-1] != "avi" && $extv[$cv-1] != "mov" && $extv[$cv-1] != "3gp" && $extv[$cv-1] != "mpeg")
        {
            echo "<script>alert('Video / PPT format not uploaded')</script>";
        }
        
        if($extp[$cp-1] != "jpg" && $extp[$cp-1] != "png" && $extp[$cp-1] != "jpeg")
        {
            echo "<script>alert('photo format not uploaded')</script>";
        }
        
		if($exti[$ci-1] != "pdf" && $exti[$ci-1] != "doc" && $exti[$ci-1] != "docx")
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>	
			        window.alert(' Format  Not Suported ')   </SCRIPT>");	
		
	}
    
     $sq = "SELECT email from institute_csv where email = '".$email."'";
	$resultsq = mysqli_query($DB, $sq);
	$ressq = mysqli_num_rows($resultsq);
	
	if ($ressq == 0)
	{
	
	echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('You cannot register here...')
					     window.location.href='student-registration.php';
					     </SCRIPT>");			
		
				     
	}
	else
	{
		/*echo '<script type="text/javascript">
		alert("You register here...");
		</script>';*/
	
       

	
$sql = "SELECT * from student_registration where email = '".$email."'";

try {
//code to be executed







	$result = mysqli_query($DB, $sql);
	$res = mysqli_num_rows($result);
	
	if ($res == 1) {
		echo '<script type="text/javascript">
		alert("Email exist");
		</script>';
		
	
      $msgType = "warning";
	}
	
	else
      {
          
       		  if($video!="")			
		{
	
		 if($extv[$cv-1] != "mp4" && $extv[$cv-1] != "avi" && $extv[$cv-1] != "mov" && $extv[$cv-1] != "3gp" && $extv[$cv-1] != "mpeg" && $extv[$cv-1] != "ppt" )
        	{
           		 echo "<script>alert('Video / PPT format not Suppoted')</script>";
       		 }
			
		}
				
		
		}
        
		if($exti[$ci-1] != "pdf" && $exti[$ci-1] != "doc" && $exti[$ci-1] != "docx")
	   {
		echo ("<SCRIPT LANGUAGE='JavaScript'>	
			        window.alert('document Format  Not Suported ')   </SCRIPT>");	
		
	   }
	
	  
            
               
					
					/*if((move_uploaded_file($_FILES["clogo"]["tmp_name"] , "student_resume/".$imagename)) AND (move_uploaded_file($_FILES["video"]["tmp_name"] , "student_resume/".$vname)) AND (move_uploaded_file($_FILES["photo"]["tmp_name"] , "student_resume/".$imagename1)))*/
					
			/*	if( ((move_uploaded_file($_FILES["clogo"]["tmp_name"] , "student_resume/".$imagename)) AND (move_uploaded_file($_FILES["video"]["tmp_name"] , "student_resume/".$vname)) AND (move_uploaded_file($_FILES["photo"]["tmp_name"] , "student_resume/".$imagename1))) OR
				((move_uploaded_file($_FILES["clogo"]["tmp_name"] , "student_resume/".$imagename)) AND (move_uploaded_file($_FILES["video"]["tmp_name"] , "student_resume/".$vname)) ) OR
				 ((move_uploaded_file($_FILES["clogo"]["tmp_name"] , "student_resume/".$imagename)) AND (move_uploaded_file($_FILES["photo"]["tmp_name"] , "student_resume/".$imagename1)))				
				
				)	*/
				
				if(move_uploaded_file($_FILES["clogo"]["tmp_name"] , "student_resume/".$imagename))
			     	 {
				
					if(move_uploaded_file($_FILES["video"]["tmp_name"] , "student_resume/".$vname))
					{
						 echo "<script>alert('Done')</script>";
					}
						
										
					
						if(move_uploaded_file($_FILES["photo"]["tmp_name"] , "student_resume/".$imagename1))
						{
							 echo "<script>alert('Done')</script>";
						}
							
						
				
			 $insert   = "INSERT into student_registration(institute_id,student_name,gender,email,contact_number,birth_date,state,city,ssc,hsc,qualification,course,specialization,language,student_profile,student_photo,student_video,date_time) VALUES('$iid','$cname','$gender','$email',' $number','$dob',$state,$city,'$ssc','$hsc','$qualification1','$course1','$specialization1','$language','$imagename','$imagename1','$vname','$dt')";
				
				$getstate=mysqli_query($DB,"select statename from state where id=".$state);
              $getstatedetails = mysqli_fetch_array($getstate);
              $stat=$getstatedetails['statename'];
              
              
              $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$city);
              $getcitydetails = mysqli_fetch_array($getcity);
              $cit=$getcitydetails['cityname'];
              
	              $str2 = $qualification1;	
		    $strs2=explode(",",$str2);
		     $st="";
			  foreach($strs2 as $q2){
			
			 $q1="select qualification from qualification where id='$q2'";
			  $result1=mysqli_query($DB,$q1);
			  $row1=mysqli_fetch_array($result1);
			  $c=$row1['qualification'];
			   $st=$st.$c.", ";
			  }
			 
		//echo $st;              
              
           
              
			 $str3 = $course1;	
			$strs3=explode(",",$str3);
			 $st1="";
			  foreach($strs3 as $q3){
			
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
			
		//echo $str;
						
             
				
				 if ($DB->query($insert) === TRUE) {
            
				
				      $to = $email;
				      
         $subject = "Verification of your details";
         
          $message = '<!DOCTYPE html>
<html><head>
 <title>Email Verification</title>
</head>
<body>
<div style="margin:40px;"><br><br>
';
        $message .= '<b>Dear ' . $cname . ',</b><br>';
        $message .='<p>Welcome to TalentBeehive.com, We focus on making your shortlisting<br> 
easier by introducing our new feature of video profile accompanied with<br> shared resumes, also visit <a href="http://www.talentbeehive.com/institute/">www.talentbeehive.com</a> for fruitful results.</br>
For any updates contact your college.
<br><br>

<table border="2" width="auto">
                <tr><th>student Name Name</th><td>'.$cname.'</td></tr>
                <tr><th>Gender</th>  <td>'. $gender.'</td></tr>
                <tr><th>Email</th>  <td>'. $email.'</td></tr>
                <tr><th>Mobile Number</th>  <td>'. $number.'</td></tr>
                  <tr><th>Birth Date</th>  <td>'. $dob.'</td></tr>
                  <tr><th>Location</th>  <td>'. $cit.' - '. $stat.'</td></tr>
                   <tr><th>SSC</th>  <td>'. $ssc.'</td></tr>
                  <tr><th>HSC</th>  <td>'. $hsc.'</td></tr>
                  <tr><th>Qualification</th>  <td>'.  $st.'</td></tr>
                  <tr><th>Course</th>  <td>'. $st1.'</td></tr>
                  <tr><th>Specialization</th>  <td>'. $str.'</td></tr>
                   <tr><th>Languages</th>  <td>'. $language.'</td></tr>
                   <tr><th>Date of Registration</th>  <td>'. $dt.'</td></tr>
                  
</table>
 
</div><br><br>

<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;">If any queries regarding updation of form please do contact to your TPO. </div>

<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;">Connect to us for all your enquiries</div>
<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;"><b></b>Email Address: <a href="#">support@talentbeehive.com</a></div>
<div style="border:1px black;padding:10px;width:250px;height:10px;background-color:#EBEDEF;"><b></b>Contact Number: +91-8623804382</div><br><br>



<div style="padding:20px;font-size:12px;width:500px;height:500px;">
This is to acknowledge that you have registered as a candidate with Talent Beehive, have agreed to abide to the terms of use and our privacy commitment.</div>

';
       $message .= "</body></html>";
        
         
      
         
          $header .= "MIME-Version: 1.0"."\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $header .= 'From:TALENT BEEHIVE <admin@talentbeehive.com>'."\r\n";
        $header .= 'Cc:info@talentbeehive.com'." \r\n";
        $header .= 'Bcc:sushantk6158@gmail.com'." \r\n";
        $header .= 'Bcc:palalok1@gmail.com'." \r\n";
        $header .= 'Bcc:abhijeets@talentbeehive.com'." \r\n";
       

         
         $retval = mail ($to,$subject,$message,$header);
         
         

         if( $retval == true ) {
         
		
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				      
	         		window.location.href='preview.php?cname=".$cname."&&email=".$email."&&qua=".$qualification."';
	     </SCRIPT>");
		
		
		
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
     document.location.href='index.php'
});
});

</script>";
		
           
         

        

         }else {
			
          			
          			echo "
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
	 swal(Oops,'Message could not be sent...!!', 'error') 

</script>";

           }
           
	   }
	 else 
	  {
        $msg = "Failed to create User";
        $msgType = "warning";
          }

		/*else  {
			/* echo '<script type="text/javascript">
		       alert("password is couldnt match please try again...!!");
		        </script>';
		        
		        
	 echo "
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
	 swal(Oops,'password couldnt match please try again...!!', 'error') 

</script>";
          } */
	
	 
	  }
	  
	  
	  
	  
	  
	  } catch (Exception $ex)
      {
    echo $ex->getMessage();
      }
          
	
	}

			}
			
	
	/*echo ("<SCRIPT LANGUAGE='JavaScript'>
				      
	         		window.location.href='preview.php?cname=".$cname."&&email=".$email."&&qua=".$qualification."';
	     </SCRIPT>");	*/	
	
?>