<?php
//$db=mysqli_connect("localhost","root","","codexworld");
//$db=mysqli_connect("localhost","roottalent","beehive@root","socialuser");
include("config1.php");
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
	
if(isset($_POST['btnSubmit']))
{
	
	$cname=$_POST['cname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	
	$clogo=$_FILES['clogo']['name'];
    $imagename=$_FILES['clogo']['name']."-".date("d-m-Y")."-".time(). GetImageExtension($_FILES["clogo"]["type"]);
    
	$cinfo=$_POST['cinfo'];
	$person=$_POST['person'];
	$cweb=$_POST['cweb'];
	$number=$_POST['mnumber']."-".$_POST['num'];
	
	
	$lnumber=$_POST['code']."-".$_POST['lnum'];
    $type=$_POST['type'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	//date_default_timezone_set("Asia/Kolkata");
	     //$dt=date("d-m-y")."/".date("h:i:sa");
	     date_default_timezone_set("Asia/Kolkata");
	     $dt=date("d-m-y")."/".date("h:i:sa");
	
	/*echo $cname ; 
	echo $email;
	echo   $password;
	echo   $cpassword ;
	echo  $imagename;
	echo   $cinfo$person;
	echo $cweb;
	echo $number;
	echo $lnumber;
	echo  $type;
	echo $cloc;*/
	
	
	
	
	if(move_uploaded_file($_FILES["clogo"]["tmp_name"] , "uploads/".$imagename))
	{
			$q= "insert into users(cname,email,password,cpassword,clogo,cinfo,person,cweb,number,lnumber,type,state,city,date_time) values('$cname','$email','$password','$cpassword','$imagename','$cinfo','$person','$cweb','$number','$lnumber','$type','$state', '$city','$dt')";
			if(mysqli_query($DB,$q))
	                  {
	                   
	                        header("location:company-display.php");
	                        
	                   }
	                   else
	                   {
	                    echo ("<SCRIPT LANGUAGE='JavaScript'>
	                        window.alert('Company Not Inserted')
	                        window.location.href('company-insert.php');
	                        </SCRIPT>");
	                   
	                   }
		
		
		
	
	}	
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	                        window.alert('failed to upload image')
	                        window.location.href('company-insert.php');
	                        </SCRIPT>");
	}
}
?>
