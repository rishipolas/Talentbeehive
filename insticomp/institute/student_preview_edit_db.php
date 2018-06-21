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
    
    $qualification = $_POST['qualification'];
$course = $_POST['course'];
$specialization = $_POST['specialization'];
    
    /*$qualification=$_POST["qualification"];
    $qualification1= implode(',', $qualification);
//echo '<script>alert("'.$qualification1.'")</script>';
    
    $course=$_POST["course"];
    $course1= implode(',', $course);
// echo '<script>alert("'.$course1.'")</script>';
  
    $specialization=$_POST["specialization"];
    $specialization1= implode(',', $specialization);*/
    
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
        
        
  
							
 $q2="update student_registration SET student_name='$cname',institute_id='$institute_id',gender='$gender',contact_number='$number',birth_date='$dob',email='$email',state='$state', city='$city',qualification='$qualification',course='$course',specialization='$specialization',ssc='$ssc',hsc='$hsc',language='$language' where id=".$id;
if(mysqli_query($DB,$q2)==1)
{
                          echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('Profile Updated Successfully!!')
					     window.location.href='index.php';
					     </SCRIPT>");
  // header("location:company_profile.php");
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
