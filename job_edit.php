<?php
session_start();

if(!isset($_SESSION['email']))
	header('location:company-login.php');

require_once "config1.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";

if(isset($_SESSION['email'])) 
{
	//$id=$row['id'];
	$query = "select * from functionality where id=$id";
$data = mysqli_query($DB,$query);
$rec = mysqli_fetch_array($data);


//$fetchyear = "select year from functionality where id=1";
//$data = mysqli_query($DB,$fetchyear);
//$rec = mysqli_fetch_array($data);

$year1=$rec['year'];
list($from ,$to) = explode("-", $year1);
//echo "oooooooooooooooooooooooooooooooo".$from;
//echo "oooooooooooooooooooooooooooooooo".$to;

list($fromyear,$frommonth)=explode(".",$from);
list($toyear,$tomonth)=explode(".",$to);
//echo $fromyear."<br>";
//echo $frommonth."<br>";
//echo $toyear."<br>";
//echo $tomonth."<br>";



date_default_timezone_set("Asia/Kolkata");
$dt=date("d-m-y")."/".date("h:i:sa");
		//$query1 = "update users set cname='$cname',email='$email',clogo='$imagename',cinfo='$cinfo',cweb='$cweb',type='$type',cloc='$cloc',person='$person',number='$number',lnumber='$lnumber' where id =" .$id;
		
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  
  <script src="jquery.min.js"></script>
  <script type="text/javascript">


  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2997357690787675",
    enable_page_level_ads: true
  });
</script>
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
        <form method="post" action="j_updation.php" enctype="multipart/form-data">
		      <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label class="control-label">Type:</label> <?php echo $rec['type'];?>
              </div>
              <div class="col-md-2">
                <label class="radio-inline"><input type="radio" name="type" value="Full Time"  <?php echo ($rec['type']=="Full Time")?'checked':''?> >Full Time</label>
              </div>
              <div class="col-md-2">
               <label class="radio-inline"><input type="radio" name="type" value="Part Time"   <?php echo ($rec['type']=="Part Time")?'checked':''?>>Part Time</label>
              </div>
              <div class="col-md-4">
               <label class="radio-inline"><input type="radio" <?php echo ($rec['type']=="Full Time/Part Time")?'checked':''?> name="type" value="Full Time/Part Time">Full Time/Part Time</label>
              </div>
            </div>
          </div><!--end form-group-->
            
		    <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputJT">Job Title</label>
                <input class="form-control" id="exampleInputJT" type="text"  value="<?php echo $rec['title'];?>" placeholder="Enter title" name="title" title="required">
              </div>
             
             <div class="col-md-6">
                <label for="exampleInputcomapnyname">Company Name</label>
                <p class="form-control"><?php echo $_SESSION['name'];?>
                <input class="form-control" id="exampleInputcompanyname" type="hidden"  placeholder="<?php echo $rec['name'];?>" name="name" value="<?php echo $_SESSION['name'];?>" >
              </div>
             <input  type="hidden"  name="id" value="<?php echo $_GET['id'];?>">
         
            </div>
          </div>
		   
              
		     <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputFR">Functional Role</label>
              <select id="exampleInputFR" class="form-control" value="role" name="role">
              <option value="<?php echo $rec['role'];?>" selected><?php echo $rec['role'];?></option>
                		 
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
                  <input class="form-control" id="exampleInputPositions" type="text"  value="<?php echo $rec['openings'];?>" name="openings">
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
                <input class="form-control" id="exampleInputPositions" type="text"  value="<?php echo $rec['skills'];?>" name="skills">
              </div>
             
            </div>
        </div>
		  
		    <div class="form-group">
				    	
				  <label for="exampleInputAT">Application Type &nbsp;&nbsp;</label>	<?php echo $rec['atype'].$rec['year']; ?>
					 <select  class="form-control" id='ex-drop' name = "atype" required>  
                          <option value="<?php echo $rec['atype'];?>"><?php echo $rec['atype'];?></option>
                          <option value='Fresher'>Fresher</option>
                          <option value='Experienced'>Experienced</option>
    
                     </select>
        </div>
				 <div class="row">
          <div class="col-lg-3 form-group">
          <!--<input type="text" class="form-control" name='year' id='year' placeholder="eg. 0 to 1 Yrs">-->
            <select class="form-control" id="year"  name="year1" >
              <option value="<?php echo $fromyear; ?>" selected>
                <?php 
                $query = $DB->query("SELECT num FROM experience");
    
            //Count total number of rows
          $rowCount = $query->num_rows;
        //  echo $rowCount;

        
                echo $fromyear;
                ?>
              </option>
              <?php
             if($rowCount > 0)
              {
                  while($getnumber = $query->fetch_assoc()){ 
                    echo '<option value="'.$getnumber['num'].'"  >'.$getnumber['num'].'</option>';}
              }else{
                echo '<option value="">not available</option>';
                }
              ?>
          </select>
       
           </div>
            <div class="col-lg-3 form-group">
        <!--<label class="form-control"> eg. 0 to 1 Yrs</label>-->
            <select class="form-control" name='month1' id='months' >
               <option value="<?php echo $frommonth; ?>" selected>
                <?php 
                $query = $DB->query("SELECT num FROM experience");
    
            //Count total number of rows
                  $rowCount = $query->num_rows;
        //  echo $rowCount;

                  echo $frommonth;
                ?>
              </option>
              <?php
             if($rowCount > 0)
              {
                  while($getnumber = $query->fetch_assoc()){ 
                    echo '<option value="'.$getnumber['num'].'"  >'.$getnumber['num'].'</option>';}
              }else{
                echo '<option value="">not available</option>';
                }
              ?>
              </select>
           </div>

          
        

           <div class="col-lg-3 form-group">
          <!--<input type="text" class="form-control" name='year' id='year' placeholder="eg. 0 to 1 Yrs">-->
            <select class="form-control" name='year2' id='year'>
              <!--<option selected="<?php echo $toyear; ?>" selected disabled>year</option>-->
                  <option value="<?php echo $toyear; ?>" selected>
                <?php 
                $query = $DB->query("SELECT num FROM experience");
    
            //Count total number of rows
                  $rowCount = $query->num_rows;
        //  echo $rowCount;

                  echo $toyear;
                ?>
              </option>
              <?php
             if($rowCount > 0)
              {
                  while($getnumber = $query->fetch_assoc()){ 
                    echo '<option value="'.$getnumber['num'].'"  >'.$getnumber['num'].'</option>';}
              }else{
                echo '<option value="">not available</option>';
                }
              ?>   </select>
           </div>
           <div class="col-lg-3 form-group">
          <!--<input type="text" class="form-control" name='year' id='year' placeholder="eg. 0 to 1 Yrs">-->
            <select class="form-control" name='month2' id='months'>
            <option value="<?php echo $tomonth;?>" selected>
                <?php 
                $query = $DB->query("SELECT num FROM experience");
    
            //Count total number of rows
                  $rowCount = $query->num_rows;
        //  echo $rowCount;

                  echo $tomonth;
                ?>
              </option>
              <?php
             if($rowCount > 0)
              {
                  while($getnumber = $query->fetch_assoc()){ 
                    echo '<option value="'.$getnumber['num'].'"  >'.$getnumber['num'].'</option>';}
              }else{
                echo '<option value="">not available</option>';
                }
              ?>         </select>
           </div>
           </div><!--row end-->
			
			
			
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
             //   echo $getstatename['statename'];?>
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
	          <option value="<?php echo $rec['cityname'] ?>" selected><?php 
                $getcity=mysqli_query($DB, "select * from city where c_id=".$rec['city']);
               $getcityname = mysqli_fetch_array($getcity);
              // echo $getcityname['cityname'];?>
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

            <label for="exampleInputJD">Job Description</label>
            <textarea class="form-control" id="exampleInputJD"   name="description" rows="8" cols="20" required><?php echo $rec['description'];?></textarea>
          </div>  
         
          <button class="btn btn-primary btn-block" name="update" value="Save">Update Post</button>
		  <!--<?php echo $msg; ?>-->
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
   
  
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
   <!--<script src="js/dropdown1.js"></script>-->
   
  </div>



</body>

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
</html>
