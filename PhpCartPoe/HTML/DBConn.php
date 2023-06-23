
<?php

// Database connection variables including error;
$host = 'localhost';
$dbname = 'bookstore';
$username = 'root';
$password  = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_errno) {
  die("Connection error : " . $mysqli->connect_error);
}

//Create All Tables and load with data
//init_tables();

function init_tables() {
  createUserTable();
  createAdminTable();
  createBookTable();
  createOrderTable(); 

}

function createOrderTable() {
  global $conn;   

  try {

    $sql_2 = "CREATE TABLE `bookstore`.`tblorder` (`id` INT(8) NOT NULL AUTO_INCREMENT,
     `bookID` INT(8) NOT NULL , `title` VARCHAR(80) NOT NULL ,
      `ISBN` VARCHAR(255) NOT NULL , `price` INT(8) NOT NULL ,
     `quantity` INT(8) NOT NULL DEFAULT '1' ,
     `date_` VARCHAR(255),
      PRIMARY KEY (`bookID`), UNIQUE (`id`)) ENGINE = InnoDB;";//w3schools,2023

   

    $conn->query($sql_2);
     
    
  } catch (Exception $e) {

    $sql = "DROP TABLE tblOrder"; //w3schools,2023
    $conn->query($sql);

  //   $sql_2 =  "CREATE TABLE `bookstore`.`tblbooks`
  //  (`id` INT(8) NOT NULL AUTOINCREMENT PRIMARY KEY  , `bookID` INT(8) NOT NULL ,
  //   `title` VARCHAR(70) NOT NULL ,
  //    `ISBN` VARCHAR(70) NOT NULL ,
  //  `price` INT(8) NOT NULL , PRIMARY KEY
  //   (`bookID`), UNIQUE (`id`), UNIQUE (`ISBN`)) ";
  
    $sql_2 = "CREATE TABLE `bookstore`.`tblorder` (`id` INT(8) NOT NULL AUTO_INCREMENT ,
     `bookID` INT(8) NOT NULL , `title` VARCHAR(80) NOT NULL ,
      `ISBN` VARCHAR(255) NOT NULL , `price` INT(8) NOT NULL ,
     `quantity` INT(8) NOT NULL DEFAULT '1',    
     `date_` VARCHAR(255), 
     PRIMARY KEY (`bookID`), UNIQUE (`id`)) ENGINE = InnoDB;";

    // Prepare an SQL query with empty values as placeholders (with a question mark for each value)
    $stmt = $conn->query($sql_2);
      
   
  }

}

function createUserTable() {   
  global $conn;  

  try{
    $sql =  "CREATE TABLE tblUsers (
  id INT(8) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,   
  email VARCHAR(70) NOT  NULL,
  username VARCHAR(70) NOT NULL,   //w3schools,2023
  pwd VARCHAR(1028) NOT NULL)";

    $conn->query($sql);
    //loadCSVdata() ;    
    preLoadUsers();//w3schools,2023

    

  } 
  catch(Exception $e) { 

    $sql = "DROP TABLE tblUsers"; //w3schools,2023 
    $conn-> query($sql);

    $sql_2 =  "CREATE TABLE tblUsers (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,   
  email VARCHAR(70) NOT  NULL,
  username VARCHAR(70) NOT NULL,   
  pwd VARCHAR(1028) NOT NULL)";//w3schools,2023

    $conn->query($sql_2);
    //loadCSVdata();     
    preLoadUsers() ;

  }

  function createAdminTable(){
    global $conn;

      try {
        $sql =  "CREATE TABLE tblAdmin (
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,   
    email VARCHAR(70) NOT  NULL,
    username VARCHAR(70) NOT NULL,   
    pwd VARCHAR(1028) NOT NULL)";

        $conn->query($sql);   
        preLoadAdmin(); 

    } catch (Exception $e) {

      $sql = "DROP TABLE tblAdmin";
      $conn->query($sql);

      $sql_2 =  "CREATE TABLE tblAdmin (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,   
  email VARCHAR(70) NOT  NULL,
  username VARCHAR(70) NOT NULL,   
  pwd VARCHAR(1028) NOT NULL)";

      $conn->query($sql_2);
      preLoadAdmin(); 
    }
 
}

  function createBookTable(){
    global $conn;

    try {

      $sql_2 =  "CREATE TABLE `bookstore`.`tblbooks`
   (`id` INT(8) NOT NULL AUTOINCREMENT PRIMARY KEY  , `bookID` INT(8) NOT NULL ,
    `title` VARCHAR(70) NOT NULL ,
     `ISBN` VARCHAR(70) NOT NULL ,
   `price` INT(8) NOT NULL , PRIMARY KEY
    (`bookID`), UNIQUE (`id`), UNIQUE (`ISBN`)) ";

      // Prepare an SQL query with empty values as placeholders (with a question mark for each value)
       $conn->query($sql_2);
      echo "After query";
        
      //PreLoad books    
      preLoadBooks();   


    } catch (mysqli_sql_exception) {

      $sql = "DROP TABLE tblbooks";
      $conn->query($sql);

      $sql_2 =  "CREATE TABLE `bookstore`.`tblbooks`
   (`id` INT(8) NOT NULL AUTOINCREMENT PRIMARY KEY  , `bookID` INT(8) NOT NULL ,
    `title` VARCHAR(70) NOT NULL ,
     `ISBN` VARCHAR(70) NOT NULL ,
   `price` INT(8) NOT NULL , PRIMARY KEY
    (`bookID`), UNIQUE (`id`), UNIQUE (`ISBN`)) ";

      $conn->execute_query($sql_2);

      //PreLoad books    
      preLoadBooks();   
    }
  }  
}      

//`image_name` VARCHAR(1028) NULL DEFAULT NULL ,
         // `img` VARCHAR(1028) NULL DEFAULT NULL 
function preLoadBooks() {

  global $conn;  

  for($x=0; $x<=9 ; $x++) {
    $sql_1 =  "INSERT INTO `tblbooks` (
  `title`,
   `ISBN`,
    `price`,
    ) VALUES ( 'Alpha Guardians_vol $x', 'ISBN_3455567$x', 20$x)";

    $sql_2 = sprintf("INSERT INTO `tblbooks`(
     `title`,
      `ISBN`, 
      `price`, 
      `image_name`,
       `img`) VALUES 
    ('%s','%s','%d','%s','%s')",'Alpha Guardians_vol '.$x, 'ISBN_3455567'.$x,(int)'20'.$x,null,null ) ;

    $conn->execute_query($sql_2);

  }

}   

function preLoadUsers() {
  global $conn; 

  // $sql = "INSERT INTO `tblusers` (`id`, `name`, `email`, `pwd`) VALUES
  //  ('1', 'Shady', 'Shady12@gmail.com', 'Babalo123'),
  //   ('2', 'Shady_2', 'Shady123@gmail.com', 'Babalo123')";
   $sql_1 = "INSERT INTO `tblUsers` (`email`
   , `username`, `pwd`) VALUES ( 'Shady12@gmail.com', 'Shady', 'Babalo123')";

   $sql_2= "INSERT INTO `tblUsers` (`email`
   , `username`, `pwd`) VALUES ( 'Shady123@gmail.com', 'Shady_123', 'Babalo123')";

   $conn->execute_query($sql_1);
   $conn->execute_query($sql_2);    

  //$conn->query($sql);

}   

function preLoadAdmin() {  

  global $conn;
  $sql_1 = "INSERT INTO `tblAdmin` (`email`
  , `username`, `pwd`) VALUES ( 'Babalo12@gmail.com', 'Babalo', 'Babalo123')";

  $sql_2 = "INSERT INTO `tblAdmin` (`email`
  , `username`, `pwd`) VALUES ( 'Babalo123@gmail.com', 'Babalo_123', 'Babalo123')";

  $conn->execute_query($sql_1);
  $conn->execute_query($sql_2);   

}

return $conn;
?>