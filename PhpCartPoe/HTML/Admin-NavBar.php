<?php

/*
 * Reference list:
 * PHP File Upload. [online] phptutorial.net.
 *  Available at: https://www.phptutorial.net/php-tutorial/php-file-upload/ [Accessed 20 June. 2023].
 * 
 * PHP OOP Classes and Objects. [online] w3schools.com. 
 * Available at: https://www.w3schools.com/PHP/php_oop_classes_objects.asp [Accessed 1 Jan. 1970].
 * 
 * PHP mysqli fetch_assoc() Function. [online] w3schools.com.
 *  Available at: https://www.w3schools.com/PHP/func_mysqli_fetch_assoc.asp [Accessed 20 June. 2023].
 * 
 * PHP MySQL Connect to database. [online] w3schools.com.
 *  Available at: https://www.w3schools.com/PHP/php_mysql_connect.asp [Accessed 20 June. 2023].
 * 
 * PHP MySQL Select Data With ORDER BY Clause. [online] w3schools.com.
 *  Available at: https://www.w3schools.com/PHP/php_mysql_select_orderby.asp [Accessed 20 June. 2023].
 * 
 * PHP Sessions. [online] w3schools.com.
 *  Available at: https://www.w3schools.com/PHP/php_sessions.asp [Accessed 1 Jan. 1970].
 * 
 * CSS Styling Tables. [online] w3schools.com.
 *  Available at: https://www.w3schools.com/css/css_table.asp [Accessed 1 Jan. 1970].
 * 
 * CSS Navigation Bar. [online] w3schools.com. 
 * Available at: https://www.w3schools.com/css/css_navbar.asp [Accessed 1 Jan. 1970].
 * ** */


?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="top-branding.css">
  <link rel="stylesheet" href="dropdownNav.css">
  <link rel="stylesheet" href="gridStyles.css">
  <link rel="stylesheet" href="Admin-tableViewStyles.css">
  <link rel="stylesheet" href="drop-downStyles.css">
  <link rel="stylesheet" href="Admin-add-bookStyles.css">


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<div class="">

  <div class="top-branding" style="">
    <p style="float:right">Top </p>

    <!--Show cart-->
    <div>

      <a href="show-cart-items.php" style="margin-bottom: 2px; margin-top: 2px; color: black" class="cart-card">
        <i class="fas fa-shopping-cart"></i>Your cart <?php



                                                      ?> </a>

    </div>
  </div>


</div>


</div>

<section>

  <!--NavBar-->

  <div class="topnav">
    <a class="active" href="Admin-index.php">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>


    <!-- search bar right align -->
    <div class="search">
      <form action="getBooksFromDB.php" method="get">
        <button>
          <i class="material-icons">search</i>
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


</section>

<hr>