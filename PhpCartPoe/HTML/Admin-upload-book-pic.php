<!DOCTYPE html>

<?php       

if(isset($_POST['id'])){
  $id  = $_POST['id'];
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Geeks for geeks Image Upload</title>
</head>

<body>
  <h1>Upload Images</h1>

  <form method='post' action='Admin-upload-book-picture.php' enctype='multipart/form-data'>
    <input type='file' name='files[]' multiple />
    <input type='submit' value='Submit' name='submit' />
    <input type="hidden" name="id" value="<?php echo $id ?>">
  </form>

  <a href="view.php">|View Uploads|</a>
</body>

</html>