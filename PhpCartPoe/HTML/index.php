<?php

include "Cart.php";
require_once "DBConn.php";


$cart = new Cart();


try {


  //require_once "user-login.php";
  require_once "session-start.php";
} catch (Exception $e) {
}



$sql = "SELECT * FROM tblOrder ORDER by date_ ";

$conn->execute_query($sql);
$query = "select count(*) as total from tblorder";
$result = $conn->execute_query($query);
$data = mysqli_fetch_assoc($result);
//echo $data['total'];

?>

<?php

// Adding book to cart
if (isset($_POST['bookID'])) {
  $cart->add_book($_POST['bookID']);
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
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="top-branding.css">
  <link rel="stylesheet" href="dropdownNav.css">
  <link rel="stylesheet" href="gridStyles.css">
  <link rel="stylesheet" href="About.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



</head>


<div class="">

  <div class="top-branding" style="">
    <p style="float:right">Top </p>

    <!--Show cart-->
    <div>

      <a href="show-cart-items.php" style="margin-bottom: 2px; margin-top: 2px; color: black" class="cart-card">
        <i class="fas fa-shopping-cart"></i>Your cart <?php

                                                      if (empty(isset($row['id']))) {
                                                        echo $data['total'];
                                                      } else {
                                                        //Get Count From Order Table 

                                                        echo $data['total'];
                                                      }

                                                      ?> </a>

    </div>
  </div>


</div>


</div>

<body>

  <!--NavBar-->

  <div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="About.php">About</a>
    <a href="#contact">Contact</a>


    <!-- search bar right align -->
    <div class="search">
      <form action="search-book-title.php" method="post">
        <button>
          <i class="material-icons">search</i>
        </button>
        <input type="text" placeholder=" Search Books.." name="string">



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

  <!--Start content-->
  <h1>Home</h1>

  <?php


  echo "<h3 style= 'margin-left: 40%'>Welcome</h3> ";
  echo "<h5  Welcome, /h5>" . $_SESSION['username'] . "<br>";
  //if (//isset($_SESSION['user_id'])) var_dump($_SESSION[]): 
  ?>


  <?php include_once "About.php" ?>

  <!--<p>You are Logged in. <?php // echo "Welcome" . $_SESSION['user_name'] 
                            ?></p>-->
  <!-- <?php //else : 
        ?>-->
  <!--<p> <a href="login.php">Log in</a> or <a href="signup.php">sign up</a></p>-->
  <!-- <?php // endif 
        ?> -->

  <!--Home page get all data from DB-->
  <div class="grid-container" style="float:none">

    <?php
    //Select all from DB      
    $conn = require_once __DIR__ . "/getBooksFromDB.php";


    $sql = "SELECT * FROM `tblBooks` WHERE id < 7;";

    $result =  $conn->execute_query($sql);

    foreach ($result as $row) : ?>

      <form method="post">
        <div class="grid-item" onclick="">

          <img src="book_image_1.jpg" class="book_cover">
          <p> <?php echo $row['title'] ?></p>
          <h6> <?php echo $row['ISBN'] ?></h6>
          <input type="hidden" name="bookID" value="<?php echo $row['id'] ?>">
          <input type="hidden" name="title" value="<?php echo $row['title'] ?>">
          <input type="hidden" name="ISBN" value="<?php echo $row['ISBN'] ?>">
          <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
          <input type="hidden" name="date" value="<?php ?>">


          <h6 class="hidden-id" name="book-id"><?php echo $row['id'] ?></h6>


          <button class="add-to-cart-btn" style="align-self: center;" onclick="book_added_to_cart()">
            Add To Cart
          </button>

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
    function book_added_to_cart() {
      let id_text = document.getElementsByClassName("hidden-id").innerHtml;
      alert("Book succesfully added to cart");

    }
  </script>
</body>

</html>