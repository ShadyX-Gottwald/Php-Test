
<?php   

//Php form validation
  if(empty($_POST['name'])) { 
    die("Name is required");
  }    

  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 
    die('Valid email is required');
  }   

  if(strlen($_POST['password']) < 8) { 
    die('Password must be at least 8 characters');  

  }   

  if(!preg_match("/[a-z]/i" , $_POST['password'])) {  
    die("Password must contain one letter");
  }

  if (!preg_match("/[0-9]/", $_POST['password'])) {
   die("Password must contain one number");
  }     

  if($_POST['password'] !== $_POST['password_confirmation']) { 
    die('password must match');
  }   

  //Hashing password   

  $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT) ;

  //Saving db connection to var
 $conn =  require __DIR__. '/database_conn.php';    


//Making sure No Duplicates in DB  

//Try saving user to DB , error if already in DB


// Prepare an SQL query with empty values as placeholders (with a question mark for each value)
$stmt = $conn->prepare("INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)");
// The prepare() method of the connection object takes a SQL query as a parameter and returns a statement object
// The question marks (?) are used as placeholders for the values that will be bound later
// The prepare() method performs a syntax check and initializes server internal resources for later use


$firstname = $_POST['name']; // Assign a value to the variable
$email = $_POST['email']; // Assign a value to the variable
$passwordHash = $password_hash; 

// Bind variables to the placeholders by stating each variable, along with its type
$stmt->bind_param("sss", $firstname, $email, $passwordHash);
// The bind_param() method of the statement object takes two or more parameters: 
// The first parameter is a string that specifies the data types of each variable that will be bound
// The s character tells MySQL that the variable is a string
// The following parameters are the variables that will be bound to the placeholders in the SQL query
// The number of variables and placeholders must match


$stmt->execute(); // The execute() method of the statement object executes the prepared statement with the bound values

// Close the statement and the connection
$stmt->close(); // The close() method of the statement object closes the statement and frees up any resources
 header('Location: signup-success.html');

  /* print_r($_POST);   
  var_dump($password_hash); */    

  
?>