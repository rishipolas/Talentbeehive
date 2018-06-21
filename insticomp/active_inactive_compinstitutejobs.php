<?php

require_once "../config1.php";
if(isset($_GET['status']) )
{
	if(isset($_GET['id']) )
	{
	
$Status=$_GET['status'];
$id=$_GET['id'];

$select_status=mysqli_query($DB,"select * from company_jobinstitute where id='$id' and status='$Status'");
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

$update=mysqli_query($DB,"update company_jobinstitute set status='$status2' where id='$id' ");
if($update)
{
	
	header("Location:view_company_jobinst.php");
}
else
{

echo mysqli_error($DB);
}
}
}
}
?>