<?php
require_once  "Admin.php";

//Admin uploads book to a particular book.
$admin = new AdminImpl();


if (isset($_POST['id'])) {
  $admin->upload_book_picture();
}

?>

