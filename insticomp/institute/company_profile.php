<?php

session_start();

if(! isset($_SESSION['email']))
header('location: company-login.php');

 include('../config1.php');
$q="select * from users where email='{$_SESSION['email']}'";
$result=mysqli_query($DB,$q);

$q1="select count(*) as maxid from functionality where name='{$_SESSION['name']}'";
$result1=mysqli_query($DB,$q1);
$row = mysqli_fetch_array($result1);
$maxid = $row['maxid'];
echo " ".$maxid;
//$q2="select count(*) as maxid from candidate_job_applied where com_name='{$_SESSION['name']}' and status='applied'  OR status='onhold' OR status='rejected' OR status='Video'";
$q2="select count(*) as maxid from candidate_job_applied where com_name='{$_SESSION['name']}' and status='applied'";
$result2=mysqli_query($DB,$q2);
$row2 = mysqli_fetch_array($result2);
$maxid2 = $row2['maxid'];
//echo " ".$maxid;

$q4="select count(*) as maxid from candidate_job_applied where com_name='{$_SESSION['name']}' and status='shared'";
$result4=mysqli_query($DB,$q4);
$row4=mysqli_fetch_array($result4);
$maxid4=$row4['maxid'];


/*$result1=mysqli_query($con,$q1);
while($row1= mysqli_fetch_array($result1))
{
    $options = $options."<option>$row1[1]</option>";
}*/

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
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card">
            <div class="card-body">
             
              <div class="mr-5">Job Post</div>
            </div>
            <a class="card-footer text-white clearfix small z-1  bg-info" href="job_post_details.php">
              <span>Total Job Post<span class="badge pull-right"><?php echo $row['maxid'];?></span></span>
             
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card">
            <div class="card-body">
             
              <div class="mr-5">Applied </div>
            </div>
            <a class="card-footer text-white clearfix small z-1 bg-success" href="candidate-applied.php">
              <span>Total Applied Candidate<span class="badge pull-right"><?php echo $row2['maxid'];?></span></span>
             
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card">
            <div class="card-body">
              
              <div class="mr-5">Shorlisted</div>
            </div>
			<?php
			$q3="select count(*) as maxid from candidate_job_applied where com_name='{$_SESSION['name']}'  and status='shortlisted' ";
$result3=mysqli_query($DB,$q3);
$row3 = mysqli_fetch_array($result3);
$maxid3= $row3['maxid'];
//echo " /n/n/n/n/n".$maxid3;
?>
            <a class="card-footer text-white clearfix small z-1 bg-warning" href="candidate-shortlist.php">
              <span>Total Shorlisted Candidate<span class="badge pull-right"><?php echo $row3['maxid'];  ?></span></span>
             
            </a>
          </div>
        </div>
		<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card">
            <div class="card-body">
              
              <div class="mr-5">Shared Profile</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" style="background-color:red"href="shared-profile.php">
              <span>Shared Profile View<span class="badge pull-right"><?php echo $row4['maxid'];?></span></span>
             
            </a>
          </div>
        </div>
        
      </div>
   
   
      
      <div class="row">
	   <?php
	    
		if($num>0)
		{
	    $row2 = mysqli_fetch_array($result) 
			?>
			
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3 ">
            <div class="card-header">
			<div class="row">
                <div class="col-sm-11">
              <i class="fa fa-user" aria-hidden="true"></i> Company Profile
			  </div>
			   
			  </div>
			</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-2">
                  <img src="<?php echo '../uploads/' .$row2['clogo'] ?>" width="115px" height="65px" >
                </div>
                <div class="col-sm-10">
                  <div id="editLabel" class="h4 mb-0 text-primary"><?php echo $row2['cname'] ;?></div>
                  <div id="editpara" class="mb-0"><?php echo $row2['type'] ;?></div>
                  
                  
                    <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row2['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row2['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
						 
                   <div id="editpara" class="mb-0"><?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?></div>
				  <hr>
				  <p id="editpara"><?php echo $row2['cinfo']  ;?> </p>
				   <div id="editweb" class="mb-0 text-primary"><a href="<?php echo $row2['cweb'] ;?>" > <?php echo $row2['cweb'] ;?></a></div>
                 <button id="editsaveCompany" type="button" class="btn btn-success btn-sm">Save</button>
			   <button id="editcancelCompany" type="button" class="btn btn-default btn-sm">Cancel</button>
                </div>
              </div>
			  	
            </div>
           
          </div>
          
          
            <div class="card mb-3 ">
            <div class="card-header">
				<div class="row">
					<div class="col-sm-11">
						<i class="fa fa-user" aria-hidden="true"></i> Company Presentation
					</div>			   
				</div>			   
			</div>
		  
		  <?php
							  if ( $row2['video'] == "")
							  {
					
							  ?>
		  
		  
			
			<div class="row">
			<div class="col-sm-5"></div>
					<div class="col-sm-7">
				   <div  class="mt-2 text-primary" style="align:right">Presentation Not Uploaded</div>
				   <br>
				   <!--class="fa fa-check"-->
				   </div>	 
				 </div>
				    <?php
							  }
							  else
							  {
		                      ?>
            <div class="card-body">
              <div class="row">
			  <div class="col-sm-5"> </div>
                <div class="col-sm-2">
				
				<a id="uploadresumebtn"  class="btn  btn-default view-pdf  btn-sm  pull-right" style="cursor:pointer" href="<?php echo 'uploads/' .$row2['video'];?>">View Presentation</a>
				<!--<a href="<?php //echo 'resume/'.$row['res']; ?>"><?php //echo 'uploads/'.$row2['video']; ?></a>
				<video controls controlsList="nodownload" src="<?php //echo 'uploads/'.$row2['video'] ?>"  height="300px"  width="200px"/>
                  <img src="<?php //echo 'uploads/' .$row2['clogo'] ?>" width="300px" height="200px" >--> 
                </div>
                
              </div>
              <br>
<?php
							  }
							  ?>			  
            </div>
       </div>
		  <?php 
		}
		?>
   
          </div>
          <!-- /Card Columns-->
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
            <a class="btn btn-primary" href="company-logout.php">Logout</a>
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
  </div>
</body>

</html>
