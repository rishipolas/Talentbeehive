<?php

include_once("config1.php");

$q1="select status from invitation_to_company";

$row = mysqli_fetch_array($q1);

if(isset($_GET['status']) )
{
	if(isset($_GET['id']) )
	{
	  if(isset($_GET['cid']) )
	{
$status=$_GET['status'];
$institute_id=$_GET['id'];
$company_id=$_GET['cid'];

$select_status = mysqli_query($DB,"select * from invitation_to_company where and institute_id='$institute_id' and status='$status'");

if($row2=mysqli_fetch_object($select_status ))
{ 
	$status=$row2->status;
if($status=='0')
{
$status2='1';
}


$update=mysqli_query($DB,"update invitation_to_company set status='$status2' where and institute_id='$institute_id' and company_id='$company_id' and status='$status' ");
if($update)
{
	
	echo "updated";
}
else
{

echo mysqli_error($DB);
}
}
}
}
}
?>