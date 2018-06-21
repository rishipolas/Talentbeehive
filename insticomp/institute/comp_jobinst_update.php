<?php

session_start();

if(! isset($_SESSION['email']))
header('location: company-login.php');
include('../config1.php');

if(isset($_POST['update']))
{
	
	//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";

    $id=$_POST['id'];
	$jtype=$_POST['jtype'];
	
	$qualification=$_POST["qualification"];
$qualification1= implode(',', $qualification);
//echo '<script>alert("'.$qualification1.'")</script>';
$course=$_POST["course"];
$course1= implode(',', $course);
// echo '<script>alert("'.$course1.'")</script>';
$specialization=$_POST["specialization"];
$specialization1= implode(',', $specialization);
	
	$openings=$_POST['openings'];
	$designation=$_POST['designation'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$femail=$_SESSION['email'];
	$requirement=$_POST['requirement'];
	$description=$_POST['description'];
date_default_timezone_set("Asia/Kolkata");
$dt=date("d-m-y")."/".date("h:i:sa");


							
$q="update company_jobinstitute SET jtype='$jtype',qualification='$qualification1', course='$course1', specialization='$specialization1',openings='$openings',state=$state,city=$city,designation='$designation',requirement='$requirement',description='$description',jdate='$dt' where id=".$id;
if(mysqli_query($DB,$q)==1)
{
	//echo $q;
	//echo "sucess";
                        echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('Post Updated Successfully!!')
					     window.location.href='view_company_jobinst.php';
					     </SCRIPT>");
					     
  // header("location:company_profile.php");
	}
	else
	{
		//echo $q;
	//	echo "error";

		echo ("<SCRIPT LANGUAGE='Javascript'>
		    window.alert('Cannot Edit Profile')
		    window.location.href='view_company_jobinst.php';
		    </SCRIPT>");
		
	}
}
?>
