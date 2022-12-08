<?php
if (isset($_POST['submit'])) {

    // We are retrieving the data given by the user and storing it inside variables
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $confirm_pass = $_POST['c_password'];

    // We are checking if the email is already exist in the database
    $select = " SELECT * FROM user_form WHERE email = '$email' ";
    $result = mysqli_query($conn, $select);


    if (mysqli_num_rows($result) > 0) { // If a result is found we can assume that the email is already exist

        $error[] = 'An account with this email already exists!';

    } else { // The email is not registered in the database

        if ($pass != $confirm_pass) { // If the password and confirm password are not the same we tell the user that there is a problem with the password
            $error[] = 'The password and confirm password is not same!';
        } else { // The password and confirm password are the same
            $passwordHash = password_hash($pass, PASSWORD_DEFAULT); // We are hashing the password using the password_hash function and storing it inside a variable
            $insert = " INSERT INTO user_form (name, email, password, user_type) VALUES ('$name', '$email', '$passwordHash', '$user_type') "; // We are inserting the data into the database

            if (mysqli_query($conn, $insert)) { // if data is successfully inserted into the database we redirect the user to the login page
                $_SESSION['result'] = 'The account has been created successfully!, You can now login!';
                header('location:login_form.php');
            } else {
                $error[] = 'Registration failed!';
            }
        }
    }

    /// Printing values for debugging
    // echo '<br> Name : ' . $name . '/ ' . $_POST['name'] . '<br>';
    // echo 'Email : ' . $email . '<br>';
    // echo 'Password : ' . $pass . '<br>';
    // echo 'Confirm Password : ' . $confirm_pass . '<br>';
    // echo "Generated password: ".$passwordHash;
    // echo 'User Type : ' . $user_type . '<br>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title> Inscription</title>
    <link rel="stylesheet" href="/factory-display/assets/css/connexion départ/inscription.css">
</head>


<body>
    <div class="form-container">
        <form action="" method="post">
            <h1>Inscrivez - vous:</h1>
            <input type="text" name="name" required placeholder="Nom">
            <br>
            <input type="email" name="email" required placeholder="E-mail">
            <div class="input_password">
                <input type="password" id="pass" name="pass" placeholder="Mot de passe">
                <img src="/factory-display/assets/img/icons/oeil_ouvert-removebg-preview.png" id="eye"
                    onclick="changer()" />
            </div>
            <div class="password-confirm">
                <input type="c_password" id="pass1" name="pass" placeholder="Confirmer votre mot de passe">
                <img src="/factory-display/assets/img/icons/oeil_ouvert.png" id="eye1" onclick="changer1()" />
            </div>
            <label>User Type :</label>
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <div class="input submit" onclick="document.fo.submit()"><input type="submit" name="submit"
                    value="Inscrivez-vous" class="form-btn"> </div>
            <p> Vous avez déjà un compte ? <a href="/factory-display/connexion départ/account.html">Connectez-vous </a>
            </p>
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
                e = true
                function changer1() {
                    if (e) {
                        document.getElementById("pass1").setAttribute("type", "text");
                        document.getElementById("eye1").src = "/factory-display/assets/img/icons/oeil_ferme.png";
                        e = false;
                    }
                    else {
                        document.getElementById("pass1").setAttribute("type", "password");
                        document.getElementById("eye1").src = "/factory-display/assets/img/icons/oeil_ouvert.png";
                        e = true;
                    }
                }
            </script>
        </form>
</body>