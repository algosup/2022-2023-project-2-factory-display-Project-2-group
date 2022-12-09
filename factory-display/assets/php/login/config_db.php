<?php

$db_host = 'jacobi-dbserver-grp2.database.windows.net';
$db_user = 'sqljacobi';
$db_password = 'pQgxk#6B3tNHDjG4';
$db_db = 'JacobiDatabase';
$db_port = 1433;

try {
    $conn = new PDO("sqlsrv:server = tcp:jacobi-dbserver-grp2.database.windows.net,1433; Database = JacobiDatabase", "sqljacobi", "pQgxk#6B3tNHDjG4");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error[] = "Error connecting to SQL Server.";
    die(print_r($e));
}

if ($conn) {
    $success[] = "Connection with the database has been established \r\n";
} else {
    $error[] = "Connection could not be established \r\n";
}
?>