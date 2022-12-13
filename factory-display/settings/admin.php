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
<div class="admin-main-content">
    <div class="admin-main-content-header">
        <h2>Administration</h2>
    </div>
</div>
