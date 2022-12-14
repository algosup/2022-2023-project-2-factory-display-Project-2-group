<?php
// ADMINISTRATION PAGE

// Check if the user is logged in
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != "admin") {
        $error[] = "Vous n'êtes pas autorisé à accéder à cette page.";
    }
} else {
    $error[] = "Vous n'êtes pas connecté, vous ne pouvez pas accéder à cette page.";
    header('Location: /factory-display/settings/account.php');
}
?>

<?php
// we print the error message if there is one
if (isset($error)) {
    foreach ($error as $error) {
        echo '<p class="error">' . $error . '</p>';
    }
}
?>
<div class="rightside-container-admin-header">
    <h2>Administration</h2>
</div>
<div class="rightside-container-admin-content">
    <div class="admin-header">
        <div id="icon">
            <i class="fa-solid fa-users"></i>
        </div>
        <div id="title">
            <h3>Liste des Utilisateurs</h3>
        </div>
        <hr class="solid">
    </div>

    <div class="admin-select">
        <p>Choissisez un utilisateur : </p><select name="users" id="list-users">
            <option value="user1">User 1</option>
            <option value="user2">User 2</option>
    </div>
    <hr class="solid">
    <div class="select-value-display">
        <form action="a" method="post">
            <div class="name">
                <p><b>Nom :</b>
                    <?php $_SESSION['name'] = "John Doe";
                                        echo '<input type="text" name="name" value="' . $_SESSION['name'] . '" disabled>'; ?>
                </p>
            </div>
            <div class="email">
                <p><b>E-mail :</b>
                    <?php $_SESSION['email'] = "test@gmail.com";
                                        echo '<input type="text" name="email" value="' . $_SESSION['email'] . '" disabled>'; ?>
                </p>
            </div>
            <div class="role">
                <p><b>Rôle :</b>
                    <?php $_SESSION['role'] = "Administrateur";
                                        echo '<input type="text" name="role" value="' . $_SESSION['role'] . '" disabled>'; ?>
                </p>
            </div>
            <div class="role">
                <p><b>Statut :</b>
                    <?php $_SESSION['status'] = "Actif";
                                        echo '<input type="text" name="status" value="' . $_SESSION['status'] . '" disabled>'; ?>
                </p>
            </div>
        </form>
    </div>
</div>