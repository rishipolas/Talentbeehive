<?php

require_once "config1.php";
if(isset($_GET['status']) )
{
	if(isset($_GET['id']) )
	{
	
$Status=$_GET['status'];
$id=$_GET['id'];

$select_status=mysqli_query($DB,"select * from functionality where id='$id' and status='$Status'");
if($row=mysqli_fetch_object($select_status))
{
$Status=$row->status;
if($Status=='active')
{
$status2='inactive';
}
else
{
$status2='active';
}

$update=mysqli_query($DB,"update functionality set status='$status2' where id='$id' ");
if($update)
{
	
	header("Location:job-post.php");
}
else
{

echo mysqli_error($DB);
}
}
}
}
?>