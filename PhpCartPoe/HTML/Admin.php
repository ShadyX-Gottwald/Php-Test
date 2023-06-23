
<?php
require_once "DBConn.php";
/*
*CLASS WITH FUNCTIONS OF THE ACTIONS THE ADMIN IS ALLOWED IN THE SYSTEM
 * 
 * * */

 interface Admin{   

  function add_book();    
  function view_book(); 
  function delete_book();    
  function search_book();     
  function upload_book_picture();
  //function view_users();    
  //function contact_seller(); 

 }

 class AdminImpl implements Admin{

  function add_book(){
    global $conn;

    if (
      isset($_POST['title'])
      && !empty($_POST['title'])
      && !empty($_POST['ISBN']) && !empty($_POST['price'])
    ) {
       echo "Is Set";
      //Once Fields are captured to DB.   

      $bookTitle = $_POST['title'];
      $bookISBN = $_POST['ISBN'];

      //Cast to int
      $bookPrice = (int) $_POST['price']; 


       $sql = sprintf("INSERT INTO `tblBooks` (
                      `title`,
                      `ISBN`,
                      `price` 
    ) VALUES ( '%s', '%s', %d)",$bookTitle,$bookISBN, $bookPrice );   

      $conn->execute_query($sql);
      //Redirect to index page 
      header("Location: Admin-index.php");





    } else {
      echo "Fields cannot be empty";
      header("Location: Admin-add-book.php");
      echo "Fields cannot be empty";
    }

  }
  function view_book(){}
  function delete_book(){    

    global $conn;
    //post from wherever
    //sql- to delete

    if(isset($_POST['id'])){
      $bookID = (int) $_POST['id'];
      $sql = sprintf("DELETE FROM `tblbooks` WHERE `tblbooks`.`id` = %d", $bookID);

      $conn->query($sql);
      header("Location: Admin-index.php");

    } else { 
      echo "Post not Post.";
    }
    

  }
  function delete_book_2(){

    global $conn;
    //sql- to delete
    if (isset($_POST['id'])) {
      $bookID = (int) $_POST['id'];
      $sql = sprintf("DELETE FROM `tblbooks` WHERE `tblbooks`.`id` = %d", $bookID);

      $conn->query($sql);
      header("Location: Admin-tableView.php");
    } else {
      echo "Failed! Return.";
    }
  }
  function search_book(){}

  function upload_book_picture(){       

    global $conn;

    $statusMsg = '';

    if (isset($_POST['submit'])) {

      // Count total files
      $countfiles = count($_FILES['files']['name']);

      // Prepared statement
      $query = "UPDATE tblbooks SET image_name =?, SET img =?  WHERE id=?";

      $statement = $conn->prepare($query);

      // Loop all files
      for ($i = 0; $i < $countfiles; $i++) {

        // File name
        $filename = $_FILES['files']['name'][$i];

        // Location
        $target_file = './Uploads/' . $filename;

        // file extension
        $file_extension = pathinfo(
          $target_file,
          PATHINFO_EXTENSION
        );

        $file_extension = strtolower($file_extension);

        // Valid image extension
        $valid_extension = array("png", "jpeg", "jpg");

        if (in_array($file_extension, $valid_extension)) {

          // Upload file
          if (move_uploaded_file(
            $_FILES['files']['tmp_name'][$i],
            $target_file
          )) {


            //SQL - Update
            // $query = sprintf("UPDATE tblbooks SET image_name = %s 
            //  WHERE id = %d",  array($filename, $target_file), (int)$_POST['id']);

            $id = $_POST['id'];
            //Bind Param   
            $statement->bind_param("ssd",$filename,$target_file, $id);   
            $statement->execute();
            //Updating image_name and image 
          
            echo "File upload successfully";
          }
        }
      }

      
    }
   

    // Display status message
    echo $statusMsg;  
    echo $_POST['submit'];

    

  //header("Location: Admin-tableView.php");
  echo "File upload successfully";
    // $query = sprintf("UPDATE `tblbooks` SET ,`ISBN`,`img`='%s' WHERE id = %d",$fileName , (int)$_POST['id']);
   // $insert = $conn->query($query);

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