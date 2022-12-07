<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:jacobi-dbserver-grp2.database.windows.net,1433; Database = JacobiDatabase", "sqljacobi", "pQgxk#6B3tNHDjG4");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
} 

if($conn){
    echo "Connection established.<br />";
}else{
    echo "Connection could not be established.<br />";
}

?>