<?php

require_once "DBConn.php";

$sql = "SELECT * FROM tblBooks";
$result = $conn->query($sql);

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
  <link rel="stylesheet" href="Admin-tableViewStyles.css">
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
          <i class="fas fa-shopping-cart"></i>Your cart <?php ?> </a>

      </div>
    </div>


  </div>


  </div>

  <body>

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

    <hr>


    <h1>View Books</h1>

    <!--Table Task Data-->
    <table id="books-admin">
      <thead>
        <tr>
          <th>TITLE</th>
          <th>ISBN</th>
          <th>ID</th>
          <th>PRICE</th>
          <th>ACTIONS</th>

        </tr>
      </thead>

      <tbody>
        <?php

        foreach ($result as $book) : ?>

          <tr>
            <td style="width: 25%; ">
              <?php echo $book['title'] ?>
            </td>

            <td style="width: 10%; ">
              <?php echo $book['ISBN'] ?>
            </td>


            <td style="width: 7%; ">
              <?php echo $book['id'] ?>
            </td>


            <td>
              <?php echo $book['price'] ?>
            </td>

            <td>

            <!--Admin actions in the View Books Page-->
              <div class="table-increase">
                <form method="" action="">
                  <button class="table-increase-btn" style="display:inline;
                   height:38px; margin-left:12px"> edit</button>
                  <input type="hidden" name="id" value="<?php echo $book['id'] ?>">
                </form>

                <form method="post" action="Admin-upload-book-pic.php">
                  <button class="table-increase-btn" style="display:inline;  width:80px ;background-color:rgb(30,230,230);">
                    Upload Image
                  </button>
                  <input type="hidden" name="id" value="<?php echo $book['id'] ?>">

                </form>

              </div>


            </td>

            <td>
              <div class="table-increase">
                <form method="post" action="Admin-delete-book-2.php">
                  <button class="table-delete-btn" style="background-color: red; color: White;"> delete</button>
                  <input type="hidden" name="id" value="<?php echo $book['id'] ?>">
                </form>
              </div>

            </td>

          </tr>

        <?php endforeach ?>
      </tbody>
    </table>

    <table>
      <tr>total:</tr>
    </table>

    <script src="" async defer></script>
  </body>

</html>