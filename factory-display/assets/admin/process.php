<?php

@include '../php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
    // check if the user is an admin
    if ($_SESSION['role'] == "admin") {

        // Delete or Modify a user according to the button clicked
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $sql = "DELETE FROM user_form WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            $_SESSION['success'] = "L'utilisateur a bien été supprimé.";
            header('location:/factory-display/settings/admin.php');
        } else
            if (isset($_POST['modify'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $role = $_POST['role'];
                $sql = "UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $id, 'name' => $name, 'email' => $email, 'role' => $role]);
                $_SESSION['success'] = "L'utilisateur a bien été modifié.";
                header('location:/factory-display/settings/admin.php');
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