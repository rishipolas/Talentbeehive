<?php
 session_start();

 if(! isset($_SESSION['email']))			
   header('location: candidate-login.php'); 		
	 
	 
 include('config1.php');
 $id=$_GET['id'];		
 
 
 
 
 
//$q="SELECT functionality.title,functionality.name as 'tname',functionality.location,functionality.role,functionality.qualification FROM functionality LEFT JOIN candidate ON functionality.role=candidate.role WHERE functionality.ID is not null and functionality	.role='$role' or functionality.qualification='$qualification'";	
$q="select fk_func_id from candidate_job_applied where fk_can_id='$id' and status='applied'";
//$q="select fk_func_id from candidate_job_applied where fk_can_id='$id' AND status='not' OR status='rejected'";
$result=mysqli_query($DB,$q);
$num=mysqli_num_rows($result);
//echo "width=device-width, initial-scale=1, shrink-to-fit".$num;
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
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2997357690787675",
    enable_page_level_ads: true
  });
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
                  <a href="#">Dashboard</a>
               </li>
               <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
				<?php
				
				//echo $num;
		if($num>0)
		{
				
		
		
		
		for($i=1;$i<=$num;$i++)
	        {
				$row=mysqli_fetch_array($result);
				//echo $row['fk_func_id'];
				
				
				
				
						$q2="select users.email, users.clogo, users.cweb, users.cname, users.state, users.city, functionality.title, functionality.role, candidate_job_applied.status, candidate_job_applied.date from 
						     users
							 INNER JOIN
							 functionality 
							 ON users.cname=functionality.name
							 INNER JOIN candidate_job_applied
							 ON functionality.name=candidate_job_applied.com_name
							 where functionality.id=".$row['fk_func_id'];
							 
							/*$q2="select cname,email,cweb,type,cloc,functionality.title from users,functionality
								where users.cname=functionality.name";*/
								
							 
						$result2=mysqli_query($DB,$q2);
						$num2=mysqli_num_rows($result2);
						//echo "width=device-width, initial-scale=1, shrink-to-fit".$num2;
						//echo $num2;
						if($num2>0)
		                                {               
			              /*   for($j=1;$j<=$num2;$j++)
	                          {*/
						         $row2= mysqli_fetch_array($result2);  
								 //echo $row['fk_func_id'];
	?>	
            <div class="container">
               <div class="row">
                  <div class="col-md-9 col-md-offset-3">
                     <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="container jobpost-div">
                              <div class="row" style="padding:10px">
                             
                                 <div class="col-lg-12">
                                    <div class="post-title jobpost-title">
                                       <a  href="#"  class="hover" id="<?php echo $row['fk_func_id']; ?> " text-primary" style="padding:5px 0px"><?php echo  $row2['title']; ?></a><span class="pull-right" style="font-size:11px">Applied On <?php echo $row2['date']; ?></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row" style="padding:8px">
                                 <div class="col-lg-2">
                                    <div class="post-logo">
                                       <img src="<?php echo 'uploads/'.$row2['clogo'] ?>"  height="70px" width="70px" alt="Company-logo">		
                                    </div>
                                 </div>
                                 <div class="col-lg-10">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="post-des ">
                                             <strong>Company Name: </strong><a class="text-primary"><?php echo $row2['cname']; ?></a>   
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des ">
                                            <strong>Role: </strong><span><?php echo $row2['role'];?></span>	
                                          </div>
                                       </div>
                                    </div>
                                    <!---row--->
                                    <div class="row">
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <strong>Contact Email: </strong><span><?php echo $row2['email']; ?></span>		
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <strong>Website: </strong><span><?php 
							   
							   $cweb=$row2['cweb'];
							   echo ('<a  target="_blank" href="https://'.$cweb.'" >' . $cweb . '</a>'); ?></span>	
                                          </div>
                                       </div>
                                         <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <strong>Status: </strong><span><?php echo $row2['status']; ?></span>	
                                          </div>
                                       </div>
                                    </div>
                                    <!---row--->
                                 </div>
                                 <!--col-6--->
                              </div>
                              <!---row----->
                              <div class="row" >
                                 <div class="col-lg-12" >
                                    <div class="jobpost-apply" >
                                      <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row2['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row2['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
			
                                       <strong style="margin-left:120px">Location: </strong><span><?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?></span>		
                                       
									    <!--<span class="text-muted" style="margin-left:20px">Status:</span><span>Pending</span>-->
                                      <!--<span class=" pull-right"><i class="fa fa-check-circle-o fa-lg" style="color:green" aria-hidden="true"></i><span class="ml-2 text-yellow">Already Applied</span></span>-->
                                    </div>
                                 </div>
                              </div>
                           </div>
						   <!-------------------JobPost 2-------------------------->

                        </div>
                     </div>
                  </div>
               </div>
            </div>
			<br>
			<?php
							  }
						//}
						 else
			            {
				   ?>
				   <div>
				   <h2>No Matching Data Found</h2>
				   </div>
				   <?php
			   }	
          			
			}
		        }
               else
			   {
				   ?>
				   <div>
				   <h2>No Data Found</h2>
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
		 	<script>  
      $(document).ready(function(){  
           $('.hover').popover({  
                title:fetchData,  
                html:true,  
                placement:'bottom'
              				
           });  
           function fetchData(){  
                var fetch_data = '';  
                var element = $(this);  
                var id = element.attr("id");  
                $.ajax({  
				   
                     url:"ca.php",  
                     method:"POST",  
                     async:false,  
                     data:{id:id},  
                     success:function(result){  
                          fetch_data = result;  
                     }  
                });  
                return fetch_data;  
           }  
		   
      }); 
	  
 </script>  
      </div>
   </body>
</html>