
<?php  

//tblUser   


require_once "DBConn.php";

//createBookTbl();   
//init_tables();  

try{

  createUserTable();   
  echo "Successful Adding to Table <br>";

} 
catch(Exception $e) { 
  echo "Failed Creating Table <br>";
}


try {
 createAdminTable();
  echo "Successful Adding to Table admin <br>";
} catch (Exception $e) {
  echo "Failed Creating Table Admin<br>";
}

function check_table_exists ( ): bool {
  global $conn;
  // The query to execute
  $query = "SHOW TABLES LIKE 'tblbooks'";

  // Execute the query and get the result
  $result = $conn->query ($query);

  // Check if the result has one row
  if ($result->num_rows == 1) {
    return true; // Table exists
  } else {
    return false; // Table does not exist
  }
}

// Call the function and print the result
if (check_table_exists()) {
  echo "Table exists";   
  //add Books 
  //Drop it and add books  
  $sql = "DROP TABLE tblbooks";   
  $conn->execute_query($sql);
  //createBookTable(); 

  //`image_name` VARCHAR(1028) NULL DEFAULT NULL ,
   //`img` VARCHAR(1028) NULL DEFAULT NULL 
  $sql_2 = "CREATE TABLE `bookstore`.`tblbooks` (`id` INT(8) UNSIGNED AUTO_INCREMENT NOT NULL     ,
   `title` VARCHAR(255) NOT NULL , `ISBN` VARCHAR(255) NOT NULL ,
   `price` INT(8) NOT NULL ,
   `image_name` VARCHAR(1028) NOT NULL DEFAULT '' ,
   `img` VARCHAR(1028) NOT NULL DEFAULT '', 
    PRIMARY KEY (`id`), UNIQUE (`ISBN`)) ENGINE = InnoDB";
  $conn->execute_query($sql_2); 


  preLoadBooks();  

} else {
  echo "Table does not exist"; 
  
  $sql = "CREATE TABLE `bookstore`.`tblbooks` (`id` INT(8) UNSIGNED AUTO_INCREMENT NOT NULL     ,
   `title` VARCHAR(255) NOT NULL , `ISBN` VARCHAR(255) NOT NULL ,
   `price` INT(8) NOT NULL ,
   `image_name` VARCHAR(1028) NULL DEFAULT NULL ,
   `img` VARCHAR(1028) NULL DEFAULT NULL, 
    PRIMARY KEY (`id`), UNIQUE (`ISBN`)) ENGINE = InnoDB";
  $conn->execute_query($sql);

  //Create books table 
  preLoadBooks();
}


try {

  //createBookTable();
  echo "Successful Adding to BookTable <br>";
} catch (mysqli_sql_exception) {
  echo "Failed Creating Book Table <br>";
}

try {

  createOrderTable();
  echo "Successful Adding to Order Table <br>";
} catch (Exception $e) {
  echo "Failed Creating Order Table <br>";  
  echo $e;
}


// function createBookTbl() {

//   global $conn; 

  $sql =  "CREATE TABLE `bookstore`.`tblbooks`
   (`id` INT(8) NOT NULL AUTOINCREMENT PRIMARY KEY  , `bookID` INT(8) NOT NULL ,
    `title` VARCHAR(70) NOT NULL ,
     `ISBN` VARCHAR(70) NOT NULL ,
   `price` INT(8) NOT NULL , PRIMARY KEY
    (`bookID`), UNIQUE (`id`), UNIQUE (`ISBN`)) ";

//   // Prepare an SQL query with empty values as placeholders (with a question mark for each value)   

//   $conn->execute_query($sql);
//  // $stmt = $conn->prepare($sql);
//  //// $stmt->execute();
//   //PreLoad books    
//   preLoadBooks();   

// }

//init_tables();



/*  $sql =  "CREATE TABLE tblUser (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,   
  email VARCHAR(70) NOT  NULL,
  username VARCHAR(70) NOT NULL,   
  pwd VARCHAR(1028) NOT NULL)"; */

// $conn->execute_query($sql);

//echo "table created successful";   

//Get post Data and validate ,saving into database userTable      

//Php form validation
/*  if (empty($_POST['name'])) {
    die("Name is required");
  }

  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die('Valid email is required');
  }

  if (strlen($_POST['password']) < 8) {
    die('Password must be at least 8 characters');
  }

  if (!preg_match("/[a-z]/i", $_POST['password'])) {
    die("Password must contain one letter");
  }

  if (!preg_match("/[0-9]/", $_POST['password'])) {
    die("Password must contain one number");
  }

  if ($_POST['password'] !== $_POST['password_confirmation']) {
    die('password must match');
  } */

//Hashing password   

//$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

//Saving db connection to var
//$conn =  require __DIR__ . '/database_conn.php';


//Making sure No Duplicates in DB  

//Try saving user to DB , error if already in DB


/*  // Prepare an SQL query with empty values as placeholders (with a question mark for each value)
  $stmt = $conn->prepare("INSERT INTO tblUser (username, email, pwd) VALUES (?, ?, ?)");
  // The prepare() method of the connection object takes a SQL query as a parameter and returns a statement object
  // The question marks (?) are used as placeholders for the values that will be bound later
  // The prepare() method performs a syntax check and initializes server internal resources for later use


  $firstname = $_POST['name']; // Assign a value to the variable
  $email = $_POST['email']; // Assign a value to the variable
// $passwordHash = $password_hash;   
 $passwordHash = $_POST['password'];

  // Bind variables to the placeholders by stating each variable, along with its type
  $stmt->bind_param("sss", $firstname, $email, $passwordHash);
  


  $stmt->execute(); // The execute() method of the statement object executes the prepared statement with the bound values

  // Close the statement and the connection
  $stmt->close(); // The close() method of the statement object closes the statement and frees up any resources
  header('Location: signup-success.html'); */


header('Location: login.php');





?>