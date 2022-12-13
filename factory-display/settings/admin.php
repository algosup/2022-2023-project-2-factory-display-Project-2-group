<?php
// ADMINISTRATION PAGE

// Check if the user is logged in
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        $authorize = true;
    } else {
        $authorize = false;
    }
} else {
    $error[] = "Vous n'êtes pas autorisé à accéder à cette page.";
}
?>

<?php
// we print the error message if there is one
if (isset($error)) {
    foreach ($error as $error) {
        echo '<p class="error">' . $error . '</p>';
    }
}
