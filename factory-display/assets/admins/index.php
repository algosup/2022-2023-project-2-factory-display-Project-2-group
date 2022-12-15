<?php
@include 'factory-display/assets/php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
    // check if the user is an admin
    if ($_SESSION['role'] == "admin") {
        // redirect to the admin page
        $ok = true;

        // make a request to the database to get all the users
        $sql = "SELECT * FROM user_form";

        // we get the result of the request
        $result = $conn->query($sql);

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

<?php
if ($ok) {
    echo "ok";
}
?>