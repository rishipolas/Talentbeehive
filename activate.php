    <!--Email activation -->
<?php
 
// Configuration file
require_once './config1.php';

if(isset($_GET['email']))	// get email
{
$email=$_GET['email'];		

//echo $email;
$query="SELECT * from users where email='$email'";	//select all data from 'usres' table
$result = mysqli_query($DB, $query);
$res = mysqli_num_rows($result);
//$row=mysqli_fetch_array($result);
   
if ($res == 0)
{
      if ($row['status'] == "Approved")		// check status is 'Approved'
      {
   	echo ("<SCRIPT>
	  window.alert('Your Account has been already Activated')
	  </SCRIPT>");
      } 
      else 
      {
      	
       
        $sql = "UPDATE users SET  status = 'Approved'";		//update status pending to 'Approved'
      
      	if (mysqli_query($DB, $sql))
      	{
   	   echo ("<SCRIPT>
	   window.alert('Your Account has been Activated')		
	   window.location.href='company-login.php';
	   </SCRIPT>");
	} 
	else
	{
    		echo "Error updating record: " . $DB->error;
	}
    //$result = mysqli_query($DB, $sql);
	//$res = mysqli_fetch_row($result);
	/*echo ("<SCRIPT>
	  window.alert('Your Account has been Activated')
	  </SCRIPT>");*/
	
	  /*echo '<script type="text/javascript">
		alert("Your Account has been Activated");
		</script>';*/
			
		
      }
    } else {
      $msg = "No account found";
      $msgType = "warning";
    }
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



