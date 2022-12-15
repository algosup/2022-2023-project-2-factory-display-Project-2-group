<?php
@include '../php/login/config_db.php';

session_start();

// make a request to the database to get all the users
$sql = "SELECT * FROM user_form";

// we get the result of the request
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title>Administration</title>

    <script src="/factory-display/assets/headers/header.js"></script>


    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">
    <link rel="stylesheet" href="/factory-display/assets/css/libs/font-awesome.css">
    <link rel="stylesheet" href="/factory-display/assets/css/settings/homepage.css">
    <link rel="stylesheet" href="/factory-display/assets/css/admin/main.css">

    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
</head>

<body>

    <header>
        <?php include '../headers/header-admin.html'; ?>
    </header>

    <div class="main-content-admin">
        <div class="admin-header">
            <h1>Liste des comptes </h1>
        </div>

        <div class="admin-table-user"> <!-- make a table  with all the users from the database -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rôle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    // we fetch the result
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php if ($row['role'] == "admin") {
                                echo "Administrateur";
                            } else {
                                echo "Utilisateur";
                            } ?>
                        </td>
                        <td>
                            <form action="process.php" method="post">
                                <input type="submit" id="<?php echo $row['id']; ?>" name="delete" value="Supprimer"
                                    class="btn btn-danger">
                                <input type="submit" id="<?php echo $row['id']; ?>" name="edit" value="Modifier"
                                    class="btn btn-primary">
                                <input type="submit" id="<?php echo $row['id']; ?>" name="view" value="Consulter"
                                    class="btn btn-success">
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
