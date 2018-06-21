<?php 
session_start();

$sess=$_SESSION['id'];



$dir = './excel/'.$sess.'/filter';
$files = scandir($dir, 0);




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
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
   </head>
   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
       <?php
 	include("institute_header.php");
 ?>
      <div class="content-wrapper">
         <div class="container-fluid">
       



			
			<section class="card mb-2" id="search-result">
        <div class="card-header">
          <i class="fa fa-table"></i> Search Result</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" width="10%" cellspacing="0">
              <thead>
                <tr>
                    <th>File Name</th>
        
                  <th>Action</th>
                 
                  
                 
                  
                </tr>
              </thead>
            



                  <?php for($i = 1; $i < count($files); $i++){ ?>
                  



              <tbody>
                <tr>
                   <td><?php print $files[$i]; ?></td>
                   
                



                  <td> 
                  
                <a class="btn btn-primary" href="http://talentbeehive.com/insticomp/excel/<?php echo $sess; ?>/filter/<?php echo $files[$i]; ?>">View</a>
                <a class="btn btn-primary" href="delete_excel.php?fpath=<?php echo $dir."/$files[$i]"?>" >Delete</a>

                 </td>
			         
                                   
                   
            
        
                <?php
     }

              ?>
              
            </tr>



               

              </tbody>

            </table>
          </div>
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </section>
     
         </div>
      </div>
    
     <!-- Logout Modal-->
   <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                     <a class="btn btn-primary" href="institute_login.php">Logout</a>
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
   </body>
</html>