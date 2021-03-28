<<<<<<< HEAD

<?php
include('config/apply.php');
ob_start();
include('box/header.php');
include('box/user_menu.php');
include('pages/main.php');
if ($page != "Questions") {
    include('box/footer.php');
}

=======
<?php 
    include('admin/config/apply.php');
    ob_start();
    include('box/header.php');
    include('pages/main.php');
    if ($page!="Questions") {
    	include('box/footer.php');
    }
    
>>>>>>> 5063ec49dac15e7482e59e4d19d84a508012281c
?>