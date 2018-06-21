<?php
session_start();
if(!isset($_SESSION['email']))		
echo ("<SCRIPT LANGUAGE='JavaScript'>	   
	                        window.location.href='candidate-login.php';
	                        </SCRIPT>");
	//header('location:candidate-login.php');
	
//$db=mysqli_connect("localhost","root","","codexworld");	

if(isset($_POST['update']))
{



  $id=$_POST['id'];	
  
$qualification = $_POST['qualification'];
$course = $_POST['course'];
$specialization = $_POST['specialization'];

$application= $_POST['application'];
$months=$_POST['months'];
//$contact=$_POST['contact'];
$contact=$_POST['mcontact']."-".$_POST['cnum'];
$state=$_POST['state'];
$city=$_POST['city'];
$year=$_POST['year'];
$marital = $_POST['marital'];
$role = $_POST['role'];


	$res=$_FILES['res']['name']; 
	$exti=(explode('.',$res));
	$ci=count($exti);
 	//echo "<br>ext=".$ext[$c-1];
	$imagename=$exti[0]."_".date("d-m-Y")."_".time(). ".".$exti[$ci-1];	
	

	$video=$_FILES['video']['name']; 
	$extv=(explode('.',$video));
	$cv=count($extv);
 	//echo "<br>ext=".$ext[$c-1];
	$vname=$extv[0]."_".date("d-m-Y")."_".time(). ".".$extv[$cv-1];		

$db=mysqli_connect("166.62.10.54","roottalent","beehive@root","socialuser");
//$db=mysqli_connect("localhost","root","","socialuser");
	
	if($video!="")			
	{
	
	
	
	   if($extv[$cv-1] != "mp4" && $extv[$cv-1] != "avi" && $extv[$ci-1] != "mov" && $extv[$ci-1] != "3gp" && $extv[$cv-1] != "mpeg")
		{
			echo "<script>alert('Video format not Suppoted')</script>";
		}
		
	
		
		else if(move_uploaded_file($_FILES["video"]["tmp_name"] , "video/".$vname))
				{
					
		 $query ="update candidate SET video='$vname' where id=".$id;
						
						      mysqli_query($db,$query);
				}	
             else
				{
					echo "<script>alert('Cannot upload video')</script>";
				}
        }				
	
	
							  
	if($exti[$ci-1] != "docx" && $exti[$ci-1] != "pdf" && $exti[$ci-1] != "doc")
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>	
			        window.alert('Resume Format  Not Suported ')   
	                        window.location.href='candidate-complete-profile.php';
	                        </SCRIPT>");	
		
	}
	
	
	
	
	else if(move_uploaded_file($_FILES["res"]["tmp_name"] , "resume/".$imagename))
			{

		
                       $query = "update candidate SET state='$state', city='$city',contact='$contact',res='$imagename',qualification='$qualification',
                       course='$course',specialization='$specialization', application='$application',months='$months',year='$year',marital='$marital',role='$role' where id=".$id;

                          mysqli_query($db,$query);
						  
			echo ("<SCRIPT LANGUAGE='JavaScript'>	
			        window.alert('Profile updated successfully')   
	         		window.location.href='candidate-fresh_profile.php';
	                        </SCRIPT>");
	                        		  
                          //header("location: https://www.talentbeehive.com/candidate-fresh_profile.php");

				}
				
			
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>	
			        window.alert('Profile not  updated ')   
	                        window.location.href='candidate-complete-profile.php';
	                        </SCRIPT>");	
			}
	
}
	

?>