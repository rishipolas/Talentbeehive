<?php
require_once "config1.php";
$msg = "";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
$query = "delete from candidate_job_applied where id=".$id;
if(mysqli_query($DB,$query)) {

echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('deleted')
	  window.location.href='candidate-application-status.php';
	  </SCRIPT>");
//header("location:candidate-application-status.php");
} 
else
 {
echo "Unable To delete!";
      
}
?>
