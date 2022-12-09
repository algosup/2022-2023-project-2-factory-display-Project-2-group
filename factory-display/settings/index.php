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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title>Mon espace</title>

    <script src="/factory-display/assets/js/section/header.js"></script>
    <script src="/factory-display/assets/js/section/footer.js"></script>
    <script src="/factory-display/assets/js/init.js"></script>

    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/font-awesome.css">
    <link rel="stylesheet" href="/factory-display/assets/css/settings/homepage.css">

    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>

</head>

<body>
<header>
        <?php
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == "user") {
                @include './assets/headers/header-user.html';
            } else
                if ($_SESSION['role'] == "admin") {
                    @include './assets/headers/header-admin.html';
                }
        }
        ?>
    </header>
    <?php
    if (isset($error)) {
        foreach ($error as $error) {
            echo '<p class="error">' . $error . '</p>';
        }
    }
    ?>
    <div class="main-div">
        <div class="leftside-main-container">
            <div class="leftside-containers">
                <div class="leftside-account-container" onclick=openAccount()>
                    <div class="leftside-text">
                        <h2 class="title"> Mon compte</h2>
                    </div>
                    <div class="leftside-icons">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                </div>
                <hr class="solid">
                <div class="leftside-setting-container" onclick=openSettings()>
                    <div class="leftside-text">
                        <h2 class="title">Paramètres</h2>
                    </div>
                    <div class="leftside-icons">
                        <i class="fa-solid fa-gear"></i>
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
                    <!--<div class="rightside-container-account-header">
                        <h2>Mon compte</h2>
                    </div>
                    <div class="rightside-container-account-body">
                        <div class="rightside-container-account-body-left">
                            <div class="account-prenom">
                                <h2>Prénom</h2>
                            </div>
                            <div class="account-nom">
                                <h2>Nom</h2>
                            </div>-->
                    <div class="rightside-container-account-header">
                        <h2>Mon compte</h2>
                    </div>
                    <div class="profil">
                        <h3>nom d'utilisateur : </h3>
                        <h4>(nom)</h4>
                        <h3>email : </h3>
                        <h4>(ng******************com)</h4>
                        <h3>mot de passe : </h3>
                        <h4>(**********)</h4>
                    </div>
                </div>
                <div class="rightside-container-setting">
                    <div class="rightside-container-setting-header">
                        <h2>Paramètres</h2>
                    </div>
                    <div>
                        <p><a href="/factory-display/settings/passwordforgot.html"> mot de passe oublié ? </a></p>
                    </div>
                    <div>
                        <!--div class="rightside-container-setting-body">
                            <div class="rightside-container-setting-body-left">
                                <div class="setting-theme">
                                    <h2>Thème</h2>
                                </div>
                                <div class="setting-theme-select">
                                    <select name="theme" id="theme">
                                        <option value="light">Clair</option>
                                        <option value="dark">Sombre</option>
                                    </select>
                                </div>
                            </div>
                        </div-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        // Open the div when the user clicks on the icon and display it on the right side 
        var account = document.querySelector(".leftside-account-container");
        var setting = document.querySelector(".leftside-setting-container");
        var logout = document.querySelector(".leftside-logout-container");
        var accountContainer = document.querySelector(".rightside-container-account");
        var settingContainer = document.querySelector(".rightside-container-setting");

        function openSettings() {
            accountContainer.style.display = "none";
            settingContainer.style.display = "block";
        }

        function openAccount() {
            accountContainer.style.display = "block";
            settingContainer.style.display = "none";
        }
    </script>
</body>

</html>