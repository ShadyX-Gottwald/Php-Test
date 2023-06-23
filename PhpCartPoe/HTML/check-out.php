<?php

include_once "User.php";

$user = new SellerImpl();

//$user-> login();

$user->logout();

//Display Session Data   
//Destroy session   
//Go back to login screen.  

//empty cart.    

// echo $_SESSION['username'];  
// echo $_SESSION['username'];    


//Drop cart  Table
//header("Location: login.php");

?>

<br>
<br>
<br>

<a href="login.php">Login</a>