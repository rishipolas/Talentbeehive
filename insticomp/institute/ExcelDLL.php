<?php $fname=$_GET['fname'];$sfile=$_GET['sfile'];$instid=$_GET['id'];$cid=$_GET['cid'];?>
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
   
   <body id="page-top">
 <!-- Navigation-->
     
     
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
     <a class="navbar-brand" href="index.php"><img src="../img/works/talent.png" height="40px" width="200px" alt=""></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      
    
    <li class="nav-item">
          <a class="nav-link" >
            <i ></i>About us</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" >
            <i></i>Blog</a>
        </li>
      </ul>
    </div>
  </nav>   
   <br><br><br><br>
   
      <div class="content-wrapper">
         <div class="container-fluid">
       



			
			<section class="card mb-3" id="search-result">
        <div class="card-header">
          <i class="fa fa-table"></i> Search Result</div>
        <div class="card-body">
          <div class="table-responsive">
          <a class="btn btn-primary" href="ExcelGenerator.php?instid=<?php echo $instid;?> && cid=<?php echo $cid;?>">Generate Excel</a>
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>Student Name</th>
                <!-- <th>Email</th>
                 <th>Contact No</th>-->
                  <th>Qualification</th>
                 
                  <th>Course</th>
                  <th>Specialization</th>
                   
                   <th>Result</th>  
                 
                  
                </tr>
              </thead>
            





 <?php
$sess=$_GET['id'];
$fname=$_GET['fname'];
$fname=str_replace(".xls", ".",$fname);
$fname=trim($fname);
require_once 'Classes/PHPExcel.php';
		$tmpfname = "excel/$sess/filter/".$fname."xls";
		$tmpfname=str_replace(" ", "",$tmpfname);
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		
		
		for ($row = 2; $row <= $lastRow; $row++) {
			
		
     ?>

              <tbody>
                <tr>
                   <td><?php echo $worksheet->getCell("B".$row)->getValue();?></td>
                   
                



                  <td> <?php 
                         echo $worksheet->getCell("C".$row)->getValue();
                        ?>

                         </td>
				   <td>
                                 <?php 
              
                                 echo $worksheet->getCell("D".$row)->getValue();
                                  ?>      
                                   
                                   </td>
                
			          <td>
                                 <?php 
              
                                 echo $worksheet->getCell("E".$row)->getValue();
                                  ?>      
                                   
                                   </td>
                                   
                   <td>
                       <?php $idd=$worksheet->getCell("A".$row)->getValue(); 
                       
                             $sortlist=$worksheet->getCell("F".$row)->getValue(); 
                             
                             
                       ?>
                       
                       
                  <a class="btn btn-primary" href="ExcelDLL_Student_view.php?id=<?php  echo $idd; ?> && rowno=<?php echo $row;?> && sortlist=<?php echo $sortlist;?> && fname=<?php echo $fname;?> && sfile=<?php echo $sfile;?> && instid=<?php echo $instid;?> && cid=<?php echo $cid;?>">View</a>

                   <!-- <a class="btn btn-success" href="">Shortlist</a>-->
                 </td>
               
            
        
                <?php
     }

              ?>
              
            </tr>



               

              </tbody>

            </table>
          </div>
        </div>
        
      </section>
     
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