<?php 
session_start();

if(!isset($_SESSION['email']))
	header('location:company-login.php');

include('config1.php');

 if(isset($_GET['status']) )
{
	
	if(isset($_GET['id']) )
	{
		
	
$c_status=$_GET['status'];
$id=$_GET['id'];



$delete=mysqli_query($DB,"delete from walkindata  where id=".$id);

if($delete)
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Deleted ')
	  window.location.href='walkinpost_view.php';
	  </SCRIPT>");
}
else
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Cant Delete')
	  window.location.href='walkinpost_view.php.php';
	  </SCRIPT>");
}
}
}


 ?>




