
<?php
include('config/apply.php');
ob_start();
include('box/header.php');
include('box/user_menu.php');
include('pages/main.php');
if ($page != "Questions") {
    include('box/footer.php');
}

?>