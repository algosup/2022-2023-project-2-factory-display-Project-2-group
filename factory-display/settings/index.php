<?php
@include '../assets/php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
    $success[] = "Vous êtes connecté en tant que " . $_SESSION['name'] . ".";
} else {
    // redirect to the login page
    header('location:/factory-display/settings/account.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title>Mon Espace</title>

    <script src="/factory-display/assets/headers/header.js"></script>
    <script src="/factory-display/assets/js/settings/darkmode.js"></script>


    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/font-awesome.css">
    <link rel="stylesheet" href="/factory-display/assets/css/settings/homepage.css">
    <link rel="stylesheet" href="/factory-display/assets/css/settings/admin.css">

    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>

</head>

<body>
    <header>
        <?php
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == "user") {
                @include '../assets/headers/header-user.html';
            } else
                if ($_SESSION['role'] == "admin") {
                    @include '../assets/headers/header-admin.html';
                }
        }
        ?>
    </header>

    <div class="main-div">
        <div class="leftside-main-container">
            <div class="leftside-containers">
                <div class="leftside-account-container" onclick="openAccount()">
                    <div class="leftside-text">
                        <h2 class="title"> Mon compte</h2>
                    </div>
                    <div class="leftside-icons">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                </div>
                <hr class="solid">
                
                <div class="leftside-setting-container" onclick="openSettings()">
                    <div class="leftside-text">
                        <h2 class="title">Paramètres</h2>
                    </div>
                    <div class="leftside-icons">
                        <i class="fa-solid fa-gear"></i>
                    </div>
                </div>
                <hr class="solid">

                <div class="leftside-admin-container" onclick="openAdmin()">
                    <div class="leftside-text">
                        <h2 class="title"> Administration</h2>
                    </div>
                    <div class="leftside-icons">
                        <i class="fa-solid fa-tools"></i>
                    </div>
                </div>
                <hr class="solid">
                
                <div class="leftside-logout-container" onClick="document.location.href='disconnect.php'">
                    <div class="leftside-text">
                        <h2 class="title">Déconnexion</h2>
                    </div>
                    <div class="leftside-icons">
                        <i class="fa-solid fa-sign-out"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="rightside-main-container">
            <div class="rightside-containers">
                <div class="rightside-container-account">
                    <div class="rightside-container-account-header">
                        <h2>Mon compte</h2>
                    </div>
                    <div class="rightside-container-account-content">
                        <div class="account-header">
                            <div id="icon">
                                <i class="fa-solid fa-user-large"></i>
                            </div>
                            <div id="title">
                                <h3>Informations personnelles</h3>
                            </div>
                        </div>
                        <hr class="solid">
                        <div>
                            <div class="name">
                                <p><b>Nom :</b>
                                    <?php echo '<input type="text" name="name" value="' . $_SESSION['name'] . '" disabled>'; ?>
                                </p>
                            </div>
                            <div class="email">
                                <p><b>E-mail :</b>
                                    <?php echo '<input type="text" name="email" value="' . $_SESSION['email'] . '" disabled>'; ?>
                                </p>
                            </div>
                            <div class="role">
                                <p><b>Rôle :</b>
                                    <?php
                                    if ($_SESSION['role'] == "user") {
                                        $role = "Utilisateur";
                                    } else
                                        if ($_SESSION['role'] == "admin") {
                                            $role = "Administrateur";
                                        }
                                    echo '<input type="text" name="role" value="' . $role . '" disabled>'; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rightside-container-setting">
                    <div class="rightside-container-setting-header">
                        <h2>Paramètres</h2>
                    </div>
                    <div>
                        <p><a href="/factory-display/settings/passwordforgot.html"> Mot de passe oublié ? </a></p>
                        <button id="toggle-mode">Mode Sombre</button>
                    </div>
                </div>

                <div class="rightside-container-admin">
                    <?php include('admin.php'); ?>
                </div>

            </div>
        </div>
    </div>

    <script>
        //Open the div when the user clicks on the icon and display it on the right side              
        var account = document.querySelector(".leftside-account-container");
        var setting = document.querySelector(".leftside-setting-container");
        var logout = document.querySelector(".leftside-logout-container");
        var admin = document.querySelector(".leftside-admin-container");

        var accountContainer = document.querySelector(".rightside-container-account");
        var settingContainer = document.querySelector(".rightside-container-setting");
        var adminContainer = document.querySelector(".rightside-container-admin");

        function openSettings() { settingContainer.style.display = "block"; accountContainer.style.display = "none"; adminContainer.style.display = "none"; }
        function openAccount() { accountContainer.style.display = "block"; settingContainer.style.display = "none"; adminContainer.style.display = "none"; }
        function openAdmin() { adminContainer.style.display = "block"; accountContainer.style.display = "none"; settingContainer.style.display = "none"; }
    </script>
</body>
</html>