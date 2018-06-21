	<!DOCTYPE html>
<html lang="en">
   <head>
  
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>SB Admin - Start Bootstrap Template</title>
      <!-- Bootstrap core CSS-->
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="../css/sb-admin.css" rel="stylesheet">
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Institute Profile">
          <a class="nav-link"  href="institute_profile.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Institute Profile</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Search Comapny">
          <a class="nav-link"  href="search_company.html">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Search Comapny</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Company Functionality">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Student Profile</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="student_profile.html">Student List</a>
            </li>
            <li>
              <a href="shortlist_studentview.html">ShortList Student</a>
            </li>
          </ul>
        </li>
       
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile Edit">
          <a class="nav-link" href="profile_edit_institute.html">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Profile Edit</span>
          </a>
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
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
           
           
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
		
		<li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-user"></i>User</a>
        </li>
       
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
          
		<?php
  
   include_once("config1.php");
 
/*$q1="select count(*) as maxid from functionality where name='{$_SESSION['name']}'";
$result1=mysqli_query($DB,$q1);
$row = mysqli_fetch_array($result1);

$getlogo=" select * from users ";
$getlogodetails=mysqli_query($DB,$getlogo);
$getlogodetailsinfo= mysqli_fetch_array($getlogodetails);
*/

   if(isset($_POST['submit']))
  {
   $keyword = $_POST['keyword'];
   $location = $_POST['location'];
   $nature = $_POST['nature'];
  }
   $getsearch = mysqli_query($DB,"SELECT * FROM users WHERE cname LIKE '%$keyword%'") or die(mysqli_error($DB)); 
 
    $getsearch2 = mysqli_query($DB,"SELECT * FROM  users " ) or die(mysql_error($DB)); 
       $getsearchdetails2 = mysqli_fetch_array($getsearch2)
  ?>
			
			<section class="card mb-3" id="search-result">
        <div class="card-header">
          <i class="fa fa-table"></i> Search Result</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>Company Name</th>
                 
                  <th>Comapny Website</th>
                 
                  <th>Logo</th>
                  <th>Type</th>
                     <th>Mobile</th>
                   <th>Invite</th>
                 
                  
                </tr>
              </thead>
              <?php   

              if (mysqli_num_rows($getsearch2) > 0) 
              {
   
            while($getsearchdetails = mysqli_fetch_array($getsearch))
              {  
                   $status=$getsearchdetails2['status'];
          ?>  
              <tbody>
                <tr>
                   <td><?php echo $getsearchdetails['cname']?></td>
			
                  <td><?php echo $getsearchdetails['cweb']?></td>
				   <td><img src="<?php echo '../uploads/'.$getsearchdetails2['clogo'] ?>" width="90px" height="90px"></td>
                
			        <td><?php echo $getsearchdetails['type']?></td> 
               <td><?php echo $getsearchdetails['number']?></td> 
             <td>

              <?php if(($status)=='invite') { ?>
                    <a href="institute_status.php?status=<?php echo $getsearchdetails['status'];?>&id=<?php echo $getsearchdetails['institute_id'];?>&cid=<?php echo $getsearchdetails['company_id'];?>" onclick="return confirm('Do You Really want to Invite?">Invite</a>
                      
                    <?php 
                  } 
                  
                if(($Status)=='uninvite') { ?>
                    <a type="button" class="btn btn-danger" href="institute_status.php?status=<?php echo $row['status'];?>&id=<?php echo $row['id'];?>" onclick="return confirm('Do You Really want to Uninvite?">Uninvite</a>
                    <?php } ?>
                  </td>
        
                <?php
              }
          }
              ?>
            </tr>
              </tbody>

            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </section>
     
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