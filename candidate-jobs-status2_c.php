<?php 
session_start();

if(!isset($_SESSION['email']))			
	echo ("<SCRIPT LANGUAGE='JavaScript'>	   
	                        window.location.href('company-login.php');
	                        </SCRIPT>"); 
	//header('location:company-login.php');

include('config1.php');

 if(isset($_GET['status']) )		
{
	
	if(isset($_GET['id']) )		
	{
		if(isset($_GET['fid']) )		
	    {   
	
$c_status=$_GET['status'];
$id=$_GET['id'];
$fid=$_GET['fid'];



$delete=mysqli_query($DB,"delete from candidate_job_applied  where fk_can_id='$id' and fk_func_id='$fid' ");

if($delete)
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('action performed ')
	  window.location.href='candidate-applied.php';
	  </SCRIPT>");
}
else
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Cant Perform ')
	  window.location.href='candidate-applied.php';
	  </SCRIPT>");
}
}
}
}

 ?>





