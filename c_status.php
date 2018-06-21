<?php

require_once "config1.php";
if(isset($_GET['status']) )	
{
	if(isset($_GET['id']) )
	{
	
$video_status=$_GET['status'];	
$id=$_GET['id'];		



$select_status=mysqli_query($DB,"select * from candidate where id='$id' and video_status='$video_status'");
if($row=mysqli_fetch_object($select_status))
{
$video_status=$row->video_status;	
if($video_status=='0')		
{
$status2=1;		
}
else
{
$status2=0;
}

$update=mysqli_query($DB,"update candidate set video_status='$status2' where id='$id' ");	
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