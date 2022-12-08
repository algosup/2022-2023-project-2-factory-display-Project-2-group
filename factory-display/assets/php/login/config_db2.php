<?php 
$db_host = 'tcp:jacobi-dbserver-grp2.database.windows.net,1433';
  $db_user = 'sqljacobi';
  $db_password = 'pQgxk#6B3tNHDjG4';
  $db_db = 'JacobiDatabase';

  $conn = new mysqli(
    $db_host,
    $db_user,
    $db_password
  );
	
  if ($conn->connect_error) {
    echo 'Errno: '.$conn->connect_errno;
    echo '<br>';
    echo 'Error: '.$conn->connect_error;
    exit();
  }

  $_SESSION['test_connection'] = 'Success: A proper connection to MySQL was made. <br> Host information: '.$conn->host_info.'<br> Protocol version:'.$conn->protocol_version.'<br>';
  //echo $_SESSION['test_connection']; // Used to print the connection status
?>