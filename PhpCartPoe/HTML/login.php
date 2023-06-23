<?php

include_once "DBConn.php";
//init_tables();

//initialise Tables;
//init_tables();
?>


<?php
// require_once "DBConn.php";   

// //initialise Tables;
// init_tables();
$is_invalid = false;

// Init post to get DB and query where we get data by email.
if ($_SERVER["REQUEST_METHOD"] === "POST") {


  $sql = sprintf("SELECT * FROM tblUsers WHERE email = '%s'", $conn->real_escape_string($_POST['email']));

  $result = $conn->query($sql);

  $user = $result->fetch_assoc();

  /* var_dump($user);  
   exit;  */

  //
  if ($user) {

    //Verify User password   
    if ($_POST['password'] == $user['pwd']) {

      session_start();
      require_once "session-start.php";
      //Set all Tables again , since login is done once and wont refresh the data on runtime.   
      require_once "createTable.php";


      //Set session with user id 
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['username'];

      echo $_SESSION['user_name'];

      header("Location: index.php");

      //return $_SESSION;
    } else {

      // header("Location: login.php");

    }

    //Get data from form , and compare with hashed passsword    
    /*  if (password_verify($_POST['password'], $user['pwd'])) {
      // die('Login Successful');   
      session_start();

      //Set session with user id 
      $_SESSION['user_id'] = $user['id'];   
      $_SESSION['user_name'] = $user['username'];

      //THen redirect  
      header("Location: login.php");
      exit;
    } 
    else {
      header("Location: index.php");
      
    }*/
  }

  //Successful login
  $is_invalid = true;
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="top-branding.css">
  <link rel="stylesheet" href="dropdownNav.css">
  <link rel="stylesheet" href="gridStyles.css">
  <link rel="stylesheet" href="login-styles.css">


</head>

<body>
  <!--[if lt IE 7]>
          <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


  <!--Top Navigation-->

  <div class="">

    <div class="top-branding" style="float:none">
      <p style="float:right">Top </p>

      <!--Show cart-->
      <div>

        <h4 style="margin-bottom: 4px;" class="cart-card"><i class="fas fa-cart-shopping"></i>Your cart </h4>

      </div>
    </div>

  </div>


  <!--NavBar-->

  <div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>


    <!-- search bar right align -->
    <div class="search">
      <form action="getBooksFromDB.php" method="get">
        <button>
          <i class="fas fa-search"></i>
        </button>
        <input type="text" placeholder=" Search Books.." name="search">

      </form>
    </div>

    <div class="dropdown">
      <a href="" style="margin-left: 45%;">Login </a>
      <div class="dropdown-content">
        <a href="signup.php">Sign Up</a>
        <a href="login.php">Log in</a>

      </div>
    </div>
  </div>

  <hr>

  <h1>Login </h1>

  <?php

  if ($is_invalid) :
  ?>
    <em>Invalid Login</em>
  <?php endif
  ?>


  <div class="login-styles">
    <form method="post">

      <label for="email">Email </label>
      <input type="email" name="email" id="email" value="<?= htmlspecialchars($POST['email'] ?? "") ?>">

      <input type="hidden" name="id" value="<?php  ?>">

      <label for="password">Password </label>
      <input type="password" name="password" id="password">

      <button>
        Login
      </button>

    </form>

    <div styles="margin-left: 10px">
      <a href="Login-admin.php"> Admin</a>
    </div>

  </div>


  <script src="" async defer></script>
</body>

</html>