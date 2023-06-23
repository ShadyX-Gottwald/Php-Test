
<?php

include_once "DBConn.php";

  /* 
   * CLASS ,ACTIONS RELATED TO THE CART
   * * */
class Cart{

  public int $total ;
  /*
   * IF inserting duplicate (by ISBN) will increase quantity rather than inserting
   * 
   * 
   * * */
  function add_book(string $other){
    global $conn;
    
      //TRY ADDING BOOK , ON ERROR UPDATE QUANTITY

    try { $this->addBook();}   

    catch (Exception $e) { $this-> increase_book_quantity(); }
  } 
  
  /*
  *GET TOTAL PRICE OF ITEMS IN CART
  *
  *
   */
 public  function cart_total() {    
     //Set total to ZERO
     $this->total = 0;
     global $conn;  

    $sql = sprintf("SELECT * FROM tblOrder");     
    $result =  $conn-> execute_query($sql) ;
   
    //ADDING price * quantity foreach

    while($res= mysqli_fetch_assoc($result)){

      $quantity = $res['quantity'];
      $price = $res['price'];

        $this->total = $this->total + ($price * $quantity);   

     // echo $price . "<br>";
      //echo $quantity . "<br>";
    }     
    echo " R".$this->total;
    //ADDING price * quantity foreach

  }

  function increase_quantity_button(){   
    global $conn; 

    
    $query = sprintf("SELECT 
      bookID as bookID,
      quantity as quantity
       FROM tblorder WHERE bookID = %d", (int) $_POST['bookID']); 

    $result = $conn->execute_query($query);  

    $res = mysqli_fetch_assoc($result);

    //IF exist update quantity
    //GET CURRENT VALUE OF QUANTITY
    $update_value = $res['quantity'] + 1;
    $bookID = (int) $res['bookID'];
    // echo $update_value; 

    $sql = sprintf("UPDATE tblorder SET quantity = %d WHERE bookID = %d", $update_value,$bookID);
    $conn->execute_query($sql);
    header("Location: show-cart-items.php"); 

  }
  function decrease_quantity_button(){
    global $conn;

    $query = sprintf("SELECT 
      bookID as bookID,
      quantity as quantity
       FROM tblorder WHERE bookID = %d", (int) $_POST['bookID']);

    $result = $conn->execute_query($query);

    $res = mysqli_fetch_assoc($result);

    //IF exist update quantity
    //GET CURRENT VALUE OF QUANTITY
    $update_value = $res['quantity'] -1;
    $bookID = (int) $res['bookID'];
    // echo $update_value; 

    //if()

    $sql = sprintf("UPDATE tblorder SET quantity = %d WHERE bookID = %d", $update_value, $bookID);
    $conn->execute_query($sql);
    header("Location: show-cart-items.php"); 

  }



  function increase_book_quantity() {
    global $conn;

    //IF THERE IS A POST, THEN CHECK IF THE ID EXISTS IN CART, THEN UPDATE IF YES.
    
      $query = sprintf("SELECT 
      bookID as bookID,
      quantity as quantity
       FROM tblorder WHERE bookID = %d", $_POST['bookID']); //(w3schools,2023)

      $result = $conn->execute_query($query);
      $res = mysqli_fetch_assoc($result);

      //IF exist update quantity
        //GET CURRENT VALUE OF QUANTITY
        $update_value = $res['quantity'] + 1;
        $bookID = $res['bookID'];
        // echo $update_value; 

        $sql = sprintf("UPDATE tblorder SET quantity = %d WHERE bookID = %d", $update_value, $res['bookID']);
        $conn->execute_query($sql);//(w3schools,2023)
        header("Location: index.php"); 
        //echo $res['bookID'];
  }


  function addBook() {
    global $conn;

    $bookID =  $_POST['bookID'];
    $bookTITLE =  $_POST['title'];//(w3schools,2023)
    $bookISBN =  $_POST['ISBN'];
    $bookPRICE = $_POST['price'];//(w3schools,2023)
    // Prepare an SQL query with empty values as placeholders (with a question mark for each value)
    $stmt = $conn->prepare("INSERT INTO tblOrder ( 
      bookID, title , ISBN ,price,date_  ) VALUES (?,?,?,?,?)");//(w3schools,2023)

    //Date 
     $date_formated = date('Y-m-d H:i:s'); //(w3schools,2023)

 // echo $date_formated;
    // Bind variables to the placeholders by stating each variable, along with its type
    $stmt->bind_param("sssds", $bookID, $bookTITLE, $bookISBN, $bookPRICE,$date_formated);//(w3schools,2023)

    $stmt->execute();

    header("Location: index.php");//(w3schools,2023)
  }




  function delete_book_button(){

    global $conn;
    //post from wherever
    //sql- to delete

    if (isset($_POST['id'])) { //(w3schools,2023)
      echo $_POST['id'];
      $bookID = (int) $_POST['id'];
      $sql = sprintf("DELETE FROM `tblorder` WHERE `tblorder`.`id` = %d", $bookID);//(w3schools,2023)

      $conn->query($sql);
      header("Location: index.php");
    } else {
      //echo "Post not Post.";
    }
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
 * ** */
?>