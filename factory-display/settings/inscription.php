<?php
@include './assets/php/login/config_db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title>inscription</title>
    <script src="/factory-display/assets/js/section/header.js"></script>
    <!-- <script src="/factory-display/assets/js/section/footer.js"></script> -->
    <script src="/factory-display/assets/js/init.js"></script>
    
    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
    <link rel="stylesheet" href="/factory-display/assets/css/settings/inscription.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">

    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
</head>
<body>
    <header></header>
    <div class="form-container">
        <form action="" method="post">
        <h1>Inscrivez-vous:</h1>
        <input type="text" name="name" required placeholder="Nom">
        <br>
        <input type="email" name="email" required placeholder="E-mail">
        <div class="input_password">
            <input type="password" id="pass" name="pass"  placeholder="Mot de passe">
            <img src="/factory-display/assets/img/icons/oeil_ouvert-removebg-preview.png" id="eye" onclick="changer()"/>
        </div>
        <div class="input_password">
            <input type="password" id="pass1" name="pass"  placeholder="Mot de passe">
            <img src="/factory-display/assets/img/icons/oeil_ouvert.png" id="eye1" onclick="changer1()"/>
        </div>
        <div class="input submit" onclick="document.fo.submit()"><input type="submit" name="submit" value="Inscrivez-vous" class="form-btn"> </div> 
        <p> Vous avez déjà un compte ? <a href="/factory-display/settings/account.html">Connectez-vous </a></p>
        <script>
                e= true
            function changer(){
                if(e){
                    document.getElementById("pass").setAttribute("type","text");
                    document.getElementById("eye").src="/factory-display/assets/img/icons/oeil_ferme-removebg-preview.png";
                    e = false;
                }
                else{
                    document.getElementById("pass").setAttribute("type","password");
                    document.getElementById("eye").src="/factory-display/assets/img/icons/oeil_ouvert-removebg-preview.png";
                    e = true;
                }
            }
            e= true
            function changer1(){
                if(e){
                    document.getElementById("pass1").setAttribute("type","text");
                    document.getElementById("eye1").src="/factory-display/assets/img/icons/oeil_ferme.png";
                    e = false;
                }
                else{
                    document.getElementById("pass1").setAttribute("type","password");
                    document.getElementById("eye1").src="/factory-display/assets/img/icons/oeil_ouvert.png";
                    e = true;
                }
            }
        </script>   
    </form>
</body>