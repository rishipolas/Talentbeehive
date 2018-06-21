<?php
session_start(); 		
  
if(!isset($_SESSION['email']))
	echo ("<SCRIPT LANGUAGE='JavaScript'>	   
	                        window.location.href('company-login.php');
	                        </SCRIPT>");
include('config1.php');

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
      include('company_header.php');		
      ?>
  
  
     
      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
        
		  
            <div class="container">
			
               <div class="row">
                  <div class="col-md-9 col-md-offset-2">
				  
				  
				  <div class="card">
				  	
				    	<?php
		
		
		
$q="SELECT role,title,id FROM functionality  where  name='{$_SESSION['name']}'  ORDER BY id DESC ";
$result=mysqli_query($DB,$q);
$num=mysqli_num_rows($result);

if($num>0)
		{
		

?>
						
				        <div id="accordion" role="tablist" aria-multiselectable="true">
							
			
						
						
			<?php	
		
			for($i=1;$i<=$num;$i++)
	                {
		
		       $row=mysqli_fetch_array($result);
		
						
					    $q2="select count(*) as maxnum from candidate_job_applied where com_name='{$_SESSION['name']}' and fk_func_id= ".$row['id'];
						$result2=mysqli_query($DB,$q2);
						$row2= mysqli_fetch_array($result2);
						
						
							   
					
	?>	 	
						 
						
						
								<div class="card-header" role="tab" id="Developement<?php echo $i; ?>">
								<h5 class="mb-0">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapsedevelopment<?php echo $i;?>" aria-expanded="false" aria-controls="collapseOne<?php echo $i; ?>">
								
								
								
									<span class="badge-applied mr-4"><?php echo $row2['maxnum'];?></span><?php echo $row['title'];?>
									<!--span><i class="plus1 fa fa-plus pull-right" aria-hidden="true"></i></span>
									<span><i class="minus1 fa fa-minus pull-right" aria-hidden="true"></i></span-->
								</a>
								</h5>
							</div>
		
						
						  
						  
						  
		 <div class="container">
               <div class="row">
                  <div class="col-md-11 col-md-offset-3">
				
				
						<div id="collapsedevelopment<?php echo $i;?>" class="collapse <?php echo ($i == 0 ? 'collapse in' : 'collapse'); ?>" role="tabpanel" aria-labelledby="Developement<?php echo $i; ?>">
						  
                     <div class="panel panel-default">
					 
					
						  
                        <div class="panel-body">
						
							
	<div class="table-responsive ">
            <table class="table table-bordered yellow-border" id="dataTable" style="width:100%" cellspacing="0">
              <thead>
                <tr>
		
		
                  <th>Candidate Name</th>
                  <th>Status</th>
                 
                </tr>
              </thead>
              
              <tbody>
               <?php	
               
             
                              
               					  
 	   $q3="SELECT * FROM candidate 
 	   INNER JOIN candidate_job_applied 
 	   ON candidate.id=candidate_job_applied.fk_can_id 
 	    where candidate_job_applied.fk_func_id=".$row['id']." and candidate_job_applied.com_name='".$_SESSION['name']."' ORDER BY  candidate_job_applied.id ";
						   $result3=mysqli_query($DB,$q3);
						   $num3=mysqli_num_rows($result3);
						
						 if($num3>0)		
						 {
			                  for($j=1; $j<=$num3; $j++)
			                       {	
					 $row3= mysqli_fetch_array($result3) ;		
						   
						  ?>
						  
                <tr>
                
                		
                
               			<td> <form action="view-candidate-profile.php" method="post"> <?php echo $row3['name']; ?>
               			                         <input type="hidden" name="id" value="<?php echo $row3['fk_can_id']; ?>">
               			                          <input type="hidden" name="fid" value="<?php echo $row3['fk_func_id']; ?>">
               			                         <button type="submit" class="button-view pull-right" id='ma' name="submit">View Profile</button>	
               			                         </form> 
                 </td>
                  <td><?php echo $row3['status']; ?></td>	
                 
                </tr>
                 <?php
						  }
					    }
else
{
	?>
	
	<div>
	<h4>No Record</h4>
	</div>
	<?php
}	
				?> 
 

                 
   </div>
		
        
              </tbody>
            </table>
            			   			      
			 				
						
			
                 				
                        
                                   
			
						   <!-------------------JobPost 2-------------------------->
						     <!-------------------JobPost 3-------------------------->
				
		
            
            
          </div>			
           
		
		
		 <!-------------------JobP------------------------->
		
		
		
			
                        </div>
                     </div>
                  </div>
                  
                  	 
                	   
                  
                  
                  
                  
                  
               </div>
						
            </div> 	
				
				
            				
					
					 
					</div>
							
			<?php 
		    }
		
				?>			
							
				
				
	<!--------nd---------->			
				
			<?php
                  }
					
			else
{
	?>
	
	<div>
	<h4>No Record</h4>		
	</div>
	<?php
}	
?>					
							
                        </div>
                        
                        
                       	
		
		     
                       
                  </div>
                
<!--------2nd---------->

		
		
		
		
		
				  
               </div>           
	
	
            </div>
			
			
			
			
			
			
			
			
			
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
               <small>Copyright © talentbeehive.com 2017</small>
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
       <script src="js/show-hide-collapse.js"></script>
	
      </div>
   </body>
</html>