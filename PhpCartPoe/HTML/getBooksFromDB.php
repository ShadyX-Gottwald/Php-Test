
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'bookstore';


// Create connection
$conn_bookDB = new mysqli($servername, $username, $password , $dbname);

// Check connection
if ($conn_bookDB->connect_error) {
  die("Connection failed: " . $conn_bookDB->connect_error);
}
//echo "Connected successfully";

return $conn_bookDB;    


?>