<?php
session_start(); 
  require_once("config1.php");
if(!isset($_SESSION['email']))

	        echo ("<SCRIPT LANGUAGE='JavaScript'>	   
	                        window.location.href('company-login.php');
	                        </SCRIPT>");          
	//header("location:company-login.php");


//$con=myqli_connect('localhost','root');
//mysqli_select_db($con,'codexworld');
$q="select * from functionality where name='{$_SESSION['name']}' order by id desc";
$result=mysqli_query($DB,$q);
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
               <li class="breadcrumb-item active">Job Posted  <strong>(<?php echo $num; ?>)</strong></li>
            </ol>
				   <?php
     if($num>0)
     {
	for($i=1;$i<=$num;$i++)
	{
		$row=mysqli_fetch_array($result);
		$Status=$row['status'];
		
	?>	
            <div class="container">
               <div class="row">
				
                  <div class="col-md-9 col-md-offset-3">
                     <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="container jobpost-div mt-5">
                              <div class="row">
							  
                                 <div class="col-lg-12">
                                    <div class="post-title jobpost-title">
                                       <strong><?php echo $row['title'];?></strong><small> (<?php echo $row['type'];?>)</small><strong class="pull-right" style="font-size:11px">Posted on <?php echo $row['date'];?></strong>
                                    </div>
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-lg-1">
                                    
                                 </div>
                                 <div class="col-lg-10">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="post-des ">
                                             <strong>Company Name: </strong><span><?php echo $row['name'];?></span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des ">
                                            <strong>Functional Role: </strong><span><?php echo $row['role'];?></span>
                                          </div>
                                       </div>
                                    </div>
                                    <!---row--->
                                    <div class="row">
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-2">
                                            <strong>Number of Openings: </strong><span><?php echo $row['openings'];?></span>
                                          </div>
                                       </div>
									    <div class="col-lg-6 ">
                                          <div class="post-des mt-2">
                                             <strong>Application Type: </strong><span><?php echo $row['atype']; ?>(<?php echo $row['year']; ?>)</span>
                                          </div>
                                       </div>
                                       
                                    </div>
                                    <!---row--->
					<div class="row">
					<div class="col-lg-6 ">
                                          <div class="post-des mt-2">
                                            <strong>Qualification: </strong><!--<span><?php //echo $row['qualification'];?></span>-->
											<?php 
               
                         $str2 = $row['qualification'];	
						    $strs2=explode(",",$str2);
						     $st="";
							  foreach($strs2 as $q2){
							
							 $q1="select qualification from qualification where id='$q2'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['qualification'];
							   $st=$st.$c.", ";
							  }
							 
						echo $st;
                        
                        ?>
                                          </div>
                                       </div>
                                    
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-2">
                                            <strong>Course: </strong><!--<span><?php //echo $row['skills'];?></span>-->
											<?php 
              
                        
											 $str3 = $row['course'];	
												$strs3=explode(",",$str3);
												 $st1="";
												  foreach($strs3 as $q3){
												
												 $q1="select course from course where c_id='$q3'";
												  $result1=mysqli_query($DB,$q1);
												  $row1=mysqli_fetch_array($result1);
												  $c=$row1['course'];
												   $st1=$st1.$c.", ";
												  }
												 
											echo $st1;
                        
                        ?>
                                          </div>
                                    </div>
                                    </div>
                                    <!---row--->
									<div class="row">
					<div class="col-lg-6 ">
                                          <div class="post-des mt-2">
                                            <strong>Specialization: </strong><!--<span><?php echo $row['qualification'];?></span>-->
											<?php 
              
              
              $str1 = $row['specialization'];	
						    $strs=explode(",",$str1);
						     $str="";
							  foreach($strs as $b){
							
							 $q1="select specialization from specialization where s_id='$b'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['specialization'];
							   $str=$str.$c.", ";
							  }
							 /*$str="";
							  foreach($str1 as $c){
							  
							 
							  $str=$str.$c.", ";
				               
				        }   */ 
						echo $str;
              
              
                        ?>
                                          </div>
                                       </div>
                                    
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-2">
                                            <strong>Skills: </strong><span><?php echo $row['skills'];?></span>
                                          </div>
                                    </div>
                                    </div>
                                    <!---row--->
					  <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
						
                                   	<div class="row">
					<div class="col-lg-6 ">
                                          <div class="post-des mt-2">
                                             <strong>Location: </strong><span><?php  echo $row['country'];?> , <?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?></span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-2">
                                             <strong>Job Description: </strong><span><?php //echo $row['description'];
                                             
                                             $str = $row['description'];
						$pieces = explode("\n", $str);
						foreach($pieces as $element)
						{
						echo $element."<br/>";
						}

                                             
                                             
                                             
                                             ?>
                                             
                                             
                                             </span>
                                          </div>
                                       </div>
                                       </div>
 					
	<hr>
									
					<div class="row">
                                      
                                      <div class="col-lg-12 ">
                                          <div class="post-des pull-left">
                                          <?php
                                          $q2="select count(*) as maxnum from candidate_job_applied where fk_func_id=".$row['id']." and status='applied'";
                                          $result2=mysqli_query($DB,$q2);
                                          $row2 = mysqli_fetch_array($result2);
                                          $maxnum= $row2['maxnum'];
                                        //  echo $maxnum;
                                          ?>
                                             <strong>Job Applicants:</strong><span class="badge"><?php echo $row2['maxnum'] ?></span>
                                          </div>
                                          <div class="btn-group-sm pull-right">
                                            <a type="button" class="btn btn-danger" href="job_edit.php?status=edit&id=<?php echo $row['id'];?>" onclick="return confirm('do you want to Edit Post?');">Edit</a>
                                          <a type="button" class="btn btn-danger" href="delete-post.php?status=delete&id=<?php echo $row['id'];?>" onclick="return confirm('do you want to Delete Post?');">Delete</a>
                                           <?php 
                                      if(($Status)=='active') 
                                        { ?>
                    <a type="button" class="btn btn-danger" href="active_inactive_jobstatus.php?status=<?php echo $row['status'];?>&id=<?php echo $row['id'];?>" onclick="return confirm('Do You Really want to inactivate (<?php echo  $row['title']; ?>)');">
                    Inactive </a>
                    <?php } if(($Status)=='inactive') { ?>
                    <a type="button" class="btn btn-danger" href="active_inactive_jobstatus.php?status=<?php echo $row['status'];?>&id=<?php echo $row['id'];?>" onclick="return confirm('Do You Really want to activate (<?php echo  $row['title']; ?>)');">
                    Active</a>
                    <?php } ?>
                                       </div>
                                    </div>
									
                                    <!---row--->
                                 </div>
                                 <!--col-6--->
                              </div>
                              <!---row----->

                              
                        </div>
						
                     </div>
					  
                  </div>
				 
               </div>
		
    
            </div>
            
            
            
          <?php
}
}
else
{

?>
  <div>
      <h1>You Have Not Posted Any Job Yet</h1>
      </div>
      <?php
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