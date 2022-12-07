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

// retrieve data from database
$sql = "SELECT * FROM user_form";

// prepare the query
$stmt = $conn->prepare($sql);

// execute the query
$stmt->execute();

// fetch the result
$result = $stmt->fetchAll();

// display the result
foreach($result as $row){
    echo $row['id']."<br />";
    echo $row['name']."<br />";
    echo $row['email']."<br />";
    echo $row['password']."<br />";
    echo $row['user_type']."<br />";
}
?>
