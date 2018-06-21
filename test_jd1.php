<?php
session_start();



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
        <form method="post" action="test_jd_db.php" enctype="multipart/form-data">
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
    <select class="form-control" name="qualification" id="qualification" >
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
              
            </div>
          </div>
		  
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
			  <?php
    
    
    //Get all country data
    $query = $DB->query("SELECT * FROM course");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
               <label for="exampleInputName">Course</label>
			    <select class="form-control" name="course" id="course">
        <option value="" disabled selected>Select qualification first</option>
		<?php
        if($rowCount > 0){
            while($getCourse = $query->fetch_assoc()){ 
                echo '<option value="'.$getCourse['c_id'].'">'.$getCourse['course'].'</option>';
            }
        }else{
            echo '<option value="">course not available</option>';
        }
        ?>
    </select>
              </div>
             
            </div>
          </div>
		  
		  
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Specialization</label>
				 <?php
    
    
    //Get all country data
    $query = $DB->query("SELECT * FROM specialization");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
			 <select class="form-control" name="specialization" id="specialization">
        <option value="" disabled selected>Select course first</option>
		<?php
        if($rowCount > 0){
            while($getSpecialization = $query->fetch_assoc()){ 
                echo '<option value="'.$getSpecialization['s_id'].'">'.$getSpecialization['specialization'].'</option>';
            }
        }else{
            echo '<option value="">specialization not available</option>';
        }
        ?>
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
					<div class="col-lg-3 form-group">
					<!--<input type="text" class="form-control" name='year1' id='year' placeholder="eg. 0 to 1 Yrs">-->
                     		 <select class="form-control" name='year1' id='year'>
                     		              <option value=" " selected disabled>From</option>
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
					  <div class="col-lg-3 form-group">
			  <!--<label class="form-control"> eg. 0 to 1 Yrs</label>-->
                    <select class="form-control" name='month1' id='months'>
                                 <option value=" " selected disabled>to</option>
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
					 
					 
					 <div class="col-lg-3 form-group">
			  <!--<label class="form-control"> eg. 0 to 1 Yrs</label>-->
                    <select class="form-control" name='year2' id='months'>
                                 <option value=" " selected disabled>to</option>
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
					 
					 
					 
					 
					 
					 <div class="col-lg-3 form-group">
			  <!--<label class="form-control"> eg. 0 to 1 Yrs</label>-->
                    <select class="form-control" name='month2' id='months'>
                                 <option value=" " selected disabled>to</option>
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
			
			
			
			   <?php
    
    
    
    $query = $DB->query("SELECT * FROM state");
    
   
    $rowCount = $query->num_rows;
    ?>	
      		 
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputLocation">State</label>
                
                <select class="form-control" id="state"  name="state" placeholder="*state"  required>
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

<div class=" col-md-6 field-wrap">
						<label for="exampleInputAT">city</label>
						   <select  class="form-control" id="city" name="city" placeholder="*city"  required>
	  <option value="" disabled selected>Select state first</option>		
 </select>
					</div>
			</div>
			</div>



		  <div class="form-group">
            <label for="exampleInputJD">Job Description</label>
            <textarea class="form-control" id="exampleInputJD"   placeholder="Enter Job Description" name="description" rows="8" cols="20"></textarea>
          </div>
		  
           <button class="btn btn-primary btn-block"  type="submit"  >Post</button>
         
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
	  <script src="js/dropdown.js"></script>
	    <script src="js/show-hide-collapse.js"></script>
  
</body>

</html>
