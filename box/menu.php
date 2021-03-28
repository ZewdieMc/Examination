<?php 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['xss']="<div class='alert alert-danger'>Please login to access control panel</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="<?php echo SITEURL; ?>admin/index.php?page=home">Home</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=students">Students</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=faculties">Faculities</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=questions">Questions</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=results">Results</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=results">Settings</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=logout">Log Out</a>
    </li>

    <!-- Dropdown -->
 <!--    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Dropdown link
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li> -->
  </ul>
</nav>
