<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
   <a class="navbar-brand" href="index.php"><img src="img/works/talent.png" height="40px" width="200px" alt=""></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Company Profile">
          <a class="nav-link"  href="company_profile.php">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="nav-link-text">Company Profile</span>
          </a>
        </li>
  
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Company Functionality">
          <a class="nav-link">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Company Functionality</span>
          </a>
         </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Post The Job">
          <a class="nav-link" href="jd.php">
            <i class="fa fa-hand-o-right" aria-hidden="true"></i>
            <span class="nav-link-text">Post The Job</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="View Job Post">
          <a class="nav-link" href="job-post.php">
            <i class="fa fa-eye" aria-hidden="true"></i>
            <span class="nav-link-text">View Job Post</span>
          </a>
        </li>
        
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile Edit">
          <a class="nav-link" href="profile_edit.php">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
 
		<li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-user"></i><?php echo $_SESSION['name'];?></a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>