<?php
require_once "DBConn.php";
include_once "Cart.php";

$sql = "SELECT * FROM tblOrder bookID"; //(w3schools,2023)

$cart = new Cart();//(w3schools,2023)

$result_2 =  $conn->query($sql);//(w3schools,2023)

$query = "select count(*) as total from tblOrder";
$result = $conn->execute_query($query);//(w3schools,2023)
$data = mysqli_fetch_assoc($result);


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
  <link rel="stylesheet" href="cartStyles.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="top-branding.css">
  <link rel="stylesheet" href="dropdownNav.css">
  <link rel="stylesheet" href="gridStyles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

  <div class="">

    <div class="top-branding" style="">
      <p style="float:right">Top </p>

      <!--Show cart-->
      <div>

        <a href="show-cart-items.php" style="margin-bottom: 2px; margin-top: 2px; color: black" class="cart-card">
          <i class="fas fa-shopping-cart"></i>Your cart <?php

                                                        if (empty(isset($row['id']))) {
                                                          echo $data['total'];//(w3schools,2023)
                                                        } else {
                                                          //Get Count From Order Table 

                                                          echo $data['total'];//(w3schools,2023)
                                                        }

                                                        ?> </a>

      </div>
    </div>


  </div>

  <!--NavBar-->

  <div class="topnav">
    <a class="active" href="index.php">Home</a>
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

  <hr>




  <H1>Cart Items</H1>


  <!--Table Task Data-->
  <table id="books">
    <thead>
      <tr>
        <th>TITLE</th>
        <th>ISBN</th>
        <th>ID</th>
        <th>QUANTITY</th>
        <th>PRICE</th>
        <th>ACTIONS</th>
        <th>DELETE</th>
      </tr>
    </thead>

    <tbody>
      <?php

      foreach ($result_2 as $book) : ?>

        <tr>
          <td style="width: 25%; ">
            <?php echo $book['title'] ?>
          </td>

          <td style="width: 10%; ">
            <?php echo $book['ISBN'] ?>
          </td>


          <td style="width: 7%; ">
            <?php echo $book['bookID'] ?>
          </td>

          <td style="width: 7%; ">
            <?php echo $book['quantity'] ?>
          </td>

          <td>
            <?php echo $book['price'] ?>
          </td>

          <td>

            <div class="table-increase">
              <form method="post" action="Cart-increase-quantity.php">
                <button class="table-increase-btn" style="display:inline"> add</button>
                <input type="hidden" name="bookID" value="<?php echo $book['id'] ?>">
                <input type="hidden" name="title" value="<?php echo $book['title'] ?>">
                <input type="hidden" name="ISBN" value="<?php echo $book['ISBN'] ?>">
                <input type="hidden" name="price" value="<?php echo $book['price'] ?>">
                <input type="hidden" name="price" value="<?php echo $book['quantity'] ?>">


              </form>

              <form method="post" action="Cart-decrease-quantity.php">
                <button class="table-decrease-btn">minus</button>
                <input type="hidden" name="bookID" value="<?php echo $book['id'] ?>">
                <input type="hidden" name="title" value="<?php echo $book['title'] ?>">
                <input type="hidden" name="ISBN" value="<?php echo $book['ISBN'] ?>">
                <input type="hidden" name="price" value="<?php echo $book['price'] ?>">
                <input type="hidden" name="price" value="<?php echo $book['quantity'] ?>">
              </form>

            </div>


          </td>

          <td>
            <div class="table-increase">
              <form method="post" action="Cart-delete-book.php">
                <button class="table-delete-btn" style="display:inline"> delete</button>
                <input type="hidden" name="id" value="<?php echo $book['id'] ?>">
              </form>
            </div>

          </td>

        </tr>


      <?php endforeach ?>
    </tbody>
  </table>

  <table>
    <tr style="margin-left: 30px;">total: <?php echo $cart->cart_total() ?></tr>
  </table>


  <form action="check-out.php" method="post">
    <button style="width: 100%; 
    background-color:orange; color:white ;padding-top:8px; margin-top: 10px; padding-bottom:8px;">
      Checkout
    </button>

  </form>


  <script src="" async defer></script>
</body>

<footer>

  <hr>
  <?php require "footer.php" ?>
</footer>

</html>