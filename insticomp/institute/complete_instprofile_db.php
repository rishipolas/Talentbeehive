<?php
session_start();
if(!isset($_SESSION['email']))		
echo ("<SCRIPT LANGUAGE='JavaScript'>	   
	                        window.location.href='institute_login.php';
	                        </SCRIPT>");
	//header('location:candidate-login.php');
	
//$db=mysqli_connect("localhost","root","","codexworld");	

if(isset($_POST['btnsave']))
{



  $id=$_POST['id'];
         //$name=$_POST['name'];
         $cpname=$_POST['cpname'];
         
         $email=$_SESSION['email'];
         $website=$_POST['cweb'];
         
         $qualification=$_POST['qualification'];
         $qualification1= implode(',',$qualification);
         $course=$_POST['course'];
         $course1 = implode(',',$course);
         
         $state=$_POST['state'];
         $city=$_POST['city'];
         
         $number=$_POST['mnumber']."-".$_POST['num'];
         $lnumber=$_POST['code']."-".$_POST['lnum'];
         $password=$_POST['password'];
         $cpassword=$_POST['cpassword'];
         
        //   date_default_timezone_set("Asia/Kolkata");
         //  $dt=date("d-m-y")."/".date("h:i:sa");
         
      $res=$_FILES['clogo']['name']; 
	$exti=(explode('.',$res));
	$ci=count($exti);
 	//echo "<br>ext=".$ext[$c-1];
	$imagename=$exti[0]."_".date("d-m-Y")."_".time(). ".".$exti[$ci-1];	
	

	$video=$_FILES['video']['name']; 
	$extv=(explode('.',$video));
	$cv=count($extv);
 	//echo "<br>ext=".$ext[$c-1];
	$vname=$extv[0]."_".date("d-m-Y")."_".time(). ".".$extv[$cv-1];		

include("../config1.php");

//$db=mysqli_connect("166.62.10.54","roottalent","beehive@root","socialuser");
//$db=mysqli_connect("localhost","root","","socialuser");
	

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
	
	
		
                   $query= "update institute_registration SET contact_person='$cpname', website_url='$website',qualification='$qualification1',course='$course1',state=$state,
         city=$city,mobile='$number', landline='$lnumber' where id=".$id;

                          mysqli_query($DB,$query);
						  
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
	                        window.location.href='complete_instprofile.php';
	                        </SCRIPT>");	
			}  
	

	

?>








