<?php
// login system
@include '../assets/php/login/config_db.php';
session_destroy();

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql_email_search = "SELECT * FROM user_form WHERE email = '$email' ";
    $result_email_exist = $conn->query($sql_email_search);
    $email_count = $result_email_exist->rowCount();

    if ($email_count) { // If email exists we check the password
        $retrieveData = $result_email_exist->fetch(PDO::FETCH_ASSOC);

        $pass_db = substr($retrieveData['password'], 0, 60); // We are using the first 60 characters of the password hash to verify the password because the password hash is 60 characters long to prevent errors when comparing the password hash with the password hash from the database
        $verified = password_verify($pass, $pass_db); // Verify the password given by the user with the password hash from the database

        if ($verified) { // If the password is correct we start the session
            $success[] = "Vous vous êtes connecté avec succès !";

            $_SESSION['name'] = $retrieveData['name'];
            $_SESSION['email'] = $retrieveData['email'];
            $_SESSION['role'] = $retrieveData['user_type'];
            $_SESSION['logged_in'] = true;

            header('location:/factory-display/index.php');
        } else {
            $error[] = "Le mot de passe est incorrect.";
        }
    } else {
        $error[] = "Aucun compte avec cet email n'existe.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> <!-- To allow the use of http links in https pages -->
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title>Connexion</title>

    <script src="/factory-display/assets/headers/header.js"></script>
    <script src="/factory-display/assets/js/settings/connexion.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
    <link rel="stylesheet" href="/factory-display/assets/css/settings/account.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">

    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>

    <script type="text/javascript">
        // showMessage() function is used to display the divs error and success and hide them 5 seconds after
        function showMessage() {
            $(".error").show();
            $(".success").show();
            setTimeout(function() {
                $(".error").hide();
                $(".success").hide();
            }, 5000);
        }
        swal({
            text: <?php foreach ($error as $error) {
                        echo '<p>' . $error . '</p>';
                    } ?>,
            icon: "error",
            button: "Ok",

        });
    </script>
</head>

<body>
    <header>
        <?php
        // include guest navbar
        @include '../assets/headers/header-guest.html';
        ?>
    </header>
    <div class="form-container">
        <form action="" method="post">
            <h2>Connectez-vous :</h2>

            <div class="error">
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<p>' . $error . '</p>';
                    }
                }
                ?>
            </div>

            <div class="success">
                <?php
                if (isset($success)) {
                    foreach ($success as $success) {
                        echo '<p>' . $success . '</p>';
                    }
                }
                ?>
            </div>

            <div class="input_container">
                <input type="email" name="email" placeholder="E-mail" required>
            </div>

            <div class="input_container">
                <input type="password" id="pass" name="pass" placeholder="Mot de passe" required>
                <img src="/factory-display/assets/img/icons/oeil_ouvert.png" id="eye" onclick="changer()" />
            </div>

            <input type="submit" name="submit" value="Connexion" class="form-btn" onclick="swal()">

            <p>Vous n'avez pas de compte ? <a class="account-links" href="/factory-display/settings/inscription.php"> Inscrivez-vous </a></p>
            <p>Mot de passe oublié ? <a class="account-links" href="/factory-display/settings/passwordforgot.html"> Cliquez-ici </a></p>
        </form>
    </div>
</body>