<?php include_once "Admin-NavBar.php";
require_once "DBConn.php";   
require_once "Admin.php";  

$admin = new AdminImpl();




?>

<body onclick="">

  <?php 
 

 $admin-> add_book();

  

  ?>
</body>


