<?php

require_once './config.php';
//require_once 'activate.php';


function GetImageExtension($imagetype)
{
    if(empty($imagetype)) return false;

    switch($imagetype)
    {
        
        case 'image/jpeg': return '.jpeg';
		case 'image/jpg': return '.jpg';
        case 'image/png': return '.png';
        default: return false;
    }
}

if (isset($_POST["sub"])) 
{
  //require_once "phpmailer/class.phpmailer.php";

		$cname =  $_POST['cname'];
		$email =  $_POST['email'];
		$password =  $_POST['password'];
		$cpassword = $_POST['cpassword']; 
		$person=$_POST['person'];
		$number=$_POST['number'];
		$lnumber=$_POST['code']."-".$_POST['lnum'];
		$cloc=$_POST['cloc'];
		//$clogo = $_FILES['clogo'] ;  
		$file_name=$_FILES['clogo']['name'];
		
		// $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["clogo"]["tmp_name"];
    $imgtype=$_FILES["clogo"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=$_FILES['clogo']['name']."-".date("d-m-Y")."-".time().$ext;
    $target_path = "uploads/".$imagename;
	
	
		$cinfo =  $_POST['cinfo'];
		$cweb =  $_POST['cweb'];
		$type=$_POST['type']; 
	 
/*  $name = trim($_POST["uname"]);
  $pass = trim($_POST["pass1"]);
  $email = trim($_POST["uemail"]);*/
  
  	   
  $sql = "SELECT COUNT(*) AS count from users where email = '$email'";
  try {
    $stmt = $DB->prepare($sql);
    $stmt->bindValue("email",$email);
    $stmt->execute();
    $result = $stmt->fetchAll();

 //$msg= "exist";
    if ($result[0]["count"] > 0) {
		echo '<script type="text/javascript">
		alert("Email exist");
		</script>';
		
	
      $msgType = "warning";
	 
    } else {
		
		if($password == $cpassword)
	  {
		 if( move_uploaded_file($temp_name,$target_path))
		 {
		  
		        $sql = "INSERT INTO users (cname,email,password,cpassword,clogo,cinfo,cweb,type,cloc,person,number,lnumber) VALUES ( '$cname', '$email', '$password', '$cpassword', '$imagename', '$cinfo', '$cweb','$type','$cloc','$person','$number','$lnumber')";
      $stmt = $DB->prepare($sql);
      $stmt->bindValue("cname", $cname);
      $stmt->bindValue("password", md5($password));
	  $stmt->bindValue("cpassword",($cpassword));
      $stmt->bindValue("email", $email);
	   $stmt->bindValue("clogo", $imagename);
	    $stmt->bindValue("cinfo", $cinfo);
		 $stmt->bindValue("cweb", $cweb);
		  $stmt->bindValue("type", $type);
		  $stmt->bindValue("person", $person);
		 $stmt->bindValue("number", $number);
		  $stmt->bindValue("lnumber", $lnumber);
		  
      $stmt->execute();
      $result = $stmt->rowCount();

		 /*  if ($result > 0) {
       
        $lastID = $DB->lastInsertId();

        $message = '<html><head>
                <title>Email Verification</title>
                </head>
                <body>';
        $message .= '<h1>Hi ' . $cname . '!</h1>';
        $message .= '<p><a href="'.SITE_URL.'activate.php?id=' . base64_encode($lastID) . '">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
        $message .= "</body></html>";
        

        // php mailer code starts
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port = 587;                   // set the SMTP port for the GMAIL server

        $mail->Username = 'kasatsurbhi0@gmail.com';
        $mail->Password = 'kasatsurbhi111';

        $mail->SetFrom('kasatsurbhi0@gmail.com', 'ADMIN');
        $mail->AddAddress($email);

        $mail->Subject = trim("Email Verifcation");
        $mail->MsgHTML($message);

        try {
          $mail->send();
          echo '<script type="text/javascript">
		alert("Email has been sent to your Account.After verification please Login");
		</script>';
          }
		  catch (Exception $ex) {
          $msg = $ex->getMessage();
          $msgType = "warning";
        }
      }
	  else 
	  {
        $msg = "Failed to create User";
        $msgType = "warning";
       }*/

	    header("location:company_login.php");
	  }
	 // header("location:company_login.php");
 }
 
 
 
 
	
	else{
	  echo"password is couldnt match please try again...";
      }
     
    }
  
  } catch (Exception $ex)
  {
    echo $ex->getMessage();
  }
}


?>