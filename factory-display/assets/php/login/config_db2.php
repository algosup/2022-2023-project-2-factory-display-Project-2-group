<?php

$db_host = 'jacobi-dbserver-grp2.database.windows.net';
$db_user = 'sqljacobi';
$db_password = 'pQgxk#6B3tNHDjG4';
$db_db = 'JacobiDatabase';
$db_port = 1433;

// Create connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_db, $db_port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "Connection established.<br />";
}

?>