<?php

@include '../php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
    // check if the user is an admin
    if ($_SESSION['role'] == "admin") {

        if (isset($_POST['submit'])) {
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

    <?php if (isset($success)) { ?>
    <script>
        swal("L'utilisateur a bien été modifié.",
            "Vous allez être redirigé vers la page d'accueil.",
            "success", {
            button: "OK",
        }).then(function () {
            window.location = "/factory-display/index.php";
        });
    </script>
    <?php } ?>
    
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

    <?php if (isset($_POST['modify'])) { // we creating a html page where the admin can edit user's informations ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Edition de l'utilisateur <?php echo $user['name']; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="process.php" method="post">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $user['name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="role">Rôle</label>
                        <select class="form-control" name="role" id="role">
                            <option value="admin" <?php if ($user['role'] == "admin") {
                                                        echo "selected";
                                                    } ?>>Administrateur</option>
                            <option value="user" <?php if ($user['role'] == "user") {
                                                        echo "selected";
                                                    } ?>>Utilisateur</option>
                        </select>
                    </div>

                    <input type="submit" name="modify" value="Modifier" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <?php } ?>