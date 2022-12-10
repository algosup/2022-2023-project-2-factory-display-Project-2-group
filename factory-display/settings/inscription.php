<?php
@include '../assets/php/login/config_db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $c_pass = $_POST['c_pass'];

    $pass_hash = password_hash($pass, PASSWORD_BCRYPT);

    $sql_email_search = "SELECT * FROM user_form WHERE email = '$email' ";

    $result_email_exist = $conn->query($sql_email_search);

    $email_count = $result_email_exist->rowCount();

    if ($email_count) {
        $error[] = "Un compte avec cet email existe déjà.";
    } else {
        if ($pass == $c_pass) {
            $sql = "INSERT INTO user_form (name, email, password) VALUES ('$name', '$email', '$pass_hash')";
            $result = $conn->query($sql);

            if ($result) {
                $success[] = "Votre compte a été créé avec succès.";
                // wait 3 seconds before redirecting to login page
                header('refresh:3;location:account.php');

            } else {
                $error[] = "Une erreur s'est produite lors de la création de votre compte.";
            }
        } else {
            $error[] = "Les mots de passe ne correspondent pas.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title>Inscription</title>

    <script src="/factory-display/assets/headers/header.js"></script>
    <script src="/factory-display/assets/js/settings/inscription.js"></script>

    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
    <link rel="stylesheet" href="/factory-display/assets/css/settings/inscription.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">

    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
</head>

<body>
    <header>
        <?php @include '../assets/headers/header-guest.html'; ?>
    </header>
    <div class="form-container">
        <form action="" method="post">
            <h1>Inscrivez-vous:</h1>

            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<p class="error">' . $error . '</p>';
                }
            }
            if (isset($success)) {
                foreach ($success as $success) {
                    echo '<p class="success">' . $success . '</p>';
                }
            }
            ?>

            <input type="text" name="name" required placeholder="Nom">
            <input type="email" name="email" required placeholder="E-mail">

            <div class="input_password">
                <input type="password" id="pass" name="pass" placeholder="Mot de passe">
                <img src="/factory-display/assets/img/icons/oeil_ouvert.png" id="eye" onclick="changer()" />
            </div>

            <div class="input_password">
                <input type="password" id="c_pass" name="c_pass" placeholder="Confirmer votre mot de passe">
                <img src="/factory-display/assets/img/icons/oeil_ouvert.png" id="eye1" onclick="changer1()" />
            </div>

            <input type="submit" name="submit" value="Inscrivez-vous" class="form-btn">
            <p> Vous avez déjà un compte ? <a href="/factory-display/settings/account.php">Connectez-vous </a></p>

        </form>
</body>