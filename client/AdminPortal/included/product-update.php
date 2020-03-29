<?php
if(isset($_POST["submit"]) && isset($_POST["product_id"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
   	 // Get database connection
   	 require_once '../config/dbh.php';

    	// Function to clean data
    	function sanatize($var) {
		return htmlspecialchars(strip_tags(trim($var)));
   	 }

	// Get the data from the form
    	$product_name = sanatize($_POST["product_name"]);
    	$product_price = sanatize($_POST["product_price"]);
    	$product_about = sanatize($_POST["product_about"]);
    	$product_category = sanatize($_POST["product_category"]);
    	$product_gender = sanatize($_POST["product_gender"]);
    	$product_img = $_FILES["large_file"]; // image

	// Get productID
	$product_id=$_POST["product_id"];

	// Update PRODUCTS_INFO
	$query="UPDATE products_info SET product_name = ?, product_price = ?, product_about = ? WHERE product_id = ?";
	try {
		$conn->beginTransaction();
		$stmt=$conn->prepare($query);
		$stmt->execute([$product_name, $product_price, $product_about, $product_id]);
		$conn->commit();
	} catch(PDOException $e) {
		$conn->rollBack();
		header("Location:../product-edit.php?id=$product_id&status=failed");
		exit();
	}
	
	// Update PRODUCT_CATEGORIES
	$query="UPDATE products_categories SET product_category=? WHERE product_id=?";
	try {
		$conn->beginTransaction();
		$stmt=$conn->prepare($query);
		$stmt->execute([$product_category, $product_id]);
		$conn->commit();
	} catch(PDOException $e) {
		$conn->rollBack();
		header("Location:../product-edit.php?id=$product_id&status=failed");
                exit();

	}
	
	// Update PRODUCT_GENDER
	$query="UPDATE products_gender SET product_gender=? WHERE product_id=?";
	try {
		$conn->beginTransaction();
		$stmt=$conn->prepare($query);
		$stmt->execute([$product_gender, $product_id]);
		$conn->commit();
	} catch(PDOException $e) {
		$conn->rollBack();
		header("Location:../product-edit.php?id=$product_id&status=failed");
                exit();

	}
	
	header("Location:../product-edit.php?id=$product_id&status=success");
	exit();

} else {
    	header("Location:../index.php");
	exit();
}
?>
