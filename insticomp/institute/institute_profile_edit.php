<?php 


include('config1.php'); 

session_start();
   
   if(! isset($_SESSION['email']))
   header('location: institute_profile.php');
//$id = isset($_REQUEST['id']) ? $_GET['id'] : "0"; 
$q="select * from institute_registration where email='{$_SESSION['email']}'";
$result=mysqli_query($DB,$q);
//$num=mysqli_num_rows($result);

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
       <script src="../jquery.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
            $('#qualification').multiselect({
                   buttonWidth: '260px',
                   maxHeight: 300,
                  
                 });
            
             $('#course').on('change',function(){
                
             });
                 
                    
              
         });
      </script>
      
   </head>
   
          
   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
<?php include('institute_header.php'); ?>
      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="institute_profile.php">Dashboard</a>
               </li>
               <li class="breadcrumb-item active">Profile Edit</li>
            </ol>
             <?php
			
	  
	$row2=mysqli_fetch_array($result);
		
?>
		<div class="container">
    <div class="card card-register">
      <div class="card-header heading1">Edit Profile</div>
      <div class="card-body">
       <form action="institute-update-dbs.php" method="post"  enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Institute Name</label>
                 
                <input class="form-control" id="institutename" name="institutename" type="text" value="<?php echo $row2['institute_name']; ?>" pattern="[a-zA-Z]+\.?[a-z,A-Z\s]{4,50}" title="should contain minimum four characters and maximum 50 characters, Numbers are allowed but special characters are not allowed" placeholder="Institute Name">
              </div>
              <input type="hidden" name="id" value="<?php echo $row2['id'];?>">
			  </div>
			  </div>
			  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputLastName">Website</label>
                <input class="form-control" id="website" name="website" type="text" value="<?php echo $row2['website_url']; ?>" pattern="w{3}\.[a-z-\]+\.?[a-z-\]{1,2}(|\.[a-z]{1,2})" title="website URL"  placeholder="Website URL">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Email ID</label>
                <input class="form-control" id="email" name="email" type="text" value="<?php echo $row2['email']; ?>"pattern="[a-zA-Z0-9]+\.?[a-zA-Z0-9]+@[A-Za-z0-9.-]+\.[a-z]{2,3}" placeholder="Email ID" readonly>
              </div>
            </div>
          </div>
	
          
         
           <?php
    
    
    
    $query = $DB->query("SELECT * FROM state");
    
   
    $rowCount = $query->num_rows;
    ?>	
		<div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
              <label for="states">State</label>
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
              <label for="city">City</label>
              <select id="city" class="form-control" name="city" required>
               <option value="" disabled selected>----Select----</option>      		 
            
                        
            </select>
              </div>
              </div>
              </div>
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                 <label for="exampleInputPassword1">Contact Person Name</label>
            <input class="form-control" id="cntperson" name="cntperson" value="<?php echo $row2['contact_person']; ?>" type="text" pattern="[a-zA-Z]+\.?[a-z,A-Z\s]{4,50}" title="should contain minimum four characters and maximum 50 characters, Numbers are allowed but special characters are not allowed" placeholder="Contact Person Name">
              </div>
               
              <div class="col-md-6">
                <label for="exampleInputPassword1">Contact Number</label>
                
               
            <input class="form-control" id="cntnumber" name="cntnumber" value="<?php echo $row2['mobile']; ?>" type="digits" placeholder="Contact Number">
              </div>
            </div>
          </div>
		  
		   <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
                <label for="landlinenumber">Landline Number</label>
            <input class="form-control" id="landlineNumber" name="landlineNumber" type="digit" placeholder="landlineNumber" value="<?php echo $row2['landline']; ?>" >
              </div>
              
              </div>
              <br>
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
                           <select size="5" class="form-control"  name="qualification[]" id="qualification" multiple="multiple" onclick="myFunction2()" value="<?php echo $row2['qualifications'];?>" required >
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
                           &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<select class="form-control course_select_parent " name="course[]" id="course" multiple="multiple" value="<?php echo $row2['courses'];?>" >  
                           </select>
                           <!-- <a class="btn btn-primary" id="show1" onclick="myFunction1()">Next</a> -->
                        </div>
                     </div>
                  </div>  
              
			
               
              
              
              
              
            </div>
          </div>
		  
		   <div class="form-group">
            <div class="form-row">
			<div class="col-md-6">
                <label for="exampleInputFile">Institute Logo</label>
    <input type="file" class="form-control-file" id="clogo" aria-describedby="fileHelp" name="clogo" >
    <small id="fileHelp" class="form-text text-muted">*.jpeg  *.png</small>
              </div>
			
              <div class="col-md-6">
                <label for="exampleInputFile">Institute Presentation</label>
    <input type="file" class="form-control-file" id="video" aria-describedby="fileHelp" name="video" >
    <small id="fileHelp" class="form-text text-muted">*.pdf  *.ppt *video</small>
              </div>
             
            </div>
          </div>
		  
          
		 
         
           <button class="btn btn-primary btn-block " type="submit" class="btn" name="update">Update</button>
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
      
   <script src="../js/edit.js"></script>
      <script src="../dropdown1.js"></script>
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
                             buttonWidth: '260px',
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
                             buttonWidth: '260px',
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

      
      
      <script type="text/javascript">
                     
$(document).ready(function(){


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
   </body>
</html>