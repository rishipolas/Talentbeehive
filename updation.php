<?php

session_start();

if(! isset($_SESSION['email']))
header('location: company-login.php');


$db=mysqli_connect("166.62.10.54","roottalent","beehive@root","socialuser");
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




if(isset($_POST['update']))
{
	
	
   $id=$_POST['id'];
	$cname=$_POST['cname'];
	$email=$_SESSION['email'];
	$type=$_POST['type'];
	$clogo=$_FILES['clogo']['name']; 
    $imagename=$_FILES['clogo']['name']."-".date("d-m-Y")."-".time(). GetImageExtension($_FILES["clogo"]["type"]);
    
    $video=$_FILES['video']['name']; 
	$extv=(explode('.',$video));
	$cv=count($extv);
 	//echo "<br>ext=".$ext[$c-1];
	$vname=$extv[0]."_".date("d-m-Y")."_".time(). ".".$extv[$cv-1];
	
	$person=$_POST['person'];
	$number=$_POST['mnumber']."-".$_POST['num'];
	$lnumber=$_POST['code']."-".$_POST['lnum'];
	
	$cinfo=$_POST['cinfo'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	

if($clogo != "")
{
   if(move_uploaded_file($_FILES["clogo"]["tmp_name"] , "uploads/".$imagename))
	{
			 $q ="update users SET clogo='$imagename' where id=".$id;
						
						      mysqli_query($db,$q);
						      echo "<script>alert('Logo Updated Successfully!! ')</script>";
				}	
                       else
				{
					echo "<script>alert('Cannot Update Logo')</script>";
				}
}

if($video!="")			
	{
	
	
	
	   if($extv[$cv-1] != "mp4" && $extv[$cv-1] != "avi" && $extv[$cv-1] != "mov" && $extv[$cv-1] != "3gp" && $extv[$cv-1] != "mpeg" && $extv[$cv-1] != "ppt" && $extv[$cv-1] != "docx" && $extv[$cv-1] != "pdf" && $extv[$cv-1] != "doc")
		{
			echo "<script>alert('Video / PPT format not Suppoted')</script>";
		}
		
	
		
		else if(move_uploaded_file($_FILES["video"]["tmp_name"] , "uploads/".$vname))
				{
					
		 $query ="update users SET video='$vname' where id=".$id;
						
						      mysqli_query($db,$query);
				}	
             else
				{
					echo "<script>alert('Cannot upload video or ppt')</script>";
				}
        }	
							
$q="update users SET cname='$cname', email='$email', type='$type',
cinfo='$cinfo',cweb='$cweb',person='$person',number='$number', lnumber='$lnumber', state='$state', city='$city' where id=".$id;
if(mysqli_query($db,$q)==1)
{
                          echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('Profile Updated Successfully!!')
					     window.location.href='company_profile.php';
					     </SCRIPT>");
  // header("location:company_profile.php");
	}
	else
	{

		                        echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('Cannot Edit Profile')
					     window.location.href='profile_edit.php';
					     </SCRIPT>");
		
	}
}
?>
