<?php
if(isset($_POST["submit-btn"]))
{
  // Connection to database
  require_once '../config/dbh.php';

  // Define the file variables
  $fileName = $_FILES["file"]["name"];
  $fileTmpName = $_FILES["file"]["tmp_name"];
  $fileSize = $_FILES["file"]["size"];
  $fileType = $_FILES["file"]["type"];
  $fileError = $_FILES["file"]["error"];

  // Array of allowed extensions in an associative array
  $allowed = array(
    'jpg' => 'image/jpg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png'
  );

  // Check to see if the extension is valid in the array
  if(in_array($fileType, $allowed)){
    //Check if the file has no errors
    if($fileError === 0) {
      // Check to see that the file is not too large
      if($fileSize < 1000000) {
        // Chane the file name
        $fileNameNew = md5($fileName);
        // File Destination
        $fileDestination = '../../uploaded/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);

      } else {echo"File to large";}
    } else {echo "Error in Image";}
  } else {echo "File extension invalid";}

  /* Define other input variables */

  $title = $_POST["title"];
  $price = $_POST["price"];
  $desc = $_POST["description"];
  $category = $_POST["category"];
  $sex = $_POST["gender"];
  $size = $_POST["size"];
  $colors = $_POST["color"];
  //$imgArr = array(md5($_FILES["file"]["name"]));

  // Check to see if the user has left an empty field
  if(empty($title) || empty($desc) || empty($sex) || empty($category) || empty($price)) {
    header("Location: ../create-form.php?error=emptyfields");
    exit();
  }
  // Check to see if the user input matchs the pattern
  else if(!preg_match("/^[a-zA-Z0-9]/", $title) && !preg_match("/^[a-zA-Z0-9]/", $desc) && !preg_match("/^[0-9]/", $price)) {
    header("Location: ../create-form.php?error=invalidtext");
    exit();
  }
  // If all successfully add this information to the database
  else {
    ###############################################################################
    /* foreach loop for the colors Array */
    ###############################################################################
    foreach ($colors as $value) {
      $query = "INSERT INTO product_color(product_id, product_color) VALUES(?, ?)";
      $stmt = $conn->prepare($query);$stmt->execute([$title, $value]);

    }
    ################################################################################
    /* foreach loop for the size Array  */
    ################################################################################
    foreach($size as $value) {
      $query = "INSERT INTO product_size(product_id, product_size) VALUES(?, ?)";
      $stmt = $conn->prepare($query);$stmt->execute([$title, $value]);
    }
    ###################################################################################
    // Make query for the database
    $query = "INSERT INTO products(title, about, gender, category, img, price) VALUES(?, ?, ?, ?, ?, ?)";

    // Prepared the statement
    $stmt = $conn->prepare($query);
    $stmt->execute([$title, $desc, $sex, $category, $fileNameNew, $price]);

  }
} else {
    header("Location: ../create-form.php");
    exit();
}