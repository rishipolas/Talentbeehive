<?php

// configuration file
include("config1.php");
if(isset($_POST['btnSubmit']))
{	

// candidate data

$name = $_POST['name'];
$email = $_POST['email'];
$contact=$_POST['mcontact']."-".$_POST['cnum'];
//$contact = $_POST['contact'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$state=$_POST['state'];
$city=$_POST['city'];
$qualification = $_POST['qualification'];
$course = $_POST['course'];
$specialization = $_POST['specialization'];
$application = $_POST['application'];
$months = $_POST['months'];
$year = $_POST['year'];
$role = $_POST['role'];
$marital = $_POST['marital'];

date_default_timezone_set("Asia/Kolkata");	// insert time and date into 'candidate' table
$dt=date("d-m-y")."/".date("h:i:sa");		// combine date and time


//resume upload
	$res=$_FILES['res']['name']; 
	$exti=(explode('.',$res));
	$ci=count($exti);
 	//echo "<br>ext=".$ext[$c-1];
	$imagename=$exti[0]."_".date("d-m-Y")."_".time(). ".".$exti[$ci-1];	// date and time extension for resume
	
//video upload
	$video=$_FILES['video']['name']; 
	$extv=(explode('.',$video));
	$cv=count($extv);
 	//echo "<br>ext=".$ext[$c-1];
	$vname=$extv[0]."_".date("d-m-Y")."_".time(). ".".$extv[$cv-1];		// date and time extension for resume
	
	if($exti[$ci-1] != "docx" && $exti[$ci-1] != "pdf" && $exti[$ci-1] != "doc")	// check resume format - docx, pdf, doc.
	{
		echo "<script>alert('File not Supported1')</script>";
		
	}
	
	
	// check video format - mp4, mov, 3gp, mpeg.
	
		if($extv[$cv-1] != "mp4" && $extv[$cv-1] != "avi" && $extv[$ci-1] != "mov" && $extv[$ci-1] != "3gp" && $extv[$cv-1] != "mpeg")
		{
			echo "<script>alert('Video not Suppoted13')</script>";
		}
		
		// Upload resume
		
			if(move_uploaded_file($_FILES["res"]["tmp_name"] , "resume/".$imagename))
			{
			
			// Upload video
			
				if(move_uploaded_file($_FILES["video"]["tmp_name"] , "video/".$vname))
				{
					
					
		// Insert all data into candidate table
						
$query = "insert into candidate(name,email,contact,pass,cpass,state,city,qualification,course,specialization,res,video,application,months,year,role,marital,date_time) 
                        values('$name','$email','$contact','$pass','$cpass','$state', '$city','$qualification','$course','$specialization','$imagename','$vname','$application','$months','$year','$role','$marital','$dt')";


mysqli_query($DB,$query);

header("location:candidate-display.php");

				}
				else
				{
				echo "not upload video";
					/*echo ("<SCRIPT LANGUAGE='JavaScript'>
	                        window.alert('Cannot Upload Video')
	                        window.location.href='candidate-insert.php';
	                        </SCRIPT>");*/
				}
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
	                        window.alert('Cannot Upload Profile')
	                        window.location.href='candidate-insert.php';
	                        </SCRIPT>");
			}
		
	}
	
	

?>