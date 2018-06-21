<?php


require_once './config.php';	// Configuration file

if (isset($_GET["id"])) {
  $id = intval(base64_decode($_GET["id"]));	
 
  $sql = "SELECT * from users where id = id";	// Select data from 'users' table
  try {
    $stmt = $DB->prepare($sql);
    $stmt->bindValue("id", $id);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (count($result) > 0) {		// Check result

      if ($result[0]["admin_status"] == "approved") {		
        echo '<script type="text/javascript">
		alert("Your Account has been already Activated");
		</script>';
      } else {
      

// Upadte status 0 to 1
      
        $sql = "UPDATE `users` SET  `admin_status` =  'approved' WHERE `id` = '$id'";		 
        $stmt = $DB->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        echo '<script type="text/javascript">
		alert("Your Account has been Activated");		
		</script>';
			
		header("refresh:4; url=jd.php");
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

?>

<div class="container">
  <div class="row">
    <div class="col-lg-9">
      <h1>Thank you for registering with us.</h1>
	  <?php 	
		header("refresh:4; url=company-login.php");
		echo '<script language="javascript">';
        echo 'swal("Your Account Is Now Active..!!", "You clicked the button!", "success");';
        echo '</script>'; ?>
    </div>
  </div>
</div>

