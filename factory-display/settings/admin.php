<?php
// ADMINISTRATION PAGE

// Check if the user is logged in
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != "admin") {
        $error[] = "Vous n'êtes pas autorisé à accéder à cette page.";
    }

    // we get the list of users
    $select_all_users = "SELECT id, name FROM user_form";
    $result_users = $conn->query($select_all_users);

    $row1 = $result_users->fetch(PDO::FETCH_ASSOC);

    // we check the user choice in the select and we make a request to get the data of the user
    if (isset($_POST['users'])) {
        $id = $_POST['users'];
        $sql = "SELECT name, email, role FROM user_form WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['select-name'] = $row['name'];
        $_SESSION['select-email'] = $row['email'];
        $_SESSION['select-role'] = $row['role'];
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
        <p>Choissisez un utilisateur : </p>
        <form action="" method="post">
            <select name="users" id="list-users">
                <option value="">Choissisez un utilisateur</option>
                <?php
                // we print the list of users
                while ($row1 = $result_users->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . $row1['id'] . '">' . $row1['name'] . '</option>';
                }
                ?>
            </select>
            <input type="submit" name="submit" value="Valider">
        </form>
    </div>
    <hr class="solid">
    <div class="select-value-display">
        <form action="" method="post">
            <div class="name">
                <p><b>Nom :</b>
                    <?php
                    if (isset($_SESSION['select-name'])) {
                        echo '<input type="text" name="name" value="' . $_SESSION['select-name'] . '" disabled>';
                    } else {
                        echo '<input type="text" name="name" value="" disabled>';
                    }
                    ?>
                </p>
            </div>
            <div class="email">
                <p><b>E-mail :</b>
                    <?php
                    if (isset($_SESSION['select-email'])) {
                        echo '<input type="text" name="email" value="' . $_SESSION['select-email'] . '" disabled>';
                    } else {
                        echo '<input type="text" name="email" value="" disabled>';
                    }
                    ?>
                </p>
            </div>
            <div class="role">
                <p><b>Rôle :</b>
                    <?php
                    if (isset($_SESSION['select-role'])) {
                        if ($_SESSION['select-role'] == "user") {
                            $role = "Utilisateur";
                        } else
                            if ($_SESSION['select-role'] == "admin") {
                                $role = "Administrateur";
                            }
                        echo '<input type="text" name="role" value="' . $role . '" disabled>';
                    } else {
                        echo '<input type="text" name="role" value="" disabled>';
                    }
                    ?>
                </p>
            </div>
            <div class="admin-button">
                <button type="submit" name="submit" value="submit">Modifier</button>
            </div>
        </form>
    </div>
</div>