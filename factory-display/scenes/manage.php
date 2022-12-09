<?php
@include '../assets/php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
    $success[] = "Vous êtes connecté en tant que " . $_SESSION['name'] . ".";

}
else {
    // redirect to the login page
    header('location:/factory-display/settings/account.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="/factory-display/assets/js/section/header.js"></script>
    <script src="/factory-display/assets/js/section/footer.js"></script>
    <script src="/factory-display/assets/js/init.js"></script>
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title>Gérer écrans </title>
    
    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
</head><link rel="stylesheet" href="/factory-display/assets/css/scenes/manage.css">
<body>
    
<header></header>

<?php 
    if ($handle = opendir('../../screens-side/screens/')) {

        while (false !== ($entryLink = readdir($handle))) {
    
            if ($entryLink != "." && $entryLink != "..") {
                if ($entryLink == "cafeteria.html") {
                    $entry = "Cafétéria";
                }
                if ($entryLink == "locker-room.html") {
                    $entry = "Vestiaire";
                }
                echo "<div class='screen-container'>";
                echo str_replace(".html","","<h1>$entry</h1>");
                echo "<iframe src='../../screens-side/screens/$entryLink' frameborder='0'></iframe>";
                echo "</div>";
            }
        }
        closedir($handle);
    }
?>

<footer></footer> 
</body>