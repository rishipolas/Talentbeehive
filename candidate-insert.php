<?php

session_start();    	

if(!isset($_SESSION['userid']))
	header('location:login.php');


require_once "config1.php";
$msg = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Panel</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script src="jquery.min.js"></script>
  
  <script type="text/javascript">
  
$(document).ready(function(){

	$('#qualification').on('change',function(){		
        var qualificationID = $(this).val();
		
		//alert (qualificationID);
		
        if(qualificationID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',		
                
                data:'qualification_id='+qualificationID,
                success:function(html){
                    $('#course').html(html);
                    $('#specialization').html('<option value="">Select course first</option>'); 	
                }
            }); 
        }else{
            $('#course').html('<option value="">Select qualification first</option>');
            $('#specialization').html('<option value="">Select course first</option>'); 
        }
    });
    
    $('#course').on('change',function(){	
        var courseID = $(this).val();
        if(courseID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',		
                data:'course_id='+courseID,
                success:function(html){
                    $('#specialization').html(html);	
                }
            }); 
        }else{
            $('#specialization').html('<option value="">Select course first</option>'); 		
        }
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

//End script

</script>
  
  
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2997357690787675",
    enable_page_level_ads: true
  });
</script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
 <?php
 include("admin_header.php");		
 ?>
 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
      

      
      <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Candidate Insert</div>
      <div class="card-body">
        <form method="POST" action="admin_candidate1-insert-db.php" enctype="multipart/form-data">



		 
		 <div class="form-group" >
            <label for="exampleInputName">Name</label>
            <input class="form-control" id="exampleInputName" pattern="[a-z,A-Z\s]{3,50}" type="text" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
          </div>


		 
		  <div class="row">
          <div class="form-group col-sm-6 field-wrap">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" pattern="[a-zA-Z0-9]+\.?[a-zA-Z0-9]+@[A-Za-z0-9.-]+\.[a-z]{2,3}" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
          </div>
 
 
          

                 
         <!-- Combine contact number eg. +91 9876543210 -->
         
           				<?php
						$contact=$row['contact'];
						list($mcontact, $cnum) = explode("-", $contact);	
					?>
         					
		  			<div class="form-group col-sm-6 field-wrap">
		  			<label for="exampleInputEmail1">Contact Number</label>
		  			<div class="row">
		  			
            					  <div class="col-sm-4">	
							<input class="form-control" id="exampleInputName" type="text" name="mcontact" value="+91">
		 				  </div>
		 				  <div class="col-sm-8">	
							<input class="form-control" id="exampleInputMobile" type="text" name="cnum"  pattern="[6-9]{1}[0-9]{9}" title="should contain exact 10 digit, start with range between 6-9." placeholder="*contact Number" >
		 				</div>
		 			</div>
         				 </div>
		</div>
		
		  
		  
		  

		  <div class="row">
          <div class="form-group col-sm-6 field-wrap">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" placeholder="Password"name="pass">
          </div>
          
          

 
		   <div class="form-group col-sm-6 field-wrap">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input class="form-control" id="exampleInputPassword1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" placeholder=" Confirm Password"name="cpass" onChange="checkPasswordMatch();">
          </div>
          <div class="registrationFormAlert" id="divCheckPasswordMatch">
</div>
          </div>
	

	<div class="row">
	 <?php      
    $query = $DB->query("SELECT * FROM state");     
    $rowCount = $query->num_rows;
    ?>	
          <div class="form-group col-sm-6 field-wrap">
             <label>State</label>
	<select id="state"  name="state" placeholder="state" class="form-control" >
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
          
	<div class="form-group col-sm-6 field-wrap">
             <label>City</label>
	<select  id="city" name="city" placeholder="city" class="form-control" >
	  <option value="" disabled selected>Select state first</option>		
 </select>
        </div>
          
          </div>  
          
 <div class="row">
  <?php
    
    
    
    $query = $DB->query("SELECT * FROM qualification");
    
   
    $rowCount = $query->num_rows;
    ?>
          <div class="form-group col-sm-6 field-wrap">
            <label for="exampleInputName">Highest Qualification</label>
            <select class="form-control" name="qualification" id="qualification" required>
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
          </div>
          
		   <div class="form-group col-sm-6 field-wrap">
           <label for="exampleInputName">Course</label>
			  			   
			    <select class="form-control" name="course" id="course" required>
        <option value="" disabled selected>Select qualification first</option>
    </select>
            
          </div>
          
</div>
     <div class="row">	 
		  <div class="form-group col-sm-6 field-wrap">
            <label for="exampleInputName">Specialization</label>			  				  
			 <select class="form-control" name="specialization" id="specialization" required>
        <option value="" disabled selected>Select course first</option>
    </select>   
	 </div>	   
  
          
		 

	<div class="row">	 
	<div class="form-group col-sm-6 field-wrap">
            <label for="exampleInputResume">Resume</label>
            <input type="file" class="form-control-file" name="res" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">*.pdf  *.docx *.doc</small> 
    	</div>
    
    
		   <div class="form-group col-sm-6 field-wrap">
            <label for="exampleInputVideo">Video Profile</label>
            <input class="form-control-file" id="exampleInputVideo" type="file" name="video">
          </div>
	 </div>	   


		   <div class="row">
		   <div class="form-group col-sm-4 field-wrap">
            <label for="exampleInputUniversity">Application</label>
            <select  class="form-control" id='ex-drop' name = "application">  
                          <option value='Fresher'>Fresher</option>
                          <option value='Experienced'>Experience</option>
    
            </select>
          </div>
		  
		 
		   <div class="form-group col-sm-4 field-wrap">
             <label for="exampleInputUniversity">Year</label>
            <select class="form-control" name="year" id='year'>
                         <option>0/Year</option>
						<option>1/Year</option>
						<option>2/Year</option>
						<option>3/Year</option>
						<option>4/Year</option>
						<option>5/Year</option>
						<option>6/Year</option>
						<option>7/Year</option>
						<option>8/Year</option>
						<option>9/Year</option>
						<option>10/Year</option>
						<option>11/Year</option>
                     </select>
          </div>
		   <div class="form-group col-sm-4 field-wrap">
		   <label for="exampleInputUniversity">Months</label>
             <select class="form-control" name="months" id='months'>
                        <option>0/Months</option>
						<option>1/Months</option>
						<option>2/Months</option>
						<option>3/Months</option>
						<option>4/Months</option>
						<option>5/Months</option>
						<option>6/Months</option>
						<option>7/Months</option>
						<option>8/Months</option>
						<option>9/Months</option>
						<option>10/Months</option>
						<option>11/Months</option>
                     </select>
           
          </div>
          </div>
		  



		  <div class="form-group col-sm-6 field-wrap">
            <label for="exampleInpuPY">Functional Role</label>
            <select id="exampleInputFR" class="form-control" name="role" required>
           <option value="" disabled selected>----Select----</option> 
           
        
<?php
$rol = mysqli_query($DB, "SELECT * From functional_role");
$rolr = mysqli_num_rows($rol);
while ($rolr  = mysqli_fetch_array($rol)){
?>
<option value="<?php echo $rolr['role'] ?>"
         <?php 
            if( $rolr['role'] ==  $row2['role']) { 
            echo " selected"; 
            } ?> > <?php echo $rolr['role'] ?></option>
            <?php

}
?>
</select>
          </div>
		  </div>



		  
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <label class="control-label">Marital Status:</label> 
              </div>
              <div class="col-md-4">
                <label class="radio-inline"><input type="radio" name="marital" value="married">Married</label>
			 </div>
			  <div class="col-md-4">
					<label class="radio-inline"><input type="radio" name="marital" value="unmarried" >Unmarried</label>
              </div>
            </div>
          </div>
		  
			

		  
          <button class="btn btn-primary btn-block"  name="btnSubmit" value="Save">Insert</button>
		   <?php echo $msg; ?>
        </form>
       
      </div>
    </div>
  </div>
      
    </div>
  
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
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
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    
    
  
    
    <script>
               function checkPasswordMatch() {
    var pass = $("#pass").val();
    var cpass = $("#cpass").val();

    if (pass != cpass)
        $("#divCheckPasswordMatch").html("Passwords do not match!").css('color', 'red');
    else
        $("#divCheckPasswordMatch").html("Passwords match.").css('color', 'green');
}
$(document).ready(function () {
   $("#cpass").keyup(checkPasswordMatch);
});
	</script>
   
  
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
   
   
  </div>
</body>

</html>
