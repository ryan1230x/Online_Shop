<?php

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"]))
{

// Database connection
require_once '../config/dbh.php';

// declare variables
$fileName = $_FILES["large_file"]["name"];
$fileType = $_FILES["large_file"]["type"];
$fileSize = $_FILES["large_file"]["size"];
$fileError = $_FILES["large_file"]["error"];
$fileTmpName = $_FILES["large_file"]["tmp_name"];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$fileNameNew = uniqid('', true) . sha1($fileName) . '.' . $fileActualExt;

$allowed = array('jpg', 'jpeg');

// upload image to the folded in client directory.
if(in_array($fileActualExt, $allowed)) 
{
	if($fileError === 0) 
	{
		if($fileSize < 1000000)
		 {
			$fileDestination = "../../upload/" . $fileNameNew;
			move_uploaded_file($fileTmpName, $fileDestination);

		} else {echo "The file is too large";}
	} else {echo "there was an error";}
} else {echo "file extension not allowed";}

// Declare variable
$product_name = htmlspecialchars(strip_tags($_POST["title"]));
$product_price = htmlspecialchars(strip_tags($_POST["price"]));
$product_about = htmlspecialchars(strip_tags($_POST["about"]));
$product_category = htmlspecialchars(strip_tags($_POST["category"]));
$product_gender = htmlspecialchars(strip_tags($_POST["gender"]));
$product_id = uniqid('', true) . sha1($product_name);

$input_array = array(
	$product_name, $product_price, $product_about, $product_category, $product_gender
);

forEach($input_array as $value)
{
	if(empty($value)) echo "This $value is empty, please fill in again";
}

try 
{
	
	$conn->beginTransaction();	

	// Insert data into the products_info table
	$query = "INSERT INTO 
		products_info(product_id, product_name, product_price, product_about) 
		VALUES(?, ?, ?, ?)";
	$stmt = $conn->prepare($query);
	if(!$conn->prepare($query)) echo "Error Could not prepare product_info";
	$stmt->execute([$product_id, $product_name, $product_price, $product_about]);
	
	// Insert data into the products_imgs table
	$query = "INSERT INTO
		products_imgs(product_id, product_img) VALUES(?, ?)";
	
	$stmt = $conn->prepare($query);
	if(!$conn->prepare($query)) echo "Error Could not prepare product_imgs";
	$stmt->execute([$product_id, $fileNameNew]);
	
	// Insert data into the products_categories table
	$query = "INSERT INTO products_categories(product_id, product_category) VALUES(?, ?)";
	$stmt = $conn->prepare($query);
	if(!$conn->prepare($query)) echo "Error Could not prepare product_categories";
	$stmt->execute([$product_id, $product_category]);
	
	// Insert data into the products_gender table
	$query = "INSERT INTO products_gender(product_id, product_gender) VALUES(?, ?)";
	$stmt = $conn->prepare($query);
	if(!$conn->prepare($query)) echo "Error Could not prepare product_gender";
	$stmt->execute([$product_id, $product_gender]);

	$conn->commit();

	header("Location: ../productsView.php?upload=success");
	exit();

}
catch(PDOExecption $e)
{
	$conn->rollBack();
	header("Location: ../productView.php?upload=failed&message=".$e->getMessage());
	exit();

}



}
else 
{
	header("Location:../productsView.php");
	exit();

}// End of '$_SERVER["REQUEST"]'...

?>
