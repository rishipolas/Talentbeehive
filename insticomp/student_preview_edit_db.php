<?php

//session_start();

//if(! isset($_SESSION['email']))
//header('location: institute_login.php');
 include('../config1.php');
$id=$_GET['id'];


//$ids12=$_GET['idds'];

//$DB=mysqli_connect("166.62.10.54","roottalent","beehive@root","socialuser");
//$db=mysqli_connect("localhost","root","","socialuser");
function GetImageExtension($imagetype)
{
    if(empty($imagetype)) return false;

    switch($imagetype)
    {
        
        case 'image/jpeg': return '.jpeg';
        case 'image/jpg': return '.jpg';
        case 'image/png': return '.png';
        default: return false;
     }
}




if(isset($_POST['btnregister']))
{
	
	//$id=$_POST['id'];
  $cname=$_POST['cname'];
  $institute_id=$_POST['institute_id'];
    
    
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
          
     // date_default_timezone_set("Asia/Kolkata");
     // $dt=date("d-m-y")."/".date("h:i:sa");
   

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

if($res != "")
{
   if(move_uploaded_file($_FILES["clogo"]["tmp_name"] , "student_resume/".$imagename))
	{
			 $q ="update student_registration SET student_profile='$imagename' where id=".$id;
						
						      mysqli_query($DB,$q);
						      echo "<script>alert('Resume Updated Successfully!! ')</script>";
				}	
                       else
				{
					echo "<script>alert('Cannot Update Resume')</script>";
				}
}

if($video!="")			
	{
	
	
	
	   if($extv[$cv-1] != "mp4" && $extv[$cv-1] != "avi" && $extv[$cv-1] != "mov" && $extv[$cv-1] != "3gp" && $extv[$cv-1] != "mpeg" && $extv[$cv-1] != "ppt" && $extv[$cv-1] != "docx" && $extv[$cv-1] != "pdf" && $extv[$cv-1] != "doc")
		{
			echo "<script>alert('Video / PPT format not Suppoted')</script>";
		}
		
	
		
		else if(move_uploaded_file($_FILES["video"]["tmp_name"] , "student_resume/".$vname))
				{
					
		 $query ="update student_registration SET student_video='$vname' where id=".$id;
						
						      mysqli_query($DB,$query);
				}	
             else
				{
					echo "<script>alert('Cannot upload video or ppt')</script>";
				}
        }	
        
        if($res1!="")			
	{
	
	
	if($extp[$cp-1] != "jpeg" && $extp[$cp-1] != "jpg" && $extp[$cp-1] != "png")
		{
			echo "<script>alert('Image format not Suppoted')</script>";
		}
		
	
		
		else if(move_uploaded_file($_FILES["photo"]["tmp_name"] , "student_resume/".$imagename1))
				{
					
		 $query1 ="update student_registration SET student_photo='$imagename1' where id=".$id;
						
						      mysqli_query($DB,$query1);
				}	
             else
				{
					echo "<script>alert('Cannot upload video or ppt')</script>";
				}
        }	
        
        
  
							
 $q2="update student_registration SET student_name='$cname',institute_id='$institute_id',gender='$gender',contact_number='$number',birth_date='$dob',email='$email',state='$state', city='$city',qualification='$qualification1',course='$course1',specialization='$specialization1',ssc='$ssc',hsc='$hsc',language='$language' where id=".$id;
if(mysqli_query($DB,$q2)==1)
{
                          echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('Profile Updated Successfully!!')
					     window.location.href='index.php';
					     </SCRIPT>");
					     
					     
					     
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
			  $rowr=mysqli_fetch_array($result1);
			  $c=$rowr['qualification'];
			   $st=$st.$c.", ";
			  }
			   $str3 = $course1;	
			$strs3=explode(",",$str3);
			 $st1="";
			  foreach($strs3 as $q3){
			
			 $q1="select course from course where c_id='$q3'";
			  $result1=mysqli_query($DB,$q1);
			  $rowr=mysqli_fetch_array($result1);
			  $c=$rowr['course'];
			   $st1=$st1.$c.", ";
			  }
			 
			//echo $st1;
              
              
           	 $str1 = $specialization1;	
		    $strs=explode(",",$str1);
		     $str="";
			  foreach($strs as $b){
			
			 $q1="select specialization from specialization where s_id='$b'";
			  $result1=mysqli_query($DB,$q1);
			  $rowr=mysqli_fetch_array($result1);
			  $c=$rowr['specialization'];
			   $str=$str.$c.", ";
			  }
			
				
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
				      
	         		window.location.href='edit.php?cname=".$cname."&&email=".$email."&&qua=".$qualification."';
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

		                        echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('Cannot Edit Profile')
					    window.location.href='edit.php';
					     </SCRIPT>");
		
	}
	}
  
?>
