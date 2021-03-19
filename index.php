<?php 
    include('admin/config/apply.php');
    ob_start();
    include('box/header.php');
    include('pages/main.php');
    if ($page!="Questions") {
    	include('box/footer.php');
    }
    
?>