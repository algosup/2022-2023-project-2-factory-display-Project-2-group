<?php
@include '../php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
    // check if the user is an admin
    if ($_SESSION['role'] == "admin") {
        // redirect to the admin page
        header('location:display.php');

    } else {
        // redirect to the user page
        $_SESSION['error'] = "Vous n'avez pas les droits pour accéder à cette page.";
        header('location:/factory-display/index.php');
    }

} else {
    // redirect to the login page
    header('location:/factory-display/settings/account.php');
}
?>