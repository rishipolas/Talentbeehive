<?php
session_start();
if(! isset($_SESSION['email']))		
echo ("<SCRIPT LANGUAGE='JavaScript'>	   
	                        window.location.href('candidate-login.php');
	                        </SCRIPT>");



//include("config1.php");
$con=mysqli_connect('166.62.10.54','roottalent','beehive@root');		
//$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'socialuser');
$q="select * from candidate where email='{$_SESSION['email']}'";	
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
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
  
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2997357690787675",
    enable_page_level_ads: true
  });
  
  
</script>
  
  
 
  
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
       
  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
 include("candidate_header.php");		
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Candidate Complete Profile</a>
        </li>
     
      </ol>
	  
	  
	  
	  
<?php
	  if($num>0)
	  {
	  for($i=1;$i<=$num;$i++)
        {
	$row2=mysqli_fetch_array($result);	
?>
         <div class="container">
    <div class="card card-register">
      <div class="card-header heading1">Complete Profile</div>
      <div class="card-body">
        <form action="candidate1-insert-db.php" method="post"  enctype="multipart/form-data">
      
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <?php
    
    
    
    $query = $con->query("SELECT * FROM qualification");
    
   
    $rowCount = $query->num_rows;
    ?>
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
			  
		 <div class="col-md-6">
			   <label for="exampleInputName">Course</label>
			   

			   
			    <select class="form-control" name="course" id="course" required>
        <option value="" disabled selected>Select qualification first</option>
    </select>
  
              
         
              </div>	 
			 
			 
			   
			  </div>
			  </div>
			 
			 
			
			 
			 
			   <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
			  <label for="exampleInputName">Specialization</label>
			  
	
			  
			 <select class="form-control" name="specialization" id="specialization" required>
        <option value="" disabled selected>Select course first</option>
    </select>
              
         
              </div>
			  
			 
			   
			  </div>
			  </div>
			 
			 
		  <div class="form-group">
				    	 <input type="hidden" name="id" value="<?php echo $row2['id'];?>">
						 <label for="exampleInputAT">Application Type</label>
					<!--<select  class="form-control" id='ex-drop' name = 'application'>
					
					
					
<?php
$appl = mysqli_query($con, "SELECT * From application");
$application = mysqli_num_rows($appl);
while ($application = mysqli_fetch_array($appl)){
?>
 <option value="<?php echo $application['application_type'] ?>"
         <?php 
            if( $application['application_type'] ==  $row2['application']) { 
            echo " selected"; 
            } ?> > <?php echo $application['application_type'] ?></option>
            <?php

}
?>
</select>-->	 	
					 <select  class="form-control" id='ex-drop' name = 'application' selected="<?php echo $row2['application'];?>" required>  
                          <option value='Fresher'>Fresher</option>
                          <option value='Experience'>Experience</option>
    
                     </select>
                    </div>
					<div class="row">
					<div class="col-lg-6 form-group">
					<!--<select class="form-control" name='year' id='year'>
					
		
					
<?php
$sql1 = mysqli_query($con, "SELECT * From experience");
$ro1 = mysqli_num_rows($sql1);
while ($ro1 = mysqli_fetch_array($sql1)){
?>
 <option value="<?php echo $ro1['year'] ?>"
         <?php 
            if( $ro1['year'] ==  $row2['year']) { 
            echo " selected"; 
            } ?> > <?php echo $ro1['year'] ?></option>
            <?php

}
?>
</select>-->



                     		 <select class="form-control" name='year' id='year' >
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
					 <div class="col-lg-6 form-group">
				<!--<select class="form-control" name='months' id='months'>
<?php
$sql2 = mysqli_query($con, "SELECT * From experience");
$ro2 = mysqli_num_rows($sql2);
while ($ro2 = mysqli_fetch_array($sql1)){
?>
 <option value="<?php echo $ro1['year'] ?>"
         <?php 
            if( $ro2['months'] ==  $row2['months']) { 
            echo " selected"; 
            } ?> > <?php echo $ro2['months'] ?></option>
            <?php

}
?>
</select>-->



                   <select class="form-control" name='months' id='months'>
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
					 <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label class="control-label">Marital Status:</label> 
              </div>
			  
			  				
<?php
/*$marriage = mysqli_query($con, "SELECT * From marriage");
$marriagedetail = mysqli_num_rows($marriage);
while ($getmarriagedetail = mysqli_fetch_array($marriagedetail)){

 
            if( $getmarriagedetail['status'] ==  $row2['marital']) { 
               
            } 
}
*/
?>





              <div class="col-md-4">
                <label class="radio-inline"><input type="radio" name="marital" <?php echo ($row2['marital']=='married')?'checked':'' ?> value="married" >Married</label>
			 </div>
			  <div class="col-md-4">
					<label class="radio-inline"><input type="radio" name="marital" <?php echo ($row2['marital']=='unmarried')?'checked':'' ?>  value="unmarried" >Unmarried</label>
              </div>
            </div>
          </div>
			  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputFR">Functional Role</label>
                		<select id="exampleInputFR" class="form-control" name="role" required>
           <option value="" disabled selected>----Select----</option> 
           
        
<?php
$rol = mysqli_query($con, "SELECT * From functional_role");
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
              
              
              					
<?php
						$contact=$row2['contact'];
						list($mcontact,$cnum) = explode("-",$contact);
?>
					 <div class=" col-md-6 field-wrap">
					 <label for="exampleInputAT">Contact Number</label>
					 <div class="form-row">
	         <div class="col-md-3">	
			<input class="form-control" id="exampleInputName" type="text" name="mcontact" value="+91" readonly>
			
		 </div>	
		 <div class="col-md-9">	
		 
		 
		 
		 
						<input class="form-control" id="exampleInputMobile" type="text" name="cnum" value="<?php echo $cnum; ?>" pattern="[6-9]{1}[0-9]{9}" title="should contain exact 10 digit, start with range between 6-9." placeholder="contact Number" >
		 </div>
		 
					<!--<input class="form-control" id="exampleInputMobile" type="text" value="<?php echo $row2['contact']; ?>" name="contact" placeholder="Contact number">-->
					</div> 
					
					</div> 
              
              
            </div>
          </div>
		  
		   <?php
    
    
    
    $query = $con->query("SELECT * FROM state");
    
   
    $rowCount = $query->num_rows;
    ?>	
      
		   <div class="form-group">
            <div class="form-row">
		<div class=" col-md-6 field-wrap">
						<label for="exampleInputAT">State</label>
						  <select class="form-control" id="state"  name="state" placeholder="state"  required>
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
						   <select  class="form-control" id="city" name="city" placeholder="city"  required>
	  <option value="" disabled selected>Select state first</option>		
 </select>
					</div>
			

					</div> 
		  
		  
 
		  
		<div class="form-group">
            <div class="form-row">
			<div class="col-md-6">
                <label for="exampleInputFile">Video Profile</label>
    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="video">
    <small id="fileHelp" class="form-text text-muted">*.mp4</small>
              </div>
		
		
		<div class="col-md-6">
                <label for="exampleInputFile">Resume</label>
    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="res" required>
    <small id="fileHelp" class="form-text text-muted">*.doc,*.pdf,*.docx</small>
              </div>
				
             
            </div>
          </div>
          
          
    
               
          
		 
           <button class="btn btn-primary btn-block " type="submit" class="btn" name="update">Update</button>		
        </form>
        
      </div>
    </div>
  </div> 
    
<?php
}
}
?>
     
				
			</div>
			
		
			   </div>
               
               
            </div>
         </div>

      </div>
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright ©talentbeehive.com 2017</small>
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
            <a class="btn btn-primary" href="candidate-logout.php">Logout</a>
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
		
  </div>
</body>

</html>
