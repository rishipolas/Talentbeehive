<?php

include 'config1.php';




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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
     

<style>
.scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
    

.ScrollStyle
{
    max-height: 150px;
    overflow-y: scroll;
}


.wrapper{
width:200px;
padding:20px;
height: 150px;
}
    </style>


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
     <?php
 include("company_header.php");
 ?>
 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     
      
      <div class="container" style="padding-bottom:10px;">
    <div class="card card-register">
      
      <div class="card-body">
        <form method="post" action="form.php" enctype="multipart/form-data">
    
        
       
              
        
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
       
    <i class="fa fa-check btn btn-success" onclick="myFunction()">Click here</i>               

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
                    <select class="form-control course_select_parent" name="course[]" id="course" multiple="multiple" >  
                     </select>
   
      <i class="fa fa-check btn btn-success" onclick="myFunction1()">Click here</i>                    
     
     
              </div>
             
            </div>
          </div>
      
      
      <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Specialization</label>
       
                <select class="form-control specialization_select_parent" name="specialization[]" id="specialization" multiple="multiple" >  
                     </select>
                
              </div>
             
            </div>
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
  <script src="js/bootstrap-multiselect.js"></script>


<script>
function myFunction() {
    var qualificationID  = $('#qualification').val();
    
        if(qualificationID){
             $.ajax({
                type:'POST',
                url:'ajaxData.php',
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
                url:'ajaxData.php',
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

</body>

</html>