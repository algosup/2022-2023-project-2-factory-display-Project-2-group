<?php
include 'config_db.php';
session_start();

if (isset($_POST['submit'])) {

    $login_email = $_POST['email'];
    $login_pass = $_POST['pass'];

    $select = " SELECT * FROM user_form WHERE email = '$login_email' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) { // If a result is found we can assume that the email is correct 

        $row = mysqli_fetch_assoc($result); // Fetch data from the database

        // Put all the data inside the session for debugging
        $_SESSION['testing_row'] = $row;

        $pass_db = substr($row['pass'], 0, 60); // We are using the first 60 characters of the password hash to verify the password because the password hash is 60 characters long to prevent errors when comparing the password hash with the password hash from the database
        $verified = password_verify($login_pass, $pass_db); // Verify the password given by the user with the password hash from the database

        if ($verified) { // if the password is correct we retrieve all the user data from the database and put it inside session variables

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_type'] = $row['user_type'];

            if ($_SESSION['user_type'] == 'admin') {
                header('location:admin_page.php');
            } else {
                header('location:user_page.php');
            }
        } else { // If the case of the password is incorrect
            $error = 'Incorrect password!';
        }
    } else { // else we can assume that the email is incorrect
        $error = 'Email is not exist!';
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
    <title> Connexion </title>
    <link rel="stylesheet" href="/factory-display/assets/css/connexion départ/inscription.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h1>Connectez-vous :</h1>
            <input type="email" name="email" required placeholder="E-mail">
            <div class="input_password">
                <input type="password" id="pass" name="pass" placeholder="Mot de passe">
                <img src="/factory-display/assets/img/icons/oeil_ouvert-removebg-preview.png" id="eye"
                    onclick="changer()" />
            </div>
            <div class="input submit" onclick="document.fo.submit()"><input type="submit" name="submit"
                    value="Connectez-vous" class="form-btn"> </div>
            <script>
                e = true
                function changer() {
                    if (e) {
                        document.getElementById("pass").setAttribute("type", "text");
                        document.getElementById("eye").src = "/factory-display/assets/img/icons/oeil_ferme-removebg-preview.png";
                        e = false;
                    }
                    else {
                        document.getElementById("pass").setAttribute("type", "password");
                        document.getElementById("eye").src = "/factory-display/assets/img/icons/oeil_ouvert-removebg-preview.png";
                        e = true;
                    }
                }
            </script>
            <!--input type="submit" name="submit" value="Connectez-vous" class="form-btn"> --> <br>
            <p>Vous n'avez pas de compte ? <a href="/factory-display/connexion départ/inscription.html"> Inscrivez-vous
                </a></p><br>
            <p><a href="passwordforgot.html"> Vous avez oublié votre mot de passe ? </a></p>
        </form>
</body>