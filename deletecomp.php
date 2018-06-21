<?php
require_once "config1.php";
$msg = "";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
$query = "delete from users where id=".$id;
if(mysqli_query($DB,$query)) {

header("location:company-display.php");
/*echo ("<SCRIPT LANGUAGE=('JavaScript')
       window.alert('Deleted Company !')
       window.location.href('company-display.php');
       </SCRIPT>)";*/
} else {
echo "unable to delete!";
}
?>
