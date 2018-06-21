<?php

session_start();
if(! isset($_SESSION['email']))
header('location: institute_login.php');
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";                        
	//header('location:candidate-login.php');
	
//$db=mysqli_connect("localhost","root","","codexworld");	
include('config1.php');

if(isset($_POST['update']))
{

  $id=$_POST['id'];	
  
$institutename = $_POST['institutename'];
$website = $_POST['website'];
$email = $_POST['email'];

$state= $_POST['state'];
$city=$_POST['city'];
//$contact=$_POST['contact'];
$cntperson=$_POST['cntperson'];
$contactnumber=$_POST['mnumber']."-".$_POST['num'];
//$contactnumber=$_POST['cntnumber'];
//$location=$_POST['location'];
$landlinenumber=$_POST['landlineNumber'];

$qualification=$_POST["qualification"];
  $qualification1= implode(',', $qualification);
//echo '<script>alert("'.$qualification1.'")</script>';
    
    $course=$_POST["course"];
    $course1= implode(',', $course);
// echo '<script>alert("'.$course1.'")</script>';
  
    /*$specialization=$_POST["specialization"];
    $specialization1= implode(',', $specialization);*/

//$trnprgm=$_POST['trnprgm'];
//$year=$_POST['year'];
//$marital = $_POST['marital'];
//$role = $_POST['role'];

//$file_name=$_FILES['clogo']['name'];
		
		// $file_name=$_FILES["uploadedimage"]["name"];
		date_default_timezone_set("Asia/Kolkata");
    
  $res=$_FILES['clogo']['name']; 
	$exti=(explode('.',$res));
	$ci=count($exti);
 	//echo "<br>ext=".$ext[$c-1];
	$imagename=$exti[0]."_".date("d-m-Y")."_".time(). ".".$exti[$ci-1];	
	
	
	
	
 // $imagename=$_FILES['clogo']['name'];
   // $target_path = "institutelogo/".$imagename;
	

	$video=$_FILES['video']['name']; 
	$extv=(explode('.',$video));
	$cv=count($extv);
 	//echo "<br>ext=".$ext[$c-1];
	$vname=$extv[0]."_".date("d-m-Y")."_".time(). ".".$extv[$cv-1];		

//$db=mysqli_connect('localhost','talentb','talentb@123','socialusert');
//$db=mysqli_connect("localhost","root","","socialuser");
//include('config1.php');
	
	if($video!="")			
	{
	
	
	
	   if($extv[$cv-1] != "mp4" && $extv[$cv-1] != "avi" && $extv[$cv-1] != "mov" && $extv[$cv-1] != "3gp" && $extv[$cv-1] != "mpeg" && $extv[$cv-1] != "ppt" && $extv[$cv-1] != "pdf")
		{
			echo "<script>alert('Video/pdf format not Suppoted')</script>";
		}
		
	
		
		else if(move_uploaded_file($_FILES["video"]["tmp_name"] , "institutevideo/".$vname))
				{
					
		 $query ="update institute_registration SET video='$vname' where id=".$id;
						
						      mysqli_query($DB,$query);
				}	
             else
				{
					echo "<script>alert('Cannot upload video/pdf/ppt')</script>";
				}
        }	
        
        
        
        
        if($res!="")			
	{
	
	
	
	   if($exti[$ci-1] != "jpeg" && $exti[$ci-1] != "jpg" && $exti[$ci-1] != "png")
		{
			echo "<script>alert('image Format  Not Suported')</script>";
		}
		
	
		
		else if(move_uploaded_file($_FILES["clogo"]["tmp_name"] , "institutelogo/".$imagename))
				{
					
		 $query1 ="update institute_registration SET institute_logo='$imagename' where id=".$id;
						
						      mysqli_query($DB,$query1);
				}	
             else
				{
					echo "<script>alert('Cannot upload video/pdf/ppt')</script>";
				}
        }	
        					
	

	
							
 $q="update institute_registration SET institute_name='$institutename', email='$email',website_url='$website', state=$state,
city=$city,contact_person='$cntperson',mobile='$contactnumber',landline='$landlinenumber',qualification='$qualification1',course='$course1' where id=".$id;
 mysqli_query($DB,$q);
						  
			echo ("<SCRIPT LANGUAGE='JavaScript'>	
			        window.alert('Profile updated successfully')   
	         		window.location.href='institute_profile.php';
	                        </SCRIPT>");
	                        		  
                          //header("location: https://www.talentbeehive.com/candidate-fresh_profile.php");

				
				
			
			
	
}
	else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>	
			        window.alert('Profile not  updated ')   
	                       window.location.href='institute_profile_edit.php';
	                        </SCRIPT>");	
			}


?>