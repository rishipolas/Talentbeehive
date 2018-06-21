<?php
session_start();
 
 if(! isset($_SESSION['email']))
   header('location: candidate-login.php');
 
 include('config1.php');
 $id=$_GET['id'];

 
//$q="SELECT functionality.title,functionality.name as 'tname',functionality.location,functionality.role,functionality.qualification FROM functionality LEFT JOIN candidate ON functionality.role=candidate.role WHERE functionality.ID is not null and functionality	.role='$role' or functionality.qualification='$qualification'";	
$q="select * from candidate_job_applied where fk_can_id='$id' and status='shortlisted' ";
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
  <title>Talent Beehive</title>
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
       
   
          <div class="table-responsive ">
            <table class="table table-bordered yellow-border" id="dataTable" style="width:60%" cellspacing="0">
              <thead>
                <tr>
				  
                  <th>Job Post</th>
                  <th>Company Name</th>
                 
                </tr>
              </thead>
             
              <tbody>
			   <?php
	 if($num>0)
		{
				
		
			for($i=1;$i<=$num;$i++)
	        {
		
		       $row=mysqli_fetch_array($result);
		?>
                <tr>
				  <!--<input type="hidden" name="user_id" value="">-->
                  <!--<td><?php// echo $row['role'];?><span><a data-toggle="modal" data-userid="<?php //echo $row['fk_func_id'];?>" href="#myModaljobview"   class=" button-view2 pull-right" >View Post</a></span></td>-->
				  <td><?php  echo $row['role'];?><span><a data-toggle="modal1" href="#" data-target="#myModaljobview" id="<?php echo $row['fk_func_id'];?>" class=" hover button-view2 pull-right" style="color:#ff6113;">View Post</a></span></td>
                  <td><?php echo $row['com_name']; ?><span><a data-toggle="modal" href="#" data-target="#myModalcomapnyprofile" id="<?php echo $row['fk_func_id'];?>" class=" hover1 button-view2 pull-right" style="color:#ff6113;">View Profile</a></span></td>
                 
                </tr>
             <?php
			}
		}			
	   else
	   {
				   ?>
				   <tr>
				   <th colspan="2"><center>No Data Found</center></th>
				   </tr>
				   <?php
	   }	
           ?>		


 

        
              </tbody>
            </table>
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
	    <script src="js/show-hide-collapse.js"></script>
	    <script src="js/modal1.js"></script>
		<script>  
      $(document).ready(function(){  
           $('.hover').popover({  
                title:fetchData,  
                html:true,  
                placement:'right'
              				
           });  
           function fetchData(){  
                var fetch_data = '';  
                var element = $(this);  
                var id = element.attr("id");  
                $.ajax({  
				   
                     url:"cs.php",  
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
 
 <script>  
      $(document).ready(function(){  
           $('.hover1').popover({  
                title:fetchData,  
                html:true,  
                placement:'right'  
           });  
           function fetchData(){  
                var fetch_data = '';  
                var element = $(this);  
                var id = element.attr("id");  
                $.ajax({  
                     url:"cs1.php",  
                     method:"POST",  
                     async:false,  
                     data:{id:id},  
                     success:function(data){  
                          fetch_data = data;  
                     }  
                });  
                return fetch_data;  
           }  
      });  
 </script>  
 
  </div>
</body>

</html>
