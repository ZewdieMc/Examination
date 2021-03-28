<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
  <a class="navbar-brand" href="<?php echo SITEURL; ?>index.php?page=home">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo SITEURL; ?>index.php?page=contact">Contact us</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo SITEURL; ?>index.php?page=about">About us</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo SITEURL; ?>admin/pages/login.php">Admin</a>
          <a class="dropdown-item" href="<?php echo SITEURL; ?>faculty/inex.php">Faculty</a>
          <a class="dropdown-item" href="<?php echo SITEURL; ?>department/login.php">Department</a>
          <a class="dropdown-item" href="<?php echo SITEURL; ?>teacher/index.php?pag=login">Teacher</a>
          <a class="dropdown-item" href="<?php echo SITEURL; ?>student/index.php?page=login">Examinee</a>
        </div>
      </li>
    </ul>
  </div>
  <!-- <div class="mx-auto order-0">
    <button class="btn btn-secondary"><a class="navbar-brand mx-auto" href="<?php echo SITEURL; ?>index.php?page=home">Main page</a></button>
  </div> -->



</nav>