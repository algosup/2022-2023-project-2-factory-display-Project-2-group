<?php 
@include '../php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
    // check if the user is an admin
    if ($_SESSION['role'] == "admin") {

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $id = $_POST['id'];

            $sql = "UPDATE user_form SET name = :name, email = :email, role = :role WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute(['name' => $name, 'email' => $email, 'role' => $role, 'id' => $id]);

            // check if the query was successful
            if ($result) {
                $_SESSION['success'] = "L'utilisateur a été modifié avec succès.";
                header('location:display.php');
            } else {
                $_SESSION['error'] = "Une erreur est survenue lors de la modification de l'utilisateur.";
                header('location:display.php');
            }
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
