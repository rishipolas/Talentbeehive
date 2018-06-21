<?php
session_start(); 
  
if(!isset($_SESSION['email']))
	header('location:company-login.php');

 include('config1.php');

$q="SELECT * FROM candidate INNER JOIN candidate_job_applied ON  candidate.id=candidate_job_applied.fk_can_id  where candidate.id=". $_POST['id']." AND candidate_job_applied.fk_func_id=".$_POST['fid'];
$result=mysqli_query($DB,$q);
$num=mysqli_num_rows($result);
//echo $_GET['fid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title>Talent Beehives</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php
  include('company_header.php');
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
             
   <?php
         if($num==1)
		   {
			    $row= mysqli_fetch_array($result) 
      ?>
      
      <div class="row">
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3 yellow-border">
            
			<h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; " >Personal</h4>
			
            <div class="card-body">
              <div class="row">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
								
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Name </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['name'];?></td>
                                 
                                </tr>
                              
                                   <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Email </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['email'];?></td>
                                 
                                </tr>
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Location </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px">
                                  			   
                    <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
		<?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?></td>
                                 
                                </tr>
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Mobile no </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['contact'];?></td>
                                 
                                </tr>
                               
                              
                            
                                
                              </tbody></table>
              </div>
            </div>
           
          </div>
   
          </div>
		   <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3 yellow-border">
            
			<h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; " >Education</h4>
			
            <div class="card-body">
              <div class="row">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
								
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Highest Qualification </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php //echo $row['qualification'];?>
								  <?php 
					     
                         $getqualification=mysqli_query($DB,"select qualification  from qualification where id=".$row['qualification']);
                         $getqualificationdetails = mysqli_fetch_array($getqualification);
						 echo $getqualificationdetails['qualification'];?>			  
								  </td>
                                 
                                </tr>
								 <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Course </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php //echo $row['qualification'];?>
								  <?php 
					    
                         $getcourse=mysqli_query($DB, "select course  from course where c_id=".$row['course']);
                         $getcoursedetails = mysqli_fetch_array($getcourse);
						 echo $getcoursedetails['course'];?>
								  </td>
                                 
                                </tr>
								 <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Specialization </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php //echo $row['qualification'];?>
								  <?php 
					    
                         $getspecialization=mysqli_query($DB, "select specialization  from specialization where s_id=".$row['specialization']);
                         $getspecializationdetails = mysqli_fetch_array($getspecialization);
						 echo $getspecializationdetails['specialization'];?>
								  </td>
                                 
                                </tr>
                              
                       
								
								
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Application Type</strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['application'];?></td>
                                 
                                </tr>
							
                               
                              
                            
                                
                              </tbody></table>
              </div>
            </div>
           
          </div>
   
          </div>
		   <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-1 yellow-border">
            
			<h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; " >Resume</h4>
			
            <div class="card-body">
              <div class="row">
                 <?php
							  if ( $row['res'] == "")
							  {
					
							  ?>
							   <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
                   <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Resume </strong></td>
				<td width="52%" align="left" valign="top" style="line-height:30px"><div  class="mt-2 text-primary">Resume Not Uploaded</div></td>
                                 
                                </tr>
				  <?php
							  }
							  else
							  {
		                      ?>
				
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
								
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Resume </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><div  class="mt-2 text-primary"><a href="<?php echo 'resume/' .$row['res'];?>">Resume</a><i class="fa fa-check" aria-hidden="true"></i></div></td>
                                 
                                </tr>
                                <?php
							  }
						
							  if ( $row['video'] == "")
							  {
					
							  ?>
                                   <tr>
                                  
							    
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Video </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><a class="btn btn-default" onclick="return confirm('Do You Really want to Request For video ');"  href="request1.php?status=Video&id=<?php echo $_POST['id'];?>&fid=<?php echo $row['fk_func_id']; ?>">Request Video Profile</a>
							  
                                </tr>
							  <?php
							  }
							  else 
							  {
		                      ?>
							 <tr>
                                  
							    
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Video </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><video controls controlsList="nodownload" class="btn btn-default video-profile btn-sm" href="<?php echo 'video/'.$row['video']?>" height="150px" width="150px" id="bgvideo">
                                                <source src="<?php echo 'video/' .$row['video'];?>" type="video/mp4">
                                             </video>
                                           </td>  
                                                
          
      
							
                                         			
                              </tr>
                             
                                <?php
							  }
							  ?>
							    
                                
                              </tbody></table>
							  
              </div>
            </div>
		
           
          </div>
          <!-- /Card Columns-->
        </div>
	<div class="col-lg-9">
		  <div class="card mb-3 yellow-border">
            
			
			
            <div class="card-body">
              <div class="row">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
								
                                 <tr>
                              <td width="62%" align="right" valign="bottom" style="line-height:30px">
             <div class="btn-group-sm pull-right">
                                             <a type="button" class="btn btn-success" href="shortlist.php?status='shortlisted'&id=<?php echo $_POST['id']; ?>&fid=<?php echo $row['fk_func_id']; ?>" onclick="return confirm('do you want to Shortlist <?php echo $row['name']; ?>?');">ShortList</a>
                                             
                                             <a type="button" class="btn btn-primary" href="candidate-jobs-status_c.php?status='onhold'&id=<?php echo $_POST['id'];?>&fid=<?php echo $row['fk_func_id']; ?>" onclick="return confirm('do you want to make onHold <?php echo $row['name']; ?>?');">On Hold </a>
									  <a type="button" class="btn btn-warning" href="candidate-jobs-status1_c.php?status='rejected'&id=<?php echo $_POST['id'];?>&fid=<?php echo $row['fk_func_id']; ?>" onclick="return confirm('do you want to Reject <?php echo $row['name']; ?>?');">Rejected</a>
											
                                         <!--   <a type="button" class="btn btn-danger" href="candidate-jobs-status2_c.php?status='delete'&id=<?php //echo $_POST['id'];?>&fid=<?php //echo $row['fk_func_id']; ?>" onclick="return confirm('do you want to Delete <?php echo $row['name']; ?>?');">Delete</a>   -->
                                          </div>
         </td>  
                              </tr>
                              
                                   
								
							
                                
                              </tbody></table>
              </div>
            </div>
           
          </div>
	</div>	

      </div>
	  <?php
}
?>
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
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
