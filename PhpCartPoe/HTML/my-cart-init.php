<?php

//Connect with database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testBooksStore";


// Create connection with database.
$conn_cartDB = mysqli_connect($servername, $username, $password, $dbname);
$sql = "CREATE TABLE cart(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, bookId VARCHAR(20))";
// Check connection
if (!$conn_cartDB) {
  die("Connection failed: " . mysqli_connect_error());
} else {

  // Check if the table exists by selecting 1 from it
  $val = $conn_cartDB->query("SELECT * from `cart`");   

  //Drop Table query  
  $drop = "DROP TABLE cart";

  // If the table does not exist, execute the create table query
  if ($val === FALSE) {
    $sql = "CREATE TABLE cart(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, bookId VARCHAR(20) NOT NULL)";
    $conn_cartDB->execute_query($sql); 

  }  
  else {
    $drop = "DROP TABLE cart";
    $conn_cartDB->execute_query($drop); 
    
  }
  // create cart table
  $sql = "CREATE TABLE cart(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, bookId VARCHAR(20) NOT NULL)";
 
}   

return $conn_cartDB;

?>