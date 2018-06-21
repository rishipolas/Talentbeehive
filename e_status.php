<?php

require_once "config1.php";
if(isset($_GET['status']) )
{
	if(isset($_GET['id']) )
	{
	
$Status=$_GET['status'];
$id=$_GET['id'];

$select_status=mysqli_query($DB,"select * from candidate where id='$id' and Status='$Status'");
if($row=mysqli_fetch_object($select_status))
{
$Status=$row->Status;
if($Status=='Pending')
{
$status2='Approved';
}
else
{
$status2='Pending';
}

$update=mysqli_query($DB,"update candidate set Status='$status2' where id='$id' ");
if($update)
{
	
	header("Location:candidate-display.php");
}
else
{

echo mysqli_error($DB);
}
}
}
}
?>