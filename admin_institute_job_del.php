<?php
require_once "config1.php";
$msg = "";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
$query = "delete from company_jobinstitute where id=".$id;
if(mysqli_query($DB,$query)) {
header("location:admin_institute_job_display.php");
} else {
echo "unable to delete!";
}
?>
