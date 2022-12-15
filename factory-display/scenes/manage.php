<?php
@include 'assets/php/login/config_db.php';

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
    <link rel="stylesheet" href="/factory-display/assets/css/scenes/manage.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>


</head>
<body>
    
<header></header>

<?php 
    if ($handle = opendir('../../screens-side/saved-scenes/')) {

        while (false !== ($entryLink = readdir($handle))) {
    
            if ($entryLink != "." && $entryLink != "..") {
                echo str_replace(".html","","<h1>$entryLink</h1>");
                echo "<div class='screen-container'>";
                echo "<div class='buttons-container'>";
                echo "<a class='buttons' href='../../screens-side/saved-scenes/$entryLink' target='_blank'>Ouvrir dans un nouvel onglet</a>";
                echo "<a class='buttons' href='manage.php?location=toLockerRoom&link=$entryLink'>Publier aux Vestiaires 🛅</a>";
                echo "<a class='buttons' href='manage.php?location=toCafeteria&link=$entryLink'>Publier à la Cafétéria ☕</a>";
                echo "<a class='buttons' href='manage.php?delete&link=$entryLink'>Supprimer</a>";
                echo "</div>";
                echo "<br>";
                echo "<iframe src='../../screens-side/saved-scenes/$entryLink' frameborder='0'></iframe>";
                echo "</div>";
                echo "<hr>";

            }
        }
        closedir($handle);
        
    }
        if (count(glob("../../screens-side/saved-scenes/*")) === 0) {
            echo "<h1>Aucune scène sauvegardée</h1>";
            echo "<h3>Pour Créer une scène cliquez <a href='../../factory-display/scenes/create.php'>Ici</a> !</h3>";
        }

    if(isset($_GET['location'])) {
        if($_GET['location'] == "toLockerRoom") {
            $entryLink = $_GET['link'];
            $file = file_get_contents("../../screens-side/saved-scenes/$entryLink");
            file_put_contents("../../screens-side/screens/locker-room.html", $file);
        } else if($_GET['location'] == "toCafeteria") {
            $entryLink = $_GET['link'];
            $file = file_get_contents("../../screens-side/saved-scenes/$entryLink");
            file_put_contents("../../screens-side/screens/cafeteria.html", $file);
        }
    }

    if (isset($_GET['delete'])) {
        $entryLink = $_GET['link'];
        unlink("../../screens-side/saved-scenes/$entryLink");
        header("Location: manage.php");
    }

?>

<footer></footer> 
</body>