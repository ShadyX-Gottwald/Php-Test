<?php



//session_start();    
require_once "DBConn.php";
//require_once "user-login.php";
require_once "session-start.php";

require_once  "Admin.php";

$admin = new AdminImpl();





if (isset($_POST['id'])) {

  //   $sql = sprintf("INSERT INTO cart (bookId)VALUES (%s)",$_POST['id']);


  //  $conn_cartDB->execute_query($sql);

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
  <style>
    .sticky {
      position: fixed;
      top: 0;
      width: 100%;
    }

    .sticky+.content {
      padding-top: 60px;
    }
  </style>
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="top-branding.css">
  <link rel="stylesheet" href="dropdownNav.css">
  <link rel="stylesheet" href="gridStyles.css">
  <link rel="stylesheet" href="Admin-tableViewStyles.css">
  <link rel="stylesheet" href="drop-downStyles.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>


<div class="">

  <div class="top-branding" style="">
    <!--Show cart-->
    <div>
      <a href="Admin-tableView.php" style="margin-bottom: 2px; margin-top: 2px; color: black" class="cart-card">
        <i class="fas fa-shopping-cart">

        </i>View Books<?php
                      ?> </a>

    </div>
  </div>


</div>


</div>

<body>

  <!--NavBar-->

  <div class="topnav">
    
    <a class="active" href="Admin-index.php">Home</a>
    <a href="#about">About</a>


    <!-- search bar right align -->
    <div class="search">
      <form method="get">
        <button>
          <i class="material-icons">search </i>
        </button>
        <input type="text" placeholder=" Search Books.." name="search">

      </form>
    </div>

    <div class="dropdown">
      <a href="" style="margin-left: 45%;">Add </a>
      <div class="dropdown-content">
        <a href="Admin-add-book.php">Book</a>
        <a href="login.php">User</a>

      </div>
    </div>
  </div>

  <hr>

  <!--Start content-->
  <h1>Home</h1>

  <?php

  echo "Welcome " .  $_SESSION['username'];

  ?>


  <!--Home page get all data from DB-->
  <div class="grid-container" style="float:none">

    <?php
    //Select all from DB      
    $conn = require_once __DIR__ . "/getBooksFromDB.php";


    $sql = "SELECT * FROM `tblBooks` ;";

    $result =  $conn->execute_query($sql);

    foreach ($result as $row) : ?>

      <form method="post" action="View-book.php">
        <div class="grid-item" onclick="">

          <img src="book_image_1.jpg" class="book_cover">
          <p> <?php echo $row['title'] ?></p>
          <h6> <?php echo $row['ISBN'] ?></h6>
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <h6 class="hidden-id" name="book-id"><?php echo $row['id'] ?></h6>


          <!--View Book Form-->

          <form method="get" action="View-book.php">

            <button class="add-to-cart-btn" style="align-self: center;" onclick="">
              View Book
            </button>
          </form>



          <!--Delete Book Form-->
          <form method="post" action="Admin-delete-book.php" style="display:inline-block">
            <button class="add-to-cart-btn" style="background-color: red; color: White;">

              Delete
            </button>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          </form>


          <?php $selected_book = $row['id']; ?>

        </div>

      </form>

    <?php endforeach ?>

  </div>

  <br>
  <hr>

  <footer>

    <div class="">

      <div class="top-branding" style="">

      </div>
    </div>


    </div>

  </footer>

  <?php




  ?>

  <!--[if lt IE 7]>
          <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  <script>
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {
      myFunction()
    };

    // Get the navbar
    var navbar = document.getElementsByClassName(".topnav");

    // Get the offset position of the navbar
    var sticky = navbar.offsetTop;

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }

    function book_added() {
      let id_text = document.getElementsByClassName("hidden-id").innerHtml;
      alert("Book succesfully added to cart");

    }
  </script>
</body>

</html>