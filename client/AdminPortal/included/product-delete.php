<?php
if(isset($_POST["submit"]) && isset($_POST["product_id"]) && $_SERVER["REQUEST_METHOD"] === "POST") {

	// Database connection
	require_once '../config/dbh.php';
	
	// Get form DATA
	$product_id=$_POST["product_id"];

	$query="DELETE * FROM products_info 
	JOIN products_gender USING(product_id)
	JOIN products_categories USING(product_id)
	JOIN products_imgs USING(product_id)
	WHERE product_id = ?";
	
	try {
		$conn->beginTransaction();
		$stmt=$conn->prepare($query);
		$stmt->execute([$product_id]);
		$conn->commit();
		header("Location:../product-view.php");
		exit();
	} catch(PDOException $e) {
		$conn->rollBack();
	}
	
} else {
	header("Location:../index.php");
	exit();
}
?>
