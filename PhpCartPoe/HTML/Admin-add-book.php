<?php
require_once  "Admin.php";

$admin = new AdminImpl();
//$admin->add_book();

?>

<?php include_once "Admin-NavBar.php" ?>
<h1>Add Book</h1>

<!--Form with email name and password ,and Confirm Password-->
<form action="Admin-add-book-validation.php" method="post" class="addBook_div">
  <div class="addBook_div">

    <div>
      <label for="book_title">Book Title:</label>
      <input type="text" id="title" name="title" placeholder="Enter book Title...">

    </div>
    <div>
      <label for="">Book ISBN:</label>
      <input type="text" id="ISBN" name="ISBN" placeholder="Enter book ISBN...">
    </div>

    <div>
      <label>Price:</label>
      <input type="number" id="price" name="price">

    </div>

    <!--Submit Button-->
    <button onclick="populate_fields()" class="addBook-submit">Add Book</button>

  </div>


</form>

<hr>
<div class="">

  <div class="top-branding" style="">
    <p style="float:right">Top </p>

    <!--Show cart-->
    <div>


      <a href="show-cart-items.php" style="margin-bottom: 2px; margin-top: 24px; color: black" class="cart-card">


      </a>

    </div>
  </div>


</div>

<script>
  function populate_fields() {

    var error_string = "";
    let title_text = document.getElementById("title");
    title_text = title_text.innerText;

    let ISBN_text = document.getElementById("title");
    ISBN_text = ISBN_text.innerText;


       // alert(title_text.innerText);
    if (title_text.innerText == undefined || ISBN_text.innerText == undefined) {
      error_string += "'title' cannot be empty \n"; 
      if (ISBN_text == "") {
        error_string += "\n'ISBN' cannot be empty\n";
      }
      alert(error_string);
    }

    //alert("Fields cannot be empty");
  }
</script>