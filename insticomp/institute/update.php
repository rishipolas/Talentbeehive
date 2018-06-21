<?php

 $id=$_GET['id'];
require_once '../config1.php';
if (isset($_POST["btnregister"])) 
{
    
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
    //$qualification1= implode(',', $qualification);
//echo '<script>alert("'.$qualification1.'")</script>';
    
    $course=$_POST["course"];
    //$course1= implode(',', $course);
// echo '<script>alert("'.$course1.'")</script>';
  
    $specialization=$_POST["specialization"];
   // $specialization1= implode(',', $specialization);
    
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
   
$q="update student_registration SET student_name='$cname', institute_id='$iid', gender='$gender',contact_number='$number',email='$email',birth_date='$dob',state='$state',city='$city', ssc='$ssc', hsc='$hsc',qualification='$qualification',course='$course',specialization='$specialization',language='$language',student_profile=$imagename,student_photo=$imagename1,student_video='$vname',date_time='$dt' where id=".$id;
if(mysqli_query($DB,$q)==1)
{
	//echo $q;
	//echo "sucess";
                        echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('Post Updated Successfully!!')
					     window.location.href='student-registration.php';
					     </SCRIPT>");
					     
  // header("location:company_profile.php");
	}
	else
	{
		echo $q;

		echo "error";


		              
		             /*    echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('Cannot Edit Profile')
					    window.location.href='job-post.php';
					     </SCRIPT>");*/
		
	}
			}
			
	
	
?>