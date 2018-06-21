<?php
  //$con=mysqli_connect('localhost','root','');
  
  
  
  // Database Connection
  
$con=mysqli_connect('localhost', 'roottalent','beehive@root');
        mysqli_select_db($con,'socialuser');
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
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="../css/sb-admin.css" rel="stylesheet">
      <link href="css/bootstrap-multiselect.css" rel="stylesheet">
       <script src="../jquery.min.js"></script>
      <script type="text/javascript">
$(document).ready(function(){


    $('#qualification').on('change',function(){		
        var qualificationID = $(this).val();
		
		//alert (qualificationID);
		
        if(qualificationID){
            $.ajax({
                type:'POST',
                url:'../ajaxData.php',		
                
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
                url:'../ajaxData.php',		
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
                url:'../locationData.php',		
                
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
   
          
   <body id="page-top">
   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
     <a class="navbar-brand" href="index.php"><img src="../img/works/talent.png" height="40px" width="200px" alt=""></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      
    
    <li class="nav-item">
          <a class="nav-link" >
            <i ></i>About us</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" >
            <i></i>Blog</a>
        </li>
      </ul>
    </div>
  </nav>



      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="#">Student Registration Form</a>
               </li>
               <li class="breadcrumb-item active">View</li>
            </ol>-->
             <br><br><br><br><br>
		<div class="container">
    <div class="card card-register">
      <div class="card-header heading1">Student Registration Form</div>
      <div class="card-body">
       <form action="student-registration-db.php" method="post"  enctype="multipart/form-data">
          <div class="form-group">
            
			  
	<div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Name of Student<span class="req"> *</span> </label>
                <input class="form-control" name="cname" id="cname" type="text" pattern="[a-zA-Z]+\.?[a-z,A-Z\s]{3,50}" title="should contain minimum four characters and maximum 50 characters, Numbers are allowed but special characters are not allowed" placeholder="*student Name" required>
              </div>              
            </div>
          </div>
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>College<span class="req"> *</span> </label>
                <select  id="institute_id" name="institute_id" class="form-control" required>
					<option value="" disabled selected>SELECT</option>															
					
					<?php
$sql1 = mysqli_query($con, "SELECT * From institute_registration");
$ro1 = mysqli_num_rows($sql1);

while ($ro1 = mysqli_fetch_array($sql1)){
?>
 <option value="<?php echo $ro1['id'] ;?>"><?php echo $ro1['institute_name'] ;?></option>
       
       
        
<?php
}
?>
	

				</select>
              </div>              
            </div>
          </div>
          
          <div class="form-group">
            <div class="form-row">                            
               <div class="col-sm-2" >
 <label>Gender </label>
  </div> 
                <div class="col-sm-4">
            <label>
                 <input name="gender" style="margin-top:12px" id="gender" value="Male" type="radio" />Male
             </label>
        </div>
        <div class="col-sm-4" >
             <label>
                  <input name="gender"style="margin-top:12px"  id="gender" value="Female" type="radio" />Female
             </label>
         </div>
              </div>
            </div>
          </div>
          
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Email<span class="req"> *</span></label>
                <input class="form-control" type="email" name="email2" id="email2" pattern="[a-zA-Z0-9]+\.?[a-zA-Z0-9]+@[A-Za-z0-9.-]+\.[a-z]{2,3}" title="Must contains characters@characters.domain" placeholder="info@talentbeehive.com" required>
              </div>             
            </div>
          </div>
          
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Contact Number<span class="req"> *</span> </label>
               	 	 <div class="form-row">
              		  <div class="col-md-3">
              		  <input class="form-control" type="text" name="mnumber" value="+91" readonly="">
              		  </div>
              		   <div class="col-md-9">
              		 <input class="form-control" type="text" name="num" pattern="[6-9]{1}[0-9]{9}" title="should contain exact 10 digit, start with range between 6-9." placeholder="Mobile Number" required>
              		  </div>
              		  </div>	
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Birth Date<span class="req"> *</span></label>
                <input class="form-control" type="date" name="dob" id="dob" placeholder="*Birth Date" required="" required>
              </div>
            </div>
          </div>
          
          
          
           <?php
    
    
    
    $query = $con->query("SELECT * FROM state");
    
   
    $rowCount = $query->num_rows;
    ?>	
          	<div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
              <label for="states">State<span class="req"> *</span></label>
              <select id="state" class="form-control" name="state" required>
               <option value="" disabled selected>-----select state---</option>
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
              <div class="col-md-6">
              <label for="city">City<span class="req"> *</span></label>
              <select id="city" class="form-control" name="city" required>
               <option value="" disabled selected>----Select----</option>      		 
            
                        
            </select>
              </div>
              </div>
              </div>
          
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputLastName">10th Percentage<span class="req"> *</span></label>
                <input class="form-control" type="text" name="ssc" placeholder="*10th Percentage" pattern="[0-9.]{2,5}" title="should contain Numbers but special characters are not allowed" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">12th Percentage<span class="req"> *</span></label>
               <input class="form-control" type="text" name="hsc" placeholder="*12th Percentage" pattern="[0-9.]{2,5}" title="should contain Numbers but special characters are not allowed" required>
              </div>
            </div>
          </div>
          
          
         
          
         <div class="form-group">
            <div class="form-row">
             <div class="col-md-12">
            
             <?php
    
    
    
                       $query = $con->query("SELECT * FROM qualification");
    
   
                        $rowCount = $query->num_rows;
                      ?>
             <div class="col-md-12 form-group">
               <label>Qualification<span class="req">*</span> </label>
              <select class="form-control" name="qualification" id="qualification" required>
                         <option value="" disabled selected>Select qualification</option>
                         
                         
                         <?php
             if($rowCount > 0){
            while($getQualification = $query->fetch_assoc()){ 
            
            
            
                echo '<option value="'.$getQualification['id'].'">'.$getQualification['qualification'].'</option>';  
            }
            }else{
                 echo '<option value="">Qualification not available</option>';
            }
                        ?>
                            </select>
             
             </div>
       </div>
    </div>
    
    
     <div class="form-group">
            <div class="form-row">
             <div class="col-md-6 form-group">
               <label>Course</label>
              <select class="form-control" name="course" id="course" required>
                         <option value="" disabled selected>Select qualification first</option>
                         
                         
                         
                       
                            </select>
             
             </div>
           
            
            <div class="col-md-6 form-group">
               <label>Specialization</label>
             <select class="form-control" name="specialization" id="specialization" required>
                       <option value="" disabled selected>Select course first</option>
                        </select>
             
             </div>
          </div>   
          </div> 
          
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                 <label>Languages known<span class="req"> *</span> </label>	
                		<div class="form-row">
              		  <div class="col-md-3">
              		   <label>
                 <input  type="checkbox" name="language" value="English" />English
             </label>
              		  </div>
              		   <div class="col-md-3">
              		  <label>
                  <input  type="checkbox" name="language1" value="Hindi"  />Hindi
             </label>
              		  </div>
              		   <div class="col-md-3">
              		<label>
                  <input  type="checkbox" name="language2" value="other" />Other
             </label>
              		  </div>
              		  </div>	
              </div>
              <div class="col-md-6">
                <label class="lregister pull-left">Upload Resume<span class="req"> *</span></label>
                <input type="file" class="form-control-file" name="clogo"  id="clogo" aria-describedby="fileHelp" onchange="load_image(this.id,this.value)" required>
              <small id="fileHelp" class="form-text text-muted pull-left">*pdf/doc</small>
              </div>
            </div>
          </div>
          
          
          
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
               <label>Upload Video Resume </label>
                 <input type="file" class="form-control-file" name="video" id="video"  placeholder="video">
                  <small id="fileHelp" class="form-text text-muted pull-left">*mp4/avi/ppt</small>
              </div>
              <div class="col-md-6">
               <label>Upload Photo </label>
                <input type="file" class="form-control-file" name="photo" id="photo"  placeholder="photo">
                 <small id="fileHelp" class="form-text text-muted pull-left">*jpg/png/jpeg</small>
              </div>
            </div>
          </div>
	
          
         
           
          
		 
         
           <button class="btn btn-primary btn-block" type="submit" class="btn" name="btnregister">Preview Profile</button>
        </form>
        
      </div>
     
    </div>
  
  </div>
    
  
  
         </div>
         
      </div>
      
      </div>
      
       <!-- Logout Modal-->
         <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                     <a class="btn btn-primary" href="institute_login.php">Logout</a>
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
      <script src="../jquery.min.js"></script>
      
 <script src="../js/dropdown1.js"></script>
      <script src="../js/show-hide-collapse.js"></script>
  <script src="../js/bootstrap-multiselect.js"></script>



   </body>
</html>