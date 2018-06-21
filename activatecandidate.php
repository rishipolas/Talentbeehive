<?php


require_once './config1.php';

$email=$_GET['email'];		
//fetching candidate record

$query="SELECT * from users where email='$email'";	
$result = mysqli_query($DB, $query);
$res = mysqli_num_rows($result);
//$query=mysqli_query("SELECT * from candidate where email='$email'");

		//updating record
		
		if ($res == 0) {

      if ($row['status'] == "Approved") {		
        echo '<script type="text/javascript">
		alert("Your Account has been already Activated");
		</script>';
      } else {
        $sql = "UPDATE candidate SET  Status = 'Approved'";	
      if (mysqli_query($DB, $sql)) {
    	 echo ("<SCRIPT>
	  window.alert('Your Account has been Activated')	
	   window.location.href='candidate-login.php';
	  </SCRIPT>");
} else {
    echo "Error updating record: " . $DB->error;
}
    //$result = mysqli_query($DB, $sql);
	//$res = mysqli_fetch_row($result);
	   echo '<script type="text/javascript">
		alert("Your Account has been Activated");
		</script>';
			
		
      }
    } else {
      $msg = "No account found";
      $msgType = "warning";
    }




/*


if (isset($_GET["id"]) && !empty( $_GET['id'] )) {
	echo "1";
	$sql = "SELECT * from candidate where id =".$id;
	echo "2";
	try {
//code to be executed
$stmt = $DB->prepare($sql);
echo "3";
    $stmt->bindValue("id", $id);
    $stmt->execute();
	echo "3";
    $result = $stmt->fetchAll();
 //$result = mysqli_query($DB, $sql);
//	$res = mysqli_fetch_row($result);
	if (count($result) > 0) {

      if ($result[0]["Status"] == "Approved") {
        echo '<script type="text/javascript">
		alert("Your Account has been already Activated");
		</script>';
      } else {
        $sql = "UPDATE candidate SET  Status = 'Approved' WHERE id = '$id'";
       $stmt = $DB->prepare($sql);
        $stmt->bindValue("id", $id);
       $stmt->execute();
    //$result = mysqli_query($DB, $sql);
	//$res = mysqli_fetch_row($result);
	   echo '<script type="text/javascript">
		alert("Your Account has been Activated");
		</script>';
			
		header("refresh:0; url=candidate-login.php");
		echo '<script language="javascript">';
        echo 'swal("Your Account Is Now Active..!!", "You clicked the button!", "success");';
        echo '</script>';
      }
    } else {
      $msg = "No account found";
      $msgType = "warning";
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}

*/
?>

/*<div class="container">
  <div class="row">
    <div class="col-lg-9">
      <h1>Thank you for registering with us.</h1>
	  <?php 	
		header("refresh:0; url=candidate-login.php");
		echo '<script language="javascript">';
        echo 'swal("Your Account Is Now Active..!!", "You clicked the button!", "success");';
        echo '</script>'; ?>
    </div>
  </div>
</div>*/

