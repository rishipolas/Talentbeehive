<?php

session_start();

include '../config1.php';
if(isset($_POST["Import"])){

             
             
		$id=$_SESSION['id'];
		$email=$_SESSION['email'];
		$name=$_SESSION['name'];
		
		
		
       //$create = "insert into institute_csv  (institute_id,email) values('{$_SESSION['id']}','$email')";
                   
    
                   
           // $results = mysqli_query($DB,$create) or die (mysql_error());
         $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
if(in_array($_FILES['file']['type'],$mimes))
{
   $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
			
                

	         while (($emapData = fgetcsv($file, 100000, ",")) !== FALSE)
	         {
	  //  $sql = "INSERT into institute_csv (institute_id,email) 
	            	//values(''{$_SESSION['id']}'','$emapData[0]')";
	          //It wiil insert a row to our subject table from our csv file`
	          
	          
	           $sql = "INSERT into institute_csv (institute_id,email,student_name) 
	            	values('{$_SESSION['id']}','$emapData[0]','$emapData[1]')";
			$result = mysqli_query($DB, $sql);
		

               $sql1 = "SELECT * from institute_csv";
           
               

	             $result1 = mysqli_query($DB, $sql1);
	             
	             $to=$email;

	             require_once "../phpmailer/class.phpmailer.php";
  //require '../phpmailer/PHPMailerAutoload.php';


	             $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
 

    //Recipients
    $mail->setFrom('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addAddress('donotreply@talentbeehive.com', 'user');     // Add a recipient
    $mail->addReplyTo('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addCC('info@talentbeehive.com');
    $mail->addBCC('abhijeets@talentbeehive.com');
    $mail->addBCC('sushantk6158@gmail.com');
    
   
    while ($row = mysqli_fetch_array($result1)) {
      $mail->addBCC($row['email']); 
    }
   
  
   

     

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject   = 'Job Posted';
    $mail->Body    = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Job Post</b></title>
                </head>
                <body>
                <b>Dear Student,</b><br><br>
                <p>'.$name.' invited you to register your candidature and get placed through campus hiring activity on talentbeehive.com.<p>
                

<br><a href="www.talentbeehive.com/insticomp/student-registration.php">Click here to Apply</a><br><br>

Wishing you a great career ahead.<br><br>

<b>Best Regards, <br>
Talentbeehive.com</b>
                </body>
                </html>';

   
    $mail->send(); 
   
echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Successfully Posted',
       text: 'success',
       type: 'success',
}, function(isConfirm) {
     document.location.href='student_registration.php'
});
});

</script>";
 
 }
 catch (Exception $e)  {                                                 echo ("<SCRIPT>
	 						  window.alert('Can't Post')
	  						window.location.href='jd.php';
	   						</SCRIPT>");
						 
}
 }


	      //       echo $sql;
	            	
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $update = mysqli_query($DB,$sql);
	          
	          
              if($update)
			  {
			  
			  
			 echo "	  										 							
						<script type='text/javascript' src='../js/jquery-latest.js'></script>
						    <script src='../js/sweetalert.min.js'></script>
						    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
						<script>
						$( document ).ready(function() {
						    swal({
						         title: 'Successfully uploaded!',
						       text: 'You clicked the Ok button!',
						       type: 'success',
						}, function(isConfirm) {
						     document.location.href='institute_profile.php'
						});
						});
						
						</script>"; 
           
			  }
			  else
			  {
				    echo "
							<script type='text/javascript' src='../js/jquery-latest.js'></script>
							    <script src='../js/sweetalert.min.js'></script>
							    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
							<script>
							$( document ).ready(function() {
							    swal({
							      title: 'Oops',
							       text: 'file not uploaded',
							          type: 'error',
							}, function(isConfirm) {
							     document.location.href='institute_profile.php'
							});
							});
							
							</script>";
			  }
	          
				if(! $update )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							
						</script>";
				
				}
				
				
			

	         }
	          
	          

	       
	          
	          
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						
					</script>";
} else 
{
echo "
							<script type='text/javascript' src='../js/jquery-latest.js'></script>
							    <script src='../js/sweetalert.min.js'></script>
							    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
							<script>
							$( document ).ready(function() {
							    swal({
							      title: 'Oops',
							       text: 'Sorry, File type not allowed',
							          type: 'error',
							}, function(isConfirm) {
							     document.location.href='institute_profile.php'
							});
							});
							
							</script>";
}   
    
            
		 
		
	        
			 
			 
			 
			 
			 			
			  		
	
	}
	
		

			 //close of connection
			mysqli_close($DB); 
				
		 	
			
		  
?>		 