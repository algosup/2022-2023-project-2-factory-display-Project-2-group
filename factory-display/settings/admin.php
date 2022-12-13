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
if ($authorize) {
    echo "You are authorized to access this page";
} ?>