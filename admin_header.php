 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Talent Beehive</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
       
        
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsadmin" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Admin</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseComponentsadmin">
            <li>
              <a href="admin-insert.php">Insert</a>
            </li>
            <li>
              <a href="admin-display.php">Display</a>
            </li>
          </ul>
        </li>
     
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentscompany" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Company</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponentscompany">
            <li>
              <a href="company-insert.php">Insert</a>
            </li>
            <li>
             <a href="company-display.php">Display</a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentscandidate" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Candidate</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponentscandidate">
            <li>
              <a href="candidate-insert.php">Insert</a>
            </li>
            <li>
              <a href="candidate-display.php">Display</a>
            </li>
          </ul>
        </li>
        
         
        
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentscandidateapp" data-parent="#exampleAccordion">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span class="nav-link-text">Candidate Status</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseComponentscandidateapp">
            <li>
              <a href="candidate-application-status.php">Applied</a>
            </li>
            <li>
              <a href="candidate-application-status_shortlist.php">Shortlisted</a>
            </li>
            <li>
              <a href="candidate-application-status_onhold.php">Onhold</a>
            </li>
          </ul>
        </li>
        
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentscandidatepost" data-parent="#exampleAccordion">
            <i class="fa fa-building-o" aria-hidden="true"></i>
            <span class="nav-link-text">Company Post</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseComponentscandidatepost">
            <li>
              <a href="company-job-post.php">Display</a>
            </li>
          </ul>
        </li>
      <hr></hr>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsinstitute" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Institute</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseComponentsinstitute">
            <li>
              <a href="admin_institute_register.php">Insert</a>
            </li>
             <li>
              <a href="admin_institute_display.php">Display</a>
            </li>
          </ul>                 
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsinstitutestudent" data-parent="#exampleAccordion">
            <i class="fa fa-building-o" aria-hidden="true"></i>
            <span class="nav-link-text">Institute Student Data</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseComponentsinstitutestudent">             
            <li>
              <a href="admin_instit_student_display.php">Display</a>
            </li>
          </ul>                 
        </li>  
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsinstitutejob" data-parent="#exampleAccordion">
            <i class="fa fa-building-o" aria-hidden="true"></i>
            <span class="nav-link-text">Institute jobs</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseComponentsinstitutejob">
             <li>
              <a href="admin_institute_job_display.php">Display</a>
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
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-user"></i>Admin-<?php echo $_SESSION['userid']; ?></a>		<!--  session starts from userid  -->
        </li>
       
        
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>