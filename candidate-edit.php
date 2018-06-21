<?php
session_start();

if(!isset($_SESSION['userid']))			
	header('location:login.php');


require_once "config1.php";
$msg = "";
$id = isset($_REQUEST['id'])?$_REQUEST['id'] : "0";		

if(isset($_POST['btnSubmit'])) {
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
//$contact = $_REQUEST['contact'];
$contact=$_POST['mcontact']."-".$_POST['cnum'];
$location = $_REQUEST['location'];
$state=$_POST['state'];
$city=$_POST['city'];
$qualification = $_POST['qualification'];
$course = $_POST['course'];
$specialization = $_POST['specialization'];
$application = $_REQUEST['application'];
$months = $_REQUEST['months'];
$year = $_REQUEST['year'];
$role = $_REQUEST['role'];
$marital = $_REQUEST['marital'];



$query1 = "update candidate set name='$name',email='$email',contact='$contact',location='$location',state='$state',city='$city',qualification='$qualification',course='$course',specialization='$specialization',application='$application',months='$months',year='$year',role='$role',marital='$marital' where id =".$id;
if(mysqli_query($DB,$query1)){
header("location:candidate-display.php");
} else {
$msg = "Unable to Update!";
}

}




$query = "select * from candidate where id=".$id;
$data = mysqli_query($DB,$query);
$rec = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Template</title>
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
       
        
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsadmin" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Admin</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseComponentsadmin">
            <li>
              <a href="admin-insert.php">Insert</a>
            </li>
            <li>
              <a href="admin-display.php">Display</a>
            </li>
          </ul>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentscompany" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Company</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponentscompany">
            <li>
              <a href="company-insert.php">Insert</a>
            </li>
            <li>
             <a href="company-display.php">Display</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentscandidate" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Candidate</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponentscandidate">
            <li>
              <a href="candidate-insert.php">Insert</a>
            </li>
            <li>
              <a href="candidate-display.php">Display</a>
            </li>
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentscandidateapp" data-parent="#exampleAccordion">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span class="nav-link-text">Candidate Applied</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseComponentscandidateapp">
            <li>
              <a href="candidate-application-status.php">Display</a>
            </li>
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentscandidatepost" data-parent="#exampleAccordion">
            <i class="fa fa-building-o" aria-hidden="true"></i>
            <span class="nav-link-text">Company Applied Post</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseComponentscandidatepost">
            <li>
              <a href="company-job-post.php">Display</a>
            </li>
          </ul>
        </li>
        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        

        
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
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
      <div class="card-header">Candidate Edit</div>
      <div class="card-body">
      
       
      
        <form method="post">
		 <div class="form-group" >
            <label for="exampleInputName">Name</label>
            

           
            <input class="form-control" id="exampleInputName" pattern="[a-z,A-Z\s]{3,50}" type="text" aria-describedby="emailHelp" value="<?php echo $rec['name']; ?>" name="name">
          </div>
          <div class="row">
          <div class="form-group col-sm-6 field-wrap">
            <label for="exampleInputEmail1">Email address</label>
            
            
            <input class="form-control" id="exampleInputEmail1" pattern="[a-zA-Z0-9]+\.?[a-zA-Z0-9]+@[A-Za-z0-9.-]+\.[a-z]{2,3}" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $rec['email']; ?>">
          </div>
          
        
    
          
           				<?php
						$contact=$rec['contact'];
						list($mcontact, $cnum) = explode("-", $contact);
					?>
         					
		  			<div class="form-group col-sm-6 field-wrap">
		  			<label for="exampleInputEmail1">Contact Number</label>
		  			<div class="row">
	
	 
		  			
            					  <div class="col-sm-4">	
							<input class="form-control" id="exampleInputName" type="text" name="mcontact" value="<?php echo $mcontact ?>">
		 				  </div>
		 				  <div class="col-sm-8">	
							<input class="form-control" id="exampleInputMobile" type="text" name="cnum"  pattern="[6-9]{1}[0-9]{9}" title="should contain exact 10 digit, start with range between 6-9." placeholder="*contact Number" value="<?php echo $cnum ?>" >
		 				</div>
		 			</div>
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

		
		
		
	</div>	
	 
	
	
	<div class="row">	  
		   <div class="form-group col-sm-12 field-wrap">
            <label for="exampleInputUniversity">Application</label>
            <select  class="form-control" id='ex-drop' name ="application">  
                          <option value='Fresher'>Fresher</option>
                          <option value='Experienced'>Experience</option>
    
            </select>
          </div>
     
    <div>
 
          
          <div class="row">
           <div class="form-group col-sm-6 field-wrap">
            <label for="exampleInputUniversity">Months</label>
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
          
        
    
		<div class="form-group col-sm-6 field-wrap">
            <label for="exampleInpuPY">Year</label>
			<select class="form-control" name='year' id='year'>
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
          </div>
        
         
		  <div class="form-group">
            <label for="exampleInputSkill">Functional Role</label>
            <select id="exampleInputFR" class="form-control" name="role">
              <option value="" disabled  selected>----select----</option>
		 <option>Accounts / Finance / Tax / CS / Audit</option>
		  <option>Agent</option>
		   <option>Analytics & Business Intelligence</option>
					  <option>Architecture / Interior Design</option>
					  <option>Banking / Insurance</option>
					  <option>Beauty / Fitness / Spa Services</option>
					  <option>Content / Journalism</option>
					  <option>Corporate Planning / Consulting</option>
					  <option>CSR & Sustainability</option>
					  <option>Engineering Design / R&D</option>
					  <option>Export / Import / Merchandising</option>
					  <option>Fashion / Garments / Merchandising</option>
					  <option>Guards / Security Services</option>
					  <option>Hotels / Restaurants</option>
					  <option>HR / Restaurants</option>
					  <option>IT Software - Client Server</option>
					  <option>IT Software - Mainframe</option>
					  <option>IT - Middleware</option>
					  <option>IT Software - Mobile</option>
					  <option>IT Software - Other</option>
					  <option>IT Software - System Programming</option>
					  <option>IT Software - Telecom Software</option>
					  <option>IT Software - Application Programming / Maintenance</option>
					  <option>IT Software - DBA / Datawarehousing</option>
					  <option>IT Software - E-Commerce / EDA /VLSI /ASIC /Chip Des.</option>
					  <option>IT Software - ERP / CRM</option>
					  <option>IT Software - Network Administration / Security</option>
					  <option>IT Software - QA & Testing</option>
					  <option>IT Software - Systems / EDP / MIS</option>
					  <option>IT Hardware / Telecom / Technical Staff / Support</option>
					   <option>ITES / BPO / KPO / Customer Service / Operations</option>
					  <option>Legal</option>
					  <option>Marketing / Advertising / MR / PR</option>
					  <option>Packaging</option>
					  <option>Pharma / Biotech / Healthcare / Medical / R&D</option>
					  <option>Production / Maintenance / Quality</option>
					  <option>Purchase / Logistics / Supply Chain</option>
					  <option>Sales / BD</option>
					  <option>Secretary / Front Office / Data Entry</option>
					  <option>Self Employed / Consultants</option>
					  <option>Shipping</option>
					  <option>Site Engineering / Project Management</option>
					  <option>Teaching / Education</option>
					  <option>Ticketing /Travel / Airlines</option>
					   <option>Top Management</option>
					  <option>TV / Films / Production</option>
					  <option>Web / Graphic Design / Visualiser</option>
					  <option>Other</option>
					  <!--<option></option>
					  <option></option>
					  <option></option>
					  <option></option>
					  <option></option>-->
				  
          </select>
          </div>
	
	
	
		  
		  <div class="form-group">
			<div class="form-row">
              <div class="col-md-3">
                <label class="control-label">Marital Status:</label> 
              </div>
              <div class="col-md-4">
                <label class="radio-inline"><input type="radio" name="marital" value="married">Married</label>
			 </div>
			  <div class="col-md-4">
					<label class="radio-inline"><input type="radio" name="marital" value="unmarried" >Unmarried</label>
              </div>
            </div>
            <!--<input class="form-control" id="exampleInputSkill" type="text"value="<?php echo $rec['marital']; ?>" name="skillls">-->
          </div>

	
		  
          <button class="btn btn-primary btn-block" name="btnSubmit" value="Save">Insert</button>
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
            <button class="btn btn-primary" href="logout.php">Logout</button>
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
   
   
   </div>
  </div>
</body>

</html>
