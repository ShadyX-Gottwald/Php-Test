<?php

$id = session_create_id();      

session_start();   
if(isset($_POST['email'])) {  
  //Starting the session  
  $_SESSION['username'] = $_POST['email'];   
  
   
  //Get actual username from DB.  

  //echo $_SESSION['username'];
} 


?>