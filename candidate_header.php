<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">


    <a class="navbar-brand" href="index.php"><img src="img/works/talent.png" height="40px" width="200px" alt=""  ></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Candidate Profile">
          <a class="nav-link"  href="candidate-fresh_profile.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Candidate Profile</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Company Functionality">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Education Profile</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="candidate-complete-profile.php">Complete Profile</a>
            </li>
          </ul>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Search Institute">
          <a class="nav-link"  href="search_company.php">
            <i class="fa fa-fw fa-search"></i>
            <span class="nav-link-text">Shared to company</span>
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
          <a class="nav-link">
            <i class="fa fa-fw fa-user"></i><?php echo $_SESSION['name']; ?></a>		
        </li>
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>