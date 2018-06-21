<?php

session_start();

if(! isset($_SESSION['email']))
header('location: company-login.php');
include('config1.php');

//$db=mysqli_connect("166.62.10.54","roottalent","beehive@root","socialuser");
//$db=mysqli_connect("localhost","root","","socialuser");
//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
//echo $id;
if(isset($_POST['update']))
{
	
	//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";

    $id=$_POST['id'];
	$name=$_POST['name'];
	//$email=$_SESSION['email'];
	$type=$_POST['type'];
	$title=$_POST['title'];
	$role=$_POST['role'];
	$openings=$_POST['openings'];
	$qualification=$_POST["qualification"];
    $qualification1= implode(',', $qualification);
//echo '<script>alert("'.$qualification1.'")</script>';
    
    $course=$_POST["course"];
    $course1= implode(',', $course);
// echo '<script>alert("'.$course1.'")</script>';
  
    $specialization=$_POST["specialization"];
    $specialization1= implode(',', $specialization);
	$skills=$_POST['skills'];
	$atype=$_POST['atype'];
	$year1=$_POST['year1'];
	$month1=$_POST['month1'];
	$year2=$_POST['year2'];
	$month2=$_POST['month2'];
	$ayear=$year1.".".$month1;
	$byear=$year2.".".$month2;
	$year=$ayear."-".$byear;
	$state=$_POST['state'];
	$city=$_POST['city'];
	$femail=$_SESSION['email'];
	$description=$_POST['description'];
date_default_timezone_set("Asia/Kolkata");
$dt=date("d-m-y")."/".date("h:i:sa");


							
 $q="update functionality SET type='$type', title='$title', name='$name',email='$femail',
role='$role',openings='$openings',qualification='$qualification1', course='$course1', specialization='$specialization1',skills='$skills',atype='$atype',year='$year',state=$state,city=$city,description='$description',date='$dt' where id=".$id;
if(mysqli_query($DB,$q)==1)
{
	//echo $q;
	//echo "sucess";
                        echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('Post Updated Successfully!!')
					     window.location.href='job-post.php';
					     </SCRIPT>");
					     
  // header("location:company_profile.php");
	}
	else
	{
		//echo $q;

		//echo "error";


		              
		                 echo ("<SCRIPT LANGUAGE='Javascript'>
					     window.alert('Cannot Edit Profile')
					    window.location.href='job-post.php';
					     </SCRIPT>");
		
	}
}
?>
