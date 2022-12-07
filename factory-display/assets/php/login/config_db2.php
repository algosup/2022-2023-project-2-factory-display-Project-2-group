<?php
$db_host = 'jacobi-dbserver-grp2.database.windows.net';
$db_user = 'sqljacobi';
$db_password = 'pQgxk#6B3tNHDjG4';
$db_db = 'JacobiDatabase';
$db_port = 1433;

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, "BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);
mysqli_real_connect($conn, $db_host, $db_user, $db_password, $db_db, $db_port, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL);

if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
} else {
    echo 'Connection OK';
}

$_SESSION['test_connection'] = 'Success: A proper connection to the server was made. <br> Host information: ' . $conn->host_info . '<br> Protocol version:' . $conn->protocol_version . '<br>';
echo $_SESSION['test_connection']; // Used to print the connection status
?>