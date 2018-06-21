<?php
session_start();
$userid=$_POST['userid'];
$password=$_POST['password'];

include('config1.php');
//$con=mysqli_connect('localhost','root');
//mysqli_select_db($con,'codexworld');
$q="select * from admin where userid='$userid' and password='$password'";
$result=mysqli_query($DB,$q);
$num=mysqli_num_rows($result);


if($num==1)
{
	$_SESSION['userid']=$userid;
	$_SESSION['password']=$password;
	header('location:admin-display.php');
}
else
{
	header('location:login.php');
}
?>