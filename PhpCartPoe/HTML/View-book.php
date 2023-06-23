<?php

require_once "DBConn.php";   
require_once  "Admin.php";   

$admin = new AdminImpl();
/*
 * Get data of book id from previous page 
 * */

 

//$book_id = (int)$_GET['id'];
//$sql = sprintf("SELECT * FROM tblBooks WHERE id = %s", $book_id);  

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
  <link rel="stylesheet" href="addToCartStyles.css">
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
      <form  method="get">
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


  <?php

   



  // $result =  $conn->execute_query($sql);

  // if ($result) {
  //   foreach ($result as $res) {
  //     echo $res['title'];
  //   }
  // }

  ?>

  <!--Add To Cart section-->
  <div class="grid-container_2">


    <!--Book description section-->
    <img src="book_image_1.jpg" style="display:block; " class="book_image">
    <div style="float:right;text-align:center">

      <?php

      foreach ($result as $item) : ?>
        <div style="margin-left: 20%;">
          <p style="font-size: 30px;  margin-right: 29%"> <?php echo $item['title'] ?></p>
          <p style="font-size: 15px; color:orangered; margin-top: 2px;"> <?php echo $item['price'] ?></p>

          <hr>

        </div>

      <?php endforeach ?>
    </div>

    <form action= "add-book-id-to-cart.php" method="post" >
      <input type="hidden" value="<?php echo $item['id'] ?>" name= "id">
      <button class="add-to-cart-btn">Add To Cart</button>
    </form>



    <form>
      <button>Add To Cart</button>
    </form>
  </div>

  <script src="" async defer></script>
</body>

</html>