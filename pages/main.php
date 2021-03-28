<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'welcome.php';
}

switch ($page) {
    case "home": {
            include('home.php');
        }
        break;
        case "about": {
            include('about.php');
        }
        break;
        case "contact": {
            include('contact.php');
        }
        break;

    default: {
            include('home.php');
        }
        break;
}
