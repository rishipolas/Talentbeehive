<?php
require_once "config1.php";
$msg = "";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
$query = "delete from candidate where id=".$id;
if(mysqli_query($DB,$query)) {
header("location:candidate-display.php");
} else {
echo "unable to delete!";
}
?>

