<?php
session_start();

// include database connection
require_once '../PDOconfig/dbh.php';
require_once 'Components/header.php';
// Check if the product_id, if not send the user back to previous page
if(!isset($_GET["id"])) {
  header("Location: {$_SERVER["HTTP_REFERER"]}");
  exit();    
}
// Get the product_id
$product_id = $_GET["id"];
//Current User
$current_user=$_SESSION["username"];

// Query the database to get all the needed information for the product
$query = "SELECT * FROM products_info 
  JOIN products_imgs USING(product_id)  
  JOIN products_categories USING(product_id) 
  JOIN products_gender USING (product_id) 
  WHERE product_id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$product_id]);


echo'<body><main>';

// Get results and print out the view
if($stmt->rowCount() > 0) {
  while($row = $stmt->fetch()) {
  echo '
<nav id="breadcrumbs">
  <div class="nav-wrapper" style="padding: 0 20px;">               
    <a href="index.php" class="breadcrumb">Homepage</a>
    <a href="category.php?category='.$row["product_category"].'&gender='.$row["product_gender"].'" class="breadcrumb">'.$row["product_category"].'</a>        
    <a href="#!" class="breadcrumb">'.$row["product_name"].'</a>        
  </div>
</nav>

<div class="card-panel panel-section">
	<div class="row" id="product-info">
    	<div class="col s12 m6 product-img">
			<img src="upload/'.$row["product_img"].'" id="product-pic" class="responsive-img" />                
		</div>
		<div class="col s12 m6 product-content">    	
			<div class="product-about">
				<h2>'.$row["product_name"].'</h2>
				<h3 class="right-align">$'.$row["product_price"].'</h3>
			  	<p>'.$row["product_about"].'</p>            
			</div>
			<label>Select Size</label>
			<select class="browser-default">
				<option value="" disabled selected>Choose your option</option>
				<option value="Extra Small (XS)">Extra Small (XS)</option>
				<option value="Small (S)">Small (S)</option>
				<option value="Medium (M)">Medium (M)</option>
		    	<option value="Large (L)">Large (L)</option>
		    	<option value="Extra Large (XL)">Extra Large (XL)</option>
	    	</select>
			<div class="product-action" style="margin-top:3rem">
				<form id="setWishlist">
					<input name="submit" type="submit" class="btn black hoverable" style="border-radius:40px;" value="add to wishlist" />
					<input id="product_id" name="product_id" type="hidden" value="'.$row["product_id"].'" />
					<input id="current_user" name="current_user"type="hidden" value="'.$_SESSION["username"].'" />
				</form>
			</div>
		</div>
	</div>
</div>';
 }
} else {
	header("Location: index.php");
}



echo "</main></body>";
require_once 'Components/loginModal.php';
require_once 'Components/footer.php';
