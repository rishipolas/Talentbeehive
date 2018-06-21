<?php
session_start();
if( !isset($_SESSION['email'])){
  echo ("<SCRIPT LANGUAGE='JavaScript'>    
                          window.location.href='company-login.php';
                          </SCRIPT>"); 
  //header("Location: company-login.php");
  $email=$_SESSION['email'];
}


include("config1.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Talent Beehive</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/bootstrap-multiselect.css" rel="stylesheet">
  <script src="jquery.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){


    $('#qualification').multiselect({
          buttonWidth: '350px',
          maxHeight: 300,
         
        });
   
    $('#course').on('change',function(){
        
    });
    
     $('#specialization').on('change',function(){
        
    });
    
	
    
      $('#state').on('change',function(){   
        var stateID = $(this).val();
    
    //alert (qualificationID);
    
        if(stateID){
            $.ajax({
                type:'POST',
                url:'locationData.php',   
                
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                    
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>');
           
        }
    });
});
</script>
       
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
     <?php
 include("company_header.php");
 ?>
 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Job Description</a>
        </li>
        <li class="breadcrumb-item active">Registration</li>
      </ol>
      
      <div class="container" style="padding-bottom:10px;">
    <div class="card card-register">
      <div class="card-header">Job Description</div>
      <div class="card-body">
        <!--<form method="post" action="jd_db.php" enctype="multipart/form-data">-->
        <form method="post" enctype="multipart/form-data">
    <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label class="control-label">Type:</label> 
              </div>
              <div class="col-md-2">
                <label class="radio-inline"><input type="radio" name="type" value="Full Time">Full Time</label>
       </div>
        <div class="col-md-2">
          <label class="radio-inline"><input type="radio" name="type" value="Part Time">Part Time</label>
              </div>
              <div class="col-md-4">
          <label class="radio-inline"><input type="radio" name="type" value="Full Time/Part Time">Full Time/Part Time</label>
              </div>
            </div>
          </div>
        
        <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputJT">Job Title</label>
                <input class="form-control" id="exampleInputJT" type="text"  placeholder="Enter Title of job" name="title" title="required"  required>
              </div>
             
             <div class="col-md-6">
                <label for="exampleInputcomapnyname">Company Name</label>
                <p class="form-control"><?php echo $_SESSION['name'];?>
                <input class="form-control" id="exampleInputcompanyname" type="hidden"  placeholder="Enter Company Name" name="name" value="<?php echo $_SESSION['name'];?>">
              </div>
             <input  type="hidden"  name="id" value="<?php echo $_SESSION['id'];?>">
         
            </div>
          </div>
       
              
         <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputFR">Functional Role</label>
              <select id="exampleInputFR" class="form-control" name="role" required>
              <option value="" disabled selected>---SELECT----</option>
                     
<?php
$rol = mysqli_query($DB, "SELECT * From functional_role");
$rolr = mysqli_num_rows($rol);
while ($rolr  = mysqli_fetch_array($rol)){
?>
<option value="<?php echo $rolr['role'] ?>"> <?php echo $rolr['role'] ?></option>
            <?php

}
?>
</select>
             
      </div>
	  
                    <div class="col-md-6">
                <label for="exampleInputFR">Number Of Openings</label>
                  <input class="form-control" id="exampleInputPositions" type="text"  placeholder="Enter No of position" name="openings">
              </div>
      </div>
              </div>
			  
         
		 
		 
		 <div class="form-group">
            <div class="form-row">
             <div class="col-md-12">
       
       <?php
    
    
    //Get all country data
    $query = $DB->query("SELECT * FROM qualification");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    ?>
    
    
   <label for="exampleInputName">Qualification</label>
   
  <select size="5" class="form-control"  name="qualification[]" id="qualification" multiple="multiple" onclick="myFunction2()" >
      
        <option value="" disabled selected>Select qualification</option>
        <?php
        if($rowCount > 0){
            while($getQualification = $query->fetch_assoc()){ 
                echo '<option value="'.$getQualification['id'].'">'.$getQualification['qualification'].'</option>';
            }
        }else{
            echo '<option value="">qualification not available</option>';
        }
        ?>
         
    </select>
       
   <a class="btn btn-primary" id="show" onclick="myFunction()">Next</a> 

              </div>
              
            </div>
          </div>
      
      <div class="form-group asdf">
            <div class="form-row">
              <div class="col-md-12">
        <?php    
    //Get all country data
    $query = $DB->query("SELECT * FROM course");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
                 
                  <label for="exampleInputName">Course</label>
                    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<select class="form-control course_select_parent " name="course[]" id="course" multiple="multiple" >  
                     </select>
   
                          
     <a class="btn btn-primary" id="show1" onclick="myFunction1()">Next</a> 
     
              </div>
             
            </div>
          </div>
      
      
      <div class="form-group qwer">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Specialization</label>
       
                <select class="form-control specialization_select_parent " name="specialization[]" id="specialization" multiple="multiple" >  
                     </select>
                
              </div>
             
            </div>
          </div>
		 
		 
		 
		 
		 
      
      
      
      
     
      
      <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputPositions">Skills</label>
                <input class="form-control" id="exampleInputPositions" type="text"  placeholder="Enter Skills" name="skills">
              </div>
             
            </div>
          </div>
      
      
          <div class="form-group">
              
             <label for="exampleInputAT">Application Type</label> 
           <select  class="form-control" id='ex-drop' name = "atype" required>  
                          <option value='Fresher'>Fresher</option>
                          <option value='Experienced'>Experience</option>
    
                     </select>
                    </div>
          <div class="row">
            <p id="frm">From</p>
          <div class="col-lg-5 form-group">
          <!--<input type="text" class="form-control" name='year' id='year' placeholder="eg. 0 to 1 Yrs">-->
                         <select class="form-control" name='year1' id='year'>
                                      <option value=" " selected disabled>year</option>
                                                <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
             <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
        
            
                     </select>
           </div>
            <div class="col-lg-5 form-group">
        <!--<label class="form-control"> eg. 0 to 1 Yrs</label>-->
                    <select class="form-control" name='month1' id='months'>
                                 <option value=" " selected disabled>month</option>
                                                 <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
                     </select>
           </div>
         </div>


                <div class="row">

<p id="to">To &nbsp; &nbsp;</p>
           <div class="col-lg-5 form-group">

          <!--<input type="text" class="form-control" name='year' id='year' placeholder="eg. 0 to 1 Yrs">-->
                         <select class="form-control" name='year2' id='year1'>
                                      <option value=" " selected disabled>year</option>
                                                <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
              <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            
                     </select>
           </div>
           <div class="col-lg-5 form-group">
          <!--<input type="text" class="form-control" name='year' id='year' placeholder="eg. 0 to 1 Yrs">-->
                         <select class="form-control" name='month2' id='months1'>
                                      <option value=" " selected disabled>month</option>
                                                <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            
                     </select>
           </div>
           </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
               <label for="exampleInputLocation">Country</label>
          <!--<input type="text" class="form-control" name='country' id='country' placeholder="India">-->
                         <select class="form-control" name='country' id='ex-drop123'>
                                      <option value=" " selected disabled>Country</option>
                                                
            <option value="INDIA">INDIA</option>
            <option value="PAN INDIA">PAN INDIA</option>
            
            
                     </select>
           </div>
      </div>
      </div>
         <?php
    
  
    
    $query = $DB->query("SELECT * FROM state");
    
   
    $rowCount = $query->num_rows;
    ?>  
           
       <div class="form-group">
            <div class="form-row Ind">
              <div class="col-md-6">
                <label for="exampleInputLocation">State</label>
                
                <select class="form-control " id="state"  name="state" placeholder="*state"  >
     <option value="" disabled selected>Select state</option>
        
 <?php
        if($rowCount > 0){
            while($getState = $query->fetch_assoc()){ 
            
            
            
                echo '<option value="'.$getState['id'].'">'.$getState['statename'].'</option>'; 
            }
        }else{
            echo '<option value="">State not available</option>';
        }
        ?>
 </select>
</div>

<div class=" col-md-6 field-wrap Ind2">
            <label for="exampleInputAT">city</label>
               <select  class="form-control " id="city" name="city" placeholder="*city"  >
    <option value="" disabled selected>Select state first</option>    
 </select>
          </div>
      </div>
      </div>



      <div class="form-group">
            <label for="exampleInputJD">Job Description</label>
            <textarea class="form-control" id="description" placeholder="Enter Job Description" name="description" rows="8" cols="80"></textarea>
          </div>
      
           <button class="btn btn-primary btn-block"  type="submit" name="btnpost"  >Post</button>
         
        </form>
        
      </div>
    </div>
  </div>
     
      
         <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="company-logout.php">Logout</a>
          </div>
        </div>
      </div>
      

      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
   <script src="js/edit.js"></script>
    <script src="js/dropdown1.js"></script>
      <script src="js/show-hide-collapse.js"></script>
	  
	 <script src="js/dropdown1.js"></script>
      <script src="js/show-hide-collapse.js"></script>
  <script src="js/bootstrap-multiselect.js"></script> 
	  
<script>
function myFunction() {
    var qualificationID  = $('#qualification').val();
    
        if(qualificationID){
             $.ajax({
                type:'POST',
                url:'ajaxData1.php',
                data:'qualification='+qualificationID,
                success:function(html){
                     $('.course_select_parent').html(html);
                    $('.course_select_parent').multiselect({
                    buttonWidth: '350px',
                     maxHeight: 300,
                    
                     });
                    
         
                     
                     
                   $('#specialization').html('<option value="">Select course first</option>'); 
                }
            }); 
        }else{
            $('#course').html('<option value="">Select qualification first</option>');
            $('#specialization').html('<option value="">Select course first</option>'); 
        }
    
    
}

function myFunction1() {
    
    var courseID = $('#course').val();
    
        if(courseID){
            $.ajax({
                type:'POST',
                url:'ajaxData1.php',
                data:'course='+courseID,
                success:function(html){
                   $('.specialization_select_parent').html(html);
                   
                   $('.specialization_select_parent').multiselect({
                    buttonWidth: '350px',
                     maxHeight: 300,
                    
                     });
                }
            }); 
            
            
            
        }else{
            $('#specialization').html('<option value="">Select course first</option>'); 
        }
}

</script>
<script type="text/javascript">
$(document).ready(function(){
   
        $(".asdf").hide();
    
    $("#show").click(function(){
        $(".asdf").show();
    });
    $(".mnbv").hide();
    
    $("#show12").click(function(){
        $(".mnbv").show();
    });
});

</script>


<!--<script>	 
 /* $(document).ready(function() {
    $(".Ind").hide();
	 $(".Ind2").hide();

     $('#ex-drop123').change(function () {
        if ($('#ex-drop123 option:selected').text() == "INDIA"){
            $(".Ind").show();
		$(".Ind2").show();
        }
         else { 
              $(".Ind").hide();
	 $(".Ind2").hide();
         }
    });
});
*/
</script>-->
</body>

</html>
<?php
if(isset($_POST['btnpost']))
{ 


    $index1=$index2="";

	$email=$_SESSION['email'];
    $id=$_POST['id'];
$type=$_POST['type'];
$title=$_POST['title'];
$name=$_POST['name'];
$role=$_POST['role'];
$openings=$_POST['openings'];
    
    $qualification=$_POST["qualification"];
    $qualification1= implode(',', $qualification);
//echo '<script>alert("'.$qualification1.'")</script>';
    
    $course=$_POST["course"];
    $course1= implode(',', $course);
// echo '<script>alert("'.$course1.'")</script>';
  
    $specialization=$_POST["specialization"];
    $specialization1= implode(',', $specialization);
   
    $skills=$_POST['skills'];
$atype=$_POST['atype'];
$year1=$_POST['year1'];
$month1=$_POST['month1'];
$year2=$_POST['year2'];
$month2=$_POST['month2'];
$ayear=$year1.".".$month1;
$byear=$year2.".".$month2;
$year=$ayear."-".$byear;
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$description=$_POST['description'];

date_default_timezone_set("Asia/Kolkata");
$dt=date("d-m-y")."/".date("h:i:sa");

    $query   = "INSERT INTO functionality(type,title,name,email,role,openings,qualification,course,specialization,skills,atype,year,country,state,city,description,date)    values('$type','$title','$name','$email','$role','$openings','$qualification1','$course1','$specialization1','$skills','$atype','$year','$country',$state,$city,'$description','$dt')";
    //mysqli_query($DB,$query);
    //retrieving values using id
    
   
               
                         $str2 = $qualification1;	
						    $strs2=explode(",",$str2);
						     $qual="";
							  foreach($strs2 as $q2){
							
							 $q1="select qualification from qualification where id='$q2'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['qualification'];
							   $qual=$qual.$c.", ";
							  }
							 
						//echo $qual;
                        
                 	$str3 = $course1;	
					$strs3=explode(",",$str3);
					$st1="";
					foreach($strs3 as $q3)
					{
						$q1="select course from course where c_id='$q3'";
						$result1=mysqli_query($DB,$q1);
						$row1=mysqli_fetch_array($result1);
						$c=$row1['course'];
						$st1=$st1.$c.", ";
					}
												 
					//echo $st1;
			$str1 = $specialization1;	
						    $strs=explode(",",$str1);
						     $str="";
							  foreach($strs as $b){
							
							 $q1="select specialization from specialization where s_id='$b'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['specialization'];
							   $str=$str.$c.", ";
							  }
			
							  
    		/*	$getstate=mysqli_query($DB,"select statename  from state where id=".$state);
              $getstatedetails = mysqli_fetch_array($getstate);
              $stat=$getstatedetails['statename'];
              
              $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$city);
              $getcitydetails = mysqli_fetch_array($getcity);
              $cit=$getcitydetails['cityname'];
    */
    
    
    

    // part of email
        $status=mysqli_query($DB,$query);
	 $qualification= explode(',', $qualification1);
	$course= explode(',', $course1);
	//echo '<script>alert("'.$qualification.'")</script>';
       if ($status > 0) 
       {
          $count=count($qualification);
          for ($index1 = 0; $index1 < count($qualification); $index1++)
          {
      //echo '<script>alert("heyy")</script>';
           for($index2=0; $index2 <count($course); $index2++)
           {
        
        //for($index3=0; $index3 < count($specialization); $index3++) {
         
          $sql="select * from candidate where qualification='$qualification[$index1]'"
            . " and ( course='$course[$index2]')"; 
   
    
          $result = mysqli_query($DB, $sql);
              
               require_once "phpmailer/class.phpmailer.php";
 // require '../phpmailer/PHPMailerAutoload.php';


               $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
 	
		while ($row = mysqli_fetch_array($result)) 
		{
      			$mail->addBCC($row['email']); 
      			// $to=$mail;
    		}
   
    //Recipients
    $mail->setFrom('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addAddress('donotreply@talentbeehive.com', 'user');     // Add a recipient
    $mail->addReplyTo('admin@talentbeehive.com', 'Talent Beehive');
    $mail->addCC('info@talentbeehive.com');
    $mail->addBCC('abhijeets@talentbeehive.com');
    $mail->addBCC('sushantk6158@gmail.com');
    
   
    
  
   

     

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject   = 'Job Posted';
    $mail->Body    = '<!DOCTYPE html>
<html><head>
</head>
<body>
    
    <div style="margin:40px;">
                <b>Dear Candidate,</b><br><br>
                <p>Talent Beehive is a platform which gives you an opportunity to upload video resume about your convincing candidature which will help to bridge gaps in between requirements from various industries and jobseekers.<p>
                <table border="2"><tr><th>Employer Name</th><td>'.$name.'</td></tr>
                <tr><th>Job Title</th>  <td>'. $title.'</td></tr>
</table>
<br><a href="www.talentbeehive.com/candidate-login.php">Click here to Apply</a><br><br>

<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;">Recruiters may try to contact you at </div>
<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;"><b></b>Email Address: info@talentbeehive.com<a href="#"></a></div>

<b>Best Regards, <br>
Talentbeehive.com</b>
</div>
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
     document.location.href='job-post.php'
});
});

</script>";
 
 }
        catch (Exception $e)  
        {                                                 echo ("<SCRIPT>
                window.alert('Can't Post')
                window.location.href='jd.php';
                </SCRIPT>");
             
        }
            
      }//for index2
    }//for index1

    
    
  }//if status
 
}//if isset

    

  // $query = "SELECT email FROM institute_registration WHERE courses='$course'";

   /* ***functionality table contains jobs postedby company for candidate, so in jd_db.php , Insert query is applied on functionality table and select query is applied on candidate*** */
   // $query = "SELECT email FROM  candidate  WHERE  specialization= '$specialization' OR course='$course'";

  // submit the query

 // ***$result = mysqli_query($DB, $query);

  // create array to store all the emails
  
  //echo "hhhhh";
  
  
  
?>