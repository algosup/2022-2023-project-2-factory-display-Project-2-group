<?php

@include '../php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
    // check if the user is an admin
    if ($_SESSION['role'] == "admin") {

        if (isset($_POST['modify'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $sql = "UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id, 'name' => $name, 'email' => $email, 'role' => $role]);
            $success = "L'utilisateur a bien été modifié.";
        }

        if (isset($_POST['view'])) {
            $id = $_POST['id'];
            $sql = "SELECT * FROM user_form WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            $user = $stmt->fetch();
        }

    } else {
        // redirect to the user page
        $_SESSION['error'] = "Vous n'avez pas les droits pour accéder à cette page.";
        header('location:/factory-display/index.php');
    }
} else {
    // redirect to the login page
    header('location:/factory-display/settings/account.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title>Administration</title>

    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/font-awesome.css">
    <link rel="stylesheet" href="/factory-display/assets/css/settings/homepage.css">

    <script src="/factory-display/assets/headers/header.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
</head>

<body>
<header>
        <?php include '../headers/header-admin.html'; ?>
    </header>

    <?php if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM user_form WHERE id = :id";
        $result = $pdo->prepare($sql);
        $result->execute(['id' => $id]);
        $success = "L'utilisateur a bien été supprimé.";
    ?>

    <script>
        swal("L'utilisateur a bien été supprimé.",
            "Vous allez être redirigé vers la page d'accueil.",
            "success", {
            button: "OK",
        }).then(function () {
            window.location = "/factory-display/index.php";
        });
    </script>
    <?php } ?>

    <?php if (isset($_POST['modify'])) { ?>

    <?php } ?>