<?php

$db_host = 'jacobi-dbserver-grp2.database.windows.net';
$db_user = 'sqljacobi';
$db_password = 'pQgxk#6B3tNHDjG4';
$db_db = 'JacobiDatabase';
$db_port = 1433;

try {
    $conn = new PDO("sqlsrv:server = tcp:$db_host,$db_port; Database = $db_db", "$db_user", "$db_password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

if($conn){
    echo "Connection established \r\n";
}else{
    echo "Connection could not be established \r\n";
}

// create select query
$sql = "SELECT * FROM user_form";
// execute query
$result = $conn->query($sql);
// fetch data
while($row = $result->fetchAll(PDO::FETCH_ASSOC)){
    echo $row['id'];
}

?>