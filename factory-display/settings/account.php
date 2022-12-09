<?php
// login system
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql_email_search = "SELECT * FROM user_form WHERE email = '$email' ";
    $result_email_exist = $conn->query($sql_email_search);
    $email_count = $result_email_exist->rowCount();

    if ($email_count) {  // If email exists we check the password
        $retrieveData = $result_email_exist->fetch(PDO::FETCH_ASSOC);

        $pass_db = substr($retrieveData['password'], 0, 60); // We are using the first 60 characters of the password hash to verify the password because the password hash is 60 characters long to prevent errors when comparing the password hash with the password hash from the database
        $verified = password_verify($login_pass, $pass_db); // Verify the password given by the user with the password hash from the database

        if ($verified) { // If the password is correct we start the session
            $success[] = "Vous êtes connecté avec succès.";

            $_SESSION['name'] = $retrieveData['name'];
            $_SESSION['email'] = $retrieveData['email'];
            $_SESSION['role'] = $retrieveData['user_type'];
            $_SESSION['logged_in'] = true;

            header('location:../index.php');
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
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title>Connexion</title>
    <script src="/factory-display/assets/js/section/header.js"></script>
    <script src="/factory-display/assets/js/section/footer.js"></script>
    <script src="/factory-display/assets/js/init.js"></script>

    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
    <link rel="stylesheet" href="/factory-display/assets/css/settings/account.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">

    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
</head>

<body>
    <header></header>
    <div class="form-container">
        <form action="" method="post">
            <h2>Connectez-vous :</h2>
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
            <input type="email" name="email" required placeholder="E-mail">
            <div class="input_password">
                <input type="password" id="pass" name="pass" placeholder="Mot de passe">
                <img src="/factory-display/assets/img/icons/oeil_ouvert-removebg-preview.png" id="eye" onclick="changer()" />
            </div>
            <input type="submit" name="submit" value="Connectez-vous" class="form-btn">
            <p>Vous n'avez pas de compte ? <a href="/factory-display/settings/inscription.html"> Inscrivez-vous </a></p>
            <p>Mot de passe oublié ? <a href="/factory-display/settings/passwordforgot.html"> Cliquez-ici </a></p>
        </form>
</body>