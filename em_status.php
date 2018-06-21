<?php

require_once "config1.php";
if(isset($_GET['status']) )
{
	if(isset($_GET['id']) )
	{
	
$Status=$_GET['status'];
$id=$_GET['id'];

$select_status=mysqli_query($DB,"select * from users where id='$id' and status='$Status'");
if($row=mysqli_fetch_object($select_status))
{
$Status=$row->status;
if($Status=='Pending')
{
$status2='Approved';
}
else
{
$status2='Pending';
}

$update=mysqli_query($DB,"update users set status='$status2' where id='$id' ");
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