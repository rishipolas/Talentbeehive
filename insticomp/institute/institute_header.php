<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
     <a class="navbar-brand" href="index.php"><img src="../img/works/talent.png" height="40px" width="200px" alt=""></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Institute Profile">
          <a class="nav-link"  href="institute_profile.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Institute Profile</span>
          </a>
        </li>
    <!--    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Search company">
          <a class="nav-link"  href="filter.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Search Company</span>
          </a>
        </li> -->
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Company Functionality">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Student Profile</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="student_profile.php">Student List</a>
            </li>
            
          </ul>
        </li>
       
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile Edit">
          <a class="nav-link" href="institute_profile_edit.php">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Profile Edit</span>
          </a>
        </li>
        
       
        
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Invite Company">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapse" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-envelope-open"></i>
            <span class="nav-link-text">Invite Company</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapse">
            <li>
              <a href="jd2.php">Filter Candidates</a>
            </li>
            
            <li>
              <a href="search_company_institute.php">Search & Invite</a>
            </li>
            
            <li>
              <a href="Attatch_xcel.php">My Files</a>
            </li>
            
          </ul>
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
          <a class="nav-link" >
            <i class="fa fa-fw fa-user"></i><?php echo $_SESSION['name']; ?></a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal1">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
