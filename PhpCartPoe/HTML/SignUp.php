  
  <?php  
  
 $conn = require_once "DBConn.php";

  //loadCSVdata();   

  //Get post Data and validate ,saving into database userTable      

  
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
              <a href="signup.html">Sign Up</a>
              <a href="login.php">Log in</a>
        
            </div>
          </div>
        </div>
        
        <hr>

        <h1>Sign Up</h1>        

        <!--Form with email name and password ,and Confirm Password-->
        <form action="createTable.php" method="post" novalidate>    
            <div>   
              <label for="name">Name</label>
              <input type="text" id="name" name="name">

            </div>    
              <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
              </div>    

                <div>
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password">
                
                </div>    

                  <div>
                    <label for="password_confirmation">Repeat Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                  
                  </div>     
                  <!--Submit Button-->    
                  <button>Sign Up</button>   

        </form>
        
        <script src="" async defer></script>
      </body>
  </html>