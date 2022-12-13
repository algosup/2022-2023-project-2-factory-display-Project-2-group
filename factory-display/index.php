<?php
@include 'assets/php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
    $success[] = "Bienvenue " . $_SESSION['name'] . " !";

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
    <title>Accueil</title>

    <script src="assets/headers/header.js" defer></script>

    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">
    <link rel="stylesheet" href="/factory-display/assets/css/homepages.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/font-awesome.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Sans">

</head>

<body>
    <header>
        <?php
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == "user") {
                @include 'assets/headers/header-user.html';
            } else
                if ($_SESSION['role'] == "admin") {
                    @include 'assets/headers/header-admin.html';
                }
        }
        ?>
    </header>
    <?php
    // display the success message
    if (isset($success)) {
        foreach ($success as $message) {
            echo "<div class='alert alert-success'>" . $message . "</div>";
        }
    }
    ?>
    <div class="a-propos">
        <div class="div-main-container">
            <h3>L'entreprise</h3>
        </div>
        <br>
        <div class="text_presentation">
            <img class="jacobi_services" src="assets/images/jacobi_services.png" alt="Jacobi services">
            <p><a href="http://www.jacobi.net" role="link" tabindex="0" target="_blank">Jacobi</a> est une entreprise
                développant des produits
                innovants de filtration d'air et d'eau aux charbons actifs et à la résine. La compagnie créée par
                Ferdinand Adolphe Wilhelm
                Jacobi existe depuis 1916 et ne cesse de se développer à travers le monde, comme en Allemangne,
                Philadelphie, Inde ou encore en
                Malaisie.<br>
                Remko Goudappel, PDG de L'entreprise Jacobi, met un point d'honneur sur la sécurité de ces clients et de
                ces produits mais aussi
                le respect de l'environnement lors de chacune des étapes de production. Pour contribuer à la réussite de
                tous ces objectifs,
                l'entreprise peut compter sur ces employés dont le bien être au sein de l'entreprise est également un
                point clé sur la réussite de
                Jacobi.</p>
        </div>
    </div>
    <br>
    <div class="contact-admin">
        <div class="div-main-container-bis">
            <h3>Contacter les Administrateurs</h3>
        </div>
        <br>
        <p>Mr. Usman Saeed : <strong><a href="mailto:usman.saeed@jacobi.net" role="link" tabindex="0"
                    target="_blank">usman.saeed@jacobi.net</a></strong><br>
            Mr. Pierre Page <small>(HR Manager)</small>: <strong><a href="mailto:pierre.page@jacobi.net" role="link"
                    tabindex="0" target="_blank">pierre.page@jacobi.net</a></strong><br>
            Ms. Karen Blanque <small>(HR Assistant)</small>: <strong><a href="mailto:karen.blanque@jacobi.net"
                    role="link" tabindex="0" target="_blank">karen.blanque@jacobi.net</a></strong><br>
            Mr. Nicolas Yvelin <small>(Factory Manager)</small>: <strong><a href="mailto:nicolas.yvelin@jacobi.net"
                    role="link" tabindex="0" target="_blank">nicolas.yvelin@jacobi.net</a></strong></p>
        <br>
    </div>
</body>