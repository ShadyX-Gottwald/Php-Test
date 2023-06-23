<?php

/*
* CLASS WITH SOME  FUNCTIONS RELATED TO THE SELLER ON THE SYSTEM
*/

interface Seller{ 

  function sell_book();   
  function search_book();    

  function login();

}  

class SellerImpl implements Seller{

  function sell_book(){}
  function search_book(){

    global $conn;
    // get the string to match from the form

    $string = $_POST['string'];
    // validate the string using a regular expression

     if(isset($_POST['search'])) {
      $keywords = $conn->escape_string($_POST['search']);
      $sql="SELECT title, ISBN, price FROM tblbooks WHERE title  like '%{$keywords}%'" ;//(w3schools,2023)
      
      $query = $conn->execute_query($sql);//(w3schools,2023)

      $result = $conn->execute_query($sql);
      $data = mysqli_fetch_assoc($result);//(w3schools,2023)

      foreach ($data as $res ) {
        echo $res['title']."<br>";
      }
 
    }
  }

  function login() {   
    include_once "session-start.php";  //(w3schools,2023)  
    echo $_SESSION['username'];//(w3schools,2023)
    
  }

  function logout(){
    include_once "session-start.php";
    echo "User Session Data:". "<br><br>";
    echo "user email:". $_SESSION['username']."<br>"; 

    echo "Session id: ".session_id(). "<br>";  //(w3schools,2023)    


    //destroy session   

    //empty cart   
  }

}

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