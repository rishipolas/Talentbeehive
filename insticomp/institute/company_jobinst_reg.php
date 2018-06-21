<?php
session_start();
if( !isset($_SESSION['email'])){
 
  $email=$_SESSION['email'];
}
include_once("../config1.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Talent Beehives</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <script src="../jquery.min.js"></script>

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
      <div class="card-header">Job Description For Institute</div>
       <div class="card-body">
        <form method="post" enctype="multipart/form-data">
	  <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label class="control-label">Type</label> 
              </div>
              <div class="col-md-4">
                <label class="radio-inline"><input type="radio" name="jtype" value="Internship">Internship</label>
	      </div>
	      <div class="col-md-4">
		<label class="radio-inline"><input type="radio" name="jtype" value="Full time trainee">Full time trainee</label>
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
    
    
   <label for="exampleInputName">Qualification<span class="req"> *</span></label>
   
  <select size="5" class="form-control"  name="qualification[]" id="qualification" multiple="multiple" onclick="myFunction2()" required>
      
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
            <div class="col-lg-3">
              <label for="exampleInputPositions">Openings<span class="req"> *</span></label>              
            </div>
            <div class="col-lg-9">             
              <input class="form-control" id="exampleInputPositions" name="openings" type="text"  placeholder="Enter number of Openings" required>
            </div>
           </div>
          </div>
         
         <div class="form-group">
          <div class="form-row">            
          
              <div class="col-md-3">
                <label class="control-label"> Salary offered<span class="req"> *</span></label> 
               </div>
            <div class="col-md-2">
                <label class="radio-inline"><input type="radio" name="salarytype" value="Stipend"  >Stipend</label>
       	    </div>
            <div class="col-md-2">
          	<label class="radio-inline"><input type="radio" name="salarytype" value="Salary"  >Salary</label>
            </div>
            <div class="col-md-5">
          	<input type="text" class="form-control" id="exampleInputSalary" name="salary" placeholder="Salary Amount">
            </div>
          </div>
        </div>
        
            <!--  state and city -->
            <?php
               
              $query = $DB->query("SELECT * FROM state");
      
              $rowCount = $query->num_rows;
            ?> 
      
        <div class="form-group">
            <div class="form-row">
              <div class="col-lg-6">
            
                <label>State<span class="req"> *</span> </label>
              <select id="state" class="form-control" name="state" placeholder="*state" style="color:#000000;" required>
              <option value="" disabled selected>Select state</option>
        
             <?php
            if($rowCount > 0)
            {
              while($getState = $query->fetch_assoc())
              {            
                echo '<option value="'.$getState['id'].'">'.$getState['statename'].'</option>'; 
              }
            }else
            {
              echo '<option value="">State not available</option>';
            }
            ?>
            </select>
          </div>
          
            <div class="col-lg-6">
                <label>City<span class="req"> *</span> </label>
                 <select  id="city" class="form-control" name="city" placeholder="*city" style="color:#000000;" required>
                  <option value="" disabled selected>Select state first</option>   
                 </select>
            </div>
          </div>
        </div>

        <div class="form-group">
            <label for="exampleInputDesignation">Designation</label>
            <input class="form-control" id="exampleInputDesignation" name="designation" type="text"  placeholder="Enter Designation">
          </div>
          <div class="form-group">
            <label for="exampleInputSR">Special Requirement</label>
            <input class="form-control" id="exampleInputSR" name="requirement" type="text"  placeholder="Enter Requirement">
          </div>
      <div class="form-group">
          <div class="form-row">
              <div class="col-md-12">
            
            <label for="exampleInputJD">Job Description<span class="req"> *</span></label>
            <textarea class="form-control" id="exampleInputJD" name="description" rows="8" cols="80" required></textarea>
              </div>
          </div>
        </div>

		    <button class="btn btn-primary btn-block" name="btnpost" value="Save">Post Job For Institutes</button>
          <!--<button type="submit" class="button button-block" name="btnpost" />Post</button>-->
        </form>
      </div>
    </div>
  </div></div></div>
  
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
  
  
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
    
    <script src="../js/dropdown1.js"></script>
      <script src="../js/show-hide-collapse.js"></script>
  <script src="../js/bootstrap-multiselect.js"></script>


<script>
function myFunction() {
    var qualificationID  = $('#qualification').val();
    
        if(qualificationID){
             $.ajax({
                type:'POST',
                url:'../ajaxData1.php',
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
                url:'../ajaxData1.php',
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
<script>
$(document).ready(function(){
   
        $(".asdf").hide();
    
    $("#show").click(function(){
        $(".asdf").show();
    });
});


$(document).ready(function(){
   
        $(".qwer").hide();
    
    $("#show1").click(function(){
        $(".qwer").show();
    });
});
</script>
    
    
  
    
  
</body>

</html>
<?php
if(isset($_POST['btnpost']))
{ 


    $index1=$index2="";

	$email=$_SESSION['email'];
    $cname=$_SESSION['name'];
    $jtype=$_POST['jtype'];
    
    $qualification=$_POST["qualification"];
    $qualification1= implode(',', $qualification);
//echo '<script>alert("'.$qualification1.'")</script>';
    
    $course=$_POST["course"];
    $course1= implode(',', $course);
// echo '<script>alert("'.$course1.'")</script>';
  
    $specialization=$_POST["specialization"];
    $specialization1= implode(',', $specialization);
   
    $openings=$_POST['openings'];
    $salarytype=$_POST['salarytype'];
     $salary=$_POST['salary'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $designation=$_POST['designation'];
    $description=$_POST['description'];
    $requirement=$_POST['requirement'];
        date_default_timezone_set("Asia/Kolkata");
    $dt=date("d-m-y")."/".date("h:i:sa");

    $query   = "INSERT into company_jobinstitute (cname,email,jtype,qualification,course,specialization,openings,salarytype,salary,state,city,designation,description,requirement,jdate) VALUES('$cname','$email','$jtype','$qualification1','$course1','$specialization1','$openings','$salarytype','$salary',$state,$city,'$designation','$description','$requirement','$dt')";
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
    			$getstate=mysqli_query($DB,"select statename  from state where id=".$state);
              $getstatedetails = mysqli_fetch_array($getstate);
              $stat=$getstatedetails['statename'];
              
              $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$city);
              $getcitydetails = mysqli_fetch_array($getcity);
              $cit=$getcitydetails['cityname'];
    
    
    
    

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
         
          $sql="select * from institute_registration where qualifications='$qualification[$index1]'"
            . " and ( courses='$course[$index2]')"; 
   
    
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
    $mail->addCC('palalok1@gmail.com');
    $mail->addBCC('kanchanshinde5495@gmail.com');
    $mail->addBCC('sushantk6158@gmail.com');
    
   
    
  
   

     

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject   = 'Job Posted';
    $mail->Body    = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Job Post for institute</b></title>
                </head>
                <body>
                <b>Dear institute,</b><br><br>
                <p>Talent Beehive is a platform which gives you an opportunity to upload video resume about your convincing candidature which will help to bridge gaps in between requirements from various industries and jobseekers.<p>
                <table border="2" width="auto">
                <tr><th>Employer Name</th><td>'.$cname.'</td></tr>
                <tr><th>Designation</th>  <td>'. $designation.'</td></tr>
                <tr><th>Type</th>  <td>'. $jtype.'</td></tr>
                <tr><th>Qualification</th> <td>'.$qual.'</td></tr>
                  <tr><th>Course</th>  <td>'. $st1.'</td></tr>
                  <tr><th>Specialization</th>  <td>'. $str.'</td></tr>
                 <tr><th>Openings</th>  <td>'. $openings.'</td></tr>
                 <tr><th>Salary offered</th>  <td>'. $salarytype.' - '. $salary.'</td></tr>
                  <tr><th>Location</th>  <td>'.$cit.' - '. $stat.'</td></tr>
                  <tr><th>Requirement</th>  <td>'. $requirement.'</td></tr>
                  <tr><th>Description</th>  <td>'. $description.'</td></tr>
                  
                  
</table>
<br><a href="www.talentbeehive.com">Search More Job posts</a><br><br>

Wishing you a great career ahead.<br><br>

<b>Best Regards, <br>
Talentbeehive.com</b>
                </body>
                </html>';

   
    $mail->send(); 
   
echo "
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Successfully Posted',
       text: 'success',
       type: 'success',
}, function(isConfirm) {
     document.location.href='view_company_jobinst.php'
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