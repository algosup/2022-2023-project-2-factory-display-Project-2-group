<?php
// disconnect the user
session_start();
session_destroy();
// redirect to the login page
header('location:/factory-display/settings/account.php');
?>