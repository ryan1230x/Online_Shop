<?php
/* Make sure the user has clicked on the submit button */
if(isset($_POST["submit-btn"]))
{
  // Connection to database
  require_once 'config/dbh.php';

  // Define the file variables
  $fileName = $_FILES["file"]["name"];
  $fileTmpName = $_FILES["file"]["tmp_name"];
  $fileSize = $_FILES["file"]["size"];
  $fileType = $_FILES["file"]["type"];
  $fileError = $_FILES["file"]["error"];

  // Array of allowed extensions in an associative array
  $allowed = array('jpg' => 'image/jpg','jpeg' => 'image/jpeg','png' => 'image/png');

  // Check to see if the extension is valid in the array
  if(in_array($fileType, $allowed)){
    //Check if the file has no errors
    if($fileError === 0) {
      // Check to see that the file is not too large
      if($fileSize < 1000000) {
        // Chane the file name
        $fileNameNew = md5($fileName);
        // File Destination
        $fileDestination = '../uploaded/'.$fileNameNew;
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
  // $imgArr = array(md5($_FILES["file"]["name"]));

  // Check to see if the user has left an empty field
  if(empty($title) || empty($desc) || empty($sex) || empty($category) || empty($price)) {
    header("Location create-form.php?error=emptyfields");
    exit();
  }
  // Check to see if the user input matchs the pattern
  else if(!preg_match("/^[a-zA-Z0-9]/", $title) && !preg_match("/^[a-zA-Z0-9]/", $desc) && !preg_match("/^[0-9]/", $price)) {
    header("Location: create-form.php?error=invalidtext");
    exit();
  }
  // If all successfully add this information to the database
  else {
    ###############################################################################
    /* foreach loop for the colors Array */
    ###############################################################################
    foreach ($colors as $value) {
      $query = "INSERT INTO product_color(product_id, product_color) VALUES(?, ?)";
      $stmt = $conn->stmt_init();
      
      if(!$stmt->prepare($query)) {
        header("Location: create-form.php?error=set&status=404&item=color");
        exit();

      } else {
        $stmt->bind_param("ss", $title, $value);
        $stmt->execute();
      }

    }
    ################################################################################
    /* foreach loop for the size Array  */
    ################################################################################
    foreach($size as $value) {
      $query = "INSERT INTO product_size(product_id, product_size) VALUES(?, ?)";
      $stmt = $conn->stmt_init();

      if(!$stmt->prepare($query)) {
        header("Location: create-form.php?error=set&status=404");
        exit();

      } else {
        $stmt->bind_param("ss", $title, $value);
        $stmt->execute();
      }
    }
    ####################################################################################
    /* foreach loop for the imgs */
    ####################################################################################
    // foreach ($imgArr as $value) {
    //   $query = "INSERT INTO product_img(product_id, img) VALUES (?, ?)";
    //   $stmt = $conn->stmt_init();

    //   if(!$stmt->prepare($query)) {
    //     header("Location: create-form.php?error=set&status=404img");
    //     exit();
    //   }
    //   $stmt->bind_param("ss", $title, $value);
    //   $smt->execute();

    // }

    ###################################################################################
    // Make query for the database
    $query = "INSERT INTO products(title, about, gender, category, img, price) VALUES(?, ?, ?, ?, ?, ?)";

    // Prepared the statement
    $stmt = $conn->stmt_init();

    // Error handlers
    if(!$stmt->prepare($query)){
      echo "Error! Please try again!";

    } else {
      // Bind the Paramters to the statement
      $stmt->bind_param("sssssd", $title, $desc, $sex, $category, $fileNameNew, $price);

      // Execute the prepared statement
      $stmt->execute();

      // Header message to show success
      header("Location: create-form.php?success=uploaded");
      exit();
    }
  }
}

require_once 'required/adminHeader.php';
echo <<<_end
<main>
   <div class="container">
_end;
  if(isset($_GET["error"]))
  {
    if($_GET["error"] == "emptyfields")
    {
      echo "<h5 class=\"center-align red-text\">Please fill all the fields.</h5>";
    } else if($_GET["error"] == "invalidtext")
    {
      echo "<h5 class='center-align red-text'>Please fill the form with valid text.</h5>";
    }
  }
echo '
  <div class="row">
    <h4 class="left-align teal-text">Add Product</h4>
    <form action="create-form.php" class="col s12" method="POST" enctype="multipart/form-data">
    <!-- Card Title -->
    <div class="input-field col s9">
      <input type="text" id="card_title" name="title" validate required>
      <label for="card_title">Product Title</label>
    </div>
    <!-- Price -->
    <div class="input-field col s3">
      <input type="text" name="price" id="price" validate required>
      <label for="price">Price</label>
    </div>
    <!-- Card Description -->
    <div class="input-field col s12">
      <textarea id="card_description" class="materialize-textarea" data-length="200" name="description" validate required></textarea>
      <label for="card_description">Product Description</label>
    </div>
    <!-- Category Selet -->
    <div class="input-field col s12">
      <select name="category" required>
        <option value="" disabled selected>Please Select Category</option>
        <option value="shirts">Shirts</option>
        <option value="trouser">Trousers</option>
        <option value="sportswear">Sports Wear</option>
        <option value="swimwear">Swimwear</option>
        <option value="accessories">Accessories</option>
      </select>
      <label>Category</label>
    </div>
    <!-- Sizes Available -->
    <div class="input-field col s6">
    <span class="teal-text">Select Available Colors</span>
    <p>
    <label>
    <input type="checkbox" name="color[]" value="Red" />
    <span>Red</span>
    </label>
    </p>
    <p>
    <label>
    <input type="checkbox" name="color[]" value="Green" />
    <span>Green</span>
    </label>
    </p>
    <p>
    <label>
    <input type="checkbox" name="color[]" value="Blue" />
    <span>Blue</span>
    </label>
    </p>
    <p>
    <label>
    <input type="checkbox" name="color[]" value="Black" />
    <span>Black</span>
    </label>
    </p>
    <p>
    <label>
    <input type="checkbox" name="color[]" value="White" />
    <span>White</span>
    </label>
    </p>
    </div>

    <div class="input-field col s6">
    <span class="teal-text">Select Available Size</span>
    <p>
    <label>
    <input type="checkbox" name="size[]" value="XL" />
    <span>XL</span>
    </label>
    </p>
    <p>
    <label>
    <input type="checkbox" name="size[]" value="L" />
    <span>L</span>
    </label>
    </p>
    <p>
    <label>
    <input type="checkbox" name="size[]" value="M" />
    <span>M</span>
    </label>
    </p>
    <p>
    <label>
    <input type="checkbox" name="size[]" value="S" />
    <span>S</span>
    </label>
    </p>
    <p>
    <label>
    <input type="checkbox" name="size[]" value="XS" />
    <span>XS</span>
    </label>
    </p>
    </div>';
echo '
    <!-- File Upload -->
    <div class="file-field input-field col s12">
      <div class="btn">
        <span>File</span>
        <input type="file" name="file[]" multiple>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Select Photo" name="file" required>
      </div>
    </div>
    <!-- Gender CheckBox -->
    <div class="col s6 center-align">
      <p>
        <label>
          <input class="with-gap active" type="radio" name="gender" value="man">
          <span>Man</span>
        </label>
      </p>
    </div>
    <div class="col s6 center-align">
      <p>
        <label>
          <input class="with-gap" type="radio" name="gender" value="female">
          <span>Woman</span>
        </label>
      </p>
    </div>
    <button type="submit" class="hoverable waves-effect waves-green btn" style="width:100%;margin-top:32px;" name="submit-btn">Post</button>
  </form>
</div>';
require_once 'required/FAB.php';
require_once 'required/adminModal.php';
echo '
      </div>
    </main>';
require_once 'required/adminFooter.php';
