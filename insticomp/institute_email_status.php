<?php

require_once "config1.php";
if(isset($_GET['status']) )
{
	if(isset($_GET['id']) )
	{
	
$status=$_GET['status'];
$id=$_GET['id'];

$select_status=mysqli_query($DB,"select * from institute_registration where id='$id' and status='$status'");
if($row=mysqli_fetch_object($select_status))
{
$status=$row->status;
if($status=='Pending')
{
$status2='Approved';
}
else
{
$status2='Pending';
}

$update=mysqli_query($DB,"update institute_registration set status='$status2' where id='$id' ");
if($update)
{
	
	header("Location:../admin_institute_display.php");
}
else
{

echo mysqli_error($DB);
}
}
}
}
?>