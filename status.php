<?php

session_start();

if(!isset($_SESSION['email']))
	header('location:company-login.php');
	
require_once "config1.php";
if(isset($_GET['status']) )
{
	if(isset($_GET['id']) )
	{
	
$jd_status=$_GET['status'];
$id=$_GET['id'];

$select_status=mysqli_query($DB,"select * from users where id='$id' and jd_status='$jd_status'");
if($row=mysqli_fetch_object($select_status))
{
$jd_status=$row->jd_status;
if($jd_status=='0')
{
$status2=1;
}
else
{
$status2=0;
}

$update=mysqli_query($DB,"update users set jd_status='$status2' where id='$id' ");
if($update)
{
	
	header("Location:company-display.php");
}
else
{
echo mysqli_error($DB);
}
}
}
}
?>