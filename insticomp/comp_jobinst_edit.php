<?php
session_start();

if(!isset($_SESSION['email']))
	header('location:company-login.php');

require_once "../config1.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";

if(isset($_SESSION['email'])) 
{
	//$id=$row['id'];
	$query = "select * from company_jobinstitute where id=$id";
$data = mysqli_query($DB,$query);
$rec = mysqli_fetch_array($data);

date_default_timezone_set("Asia/Kolkata");
$dt=date("d-m-y")."/".date("h:i:sa");
		
}

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
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link href="css/bootstrap-multiselect.css" rel="stylesheet">
  <script src="../jquery.min.js"></script>
  <script type="text/javascript">


  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2997357690787675",
    enable_page_level_ads: true
  });
</script>

 <script type="text/javascript">
$(document).ready(function(){


     $('#qualification').multiselect({
          buttonWidth: '260px',
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
      <div class="card-header">Job post For institute</div>
      <div class="card-body">
        <form method="post" action="comp_jobinst_update.php?id=<?php echo $id;?>" enctype="multipart/form-data">
        <!--<form method="post" enctype="multipart/form-data">-->
		      <div class="form-group"><!-- type -->
            <input  type="hidden"  name="id" value="<?php echo $_GET['id'];?>">


            <div class="form-row">
              <div class="col-md-3">
                <label class="control-label">Type:</label> 
              </div>
              <div class="col-md-4">
                <label class="radio-inline"><input type="radio" name="jtype" value="Internship" <?php echo ($rec['jtype']=="Internship")?'checked':''?> >Internship</label>
       </div>
        <div class="col-md-4">
          <label class="radio-inline"><input type="radio" name="jtype" value="Full time trainee" <?php echo ($rec['jtype']=="Full time trainee")?'checked':''?> >Full time trainee</label>
              </div>
            </div>
          </div><!-- type form-group-->
          
          
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
          
      	<!-- designation -->
      	<div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputJT">Designation</label>
                <input class="form-control" id="exampleInputDesignation" type="text"  value="<?php echo $rec['designation'];?>" placeholder="Enter Designation" name="designation" title="required" required>
              </div>
            </div>
		    </div>
      

             

       
          <!-- openings-->
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Openings</label>
       
                <input class="form-control" id="exampleInputOpenings" type="text" name="openings" value="<?php echo $rec['openings'];?>">  
                     </input>
                
              </div>
             
            </div>
          </div>
      

        <div class="form-group">
          <div class="form-row">  
		                 
            <div class="col-md-3">
                <label class="control-label"> Salary offered:</label> 
            </div>
            <div class="col-md-3">
                <label class="radio-inline"><input type="radio" name="salarytype" value="Stipend" <?php echo ($rec['salarytype']=="Stipend")?'checked':''?> >Stipend</label>
       	    </div>
            <div class="col-md-3">
          	<label class="radio-inline"><input type="radio" name="salarytype" value="Salary" <?php echo ($rec['salarytype']=="Salary")?'checked':''?> >Salary</label>
            </div>
            <div class="col-md-3">
          	<input type="text" class="form-control" id="exampleInputSalary" name="salary" value="<?php echo $rec['salary']; ?>" >
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
            <label for="exampleInputLocation">State</label>
                
            <select class="form-control" id="state"  name="state" placeholder="*state" required>
		          <option value="<?php echo $rec['state']; ?>" selected><?php 
                $getState=mysqli_query($DB, "select statename from state where id=".$rec['state']);
                $getstatename = mysqli_fetch_array($getState);
                echo $getstatename['statename'];?>
              </option>
        
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
						   <select  class="form-control" id="city" name="city" required>
	          <option value="<?php echo $rec['city'] ?>" selected><?php 
                $getcity=mysqli_query($DB, "select * from city where c_id=".$rec['city']);
               $getcityname = mysqli_fetch_array($getcity);
               echo $getcityname['cityname'];?>
               </option>
               <?php
                if($rowCount > 0)
                {
                  while($getC = $getcity->fetch_assoc())

                  { 
                              
                    echo '<option value="'.$getC['c_id'].'">'.$getC['cityname'].'</option>'; 
                  }
                }else{
            echo '<option value="">State not available</option>';
                     }
            ?>	
 </select>
					</div>
			</div>
			</div>

      <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputPositions">Special Requirement</label>
                <input class="form-control" id="exampleInputSR" type="text"  value="<?php echo $rec['requirement'];?>" name="requirement" required>
              </div>
             
            </div>
        </div>

        <div class="form-group">
          <div class="form-row">
              <div class="col-md-12">
            
            <label for="exampleInputJD">Job Description</label>
            <textarea class="form-control" id="exampleInputJD" name="description" rows="8" cols="80" required><?php echo $rec['description'];?></textarea>
              </div>
          </div>
        </div>

        
        <button class="btn btn-primary btn-block" name="update" value="Save">Update Post</button>		  <!--<?php echo $msg; ?>-->
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
   
  
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
   
  </div>



</body> 
 <script src="../js/jquery.min.js"></script>

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

</html>
