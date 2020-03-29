<?php
require_once '../PDOconfig/dbh.php';
require_once 'Components/header.php';

$category = $_GET["category"];
$gender = $_GET["gender"];

// Error handling
if(!isset($category) || !isset($gender)) {
 header("Location: index.php");
 exit();
}

echo '
<body>
	<main>
	<div class="row card-panel" style="margin:15px;">
		<h4>'.$category.' Collection</h4>';

// Query the database to get the products
$query = "SELECT * FROM products_info
JOIN products_imgs USING(product_id)
JOIN products_categories USING (product_id)
JOIN products_gender USING (product_id)
WHERE product_gender = ? AND product_category = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$gender, $category]);

if($stmt->rowCount() > 0)
{
	while($row = $stmt->fetch())
	{
   		echo '
		<div class="col s12 m3" style="margin-bottom:1.5rem">
			<div class="product-img">
				<a href="view.php?id='.$row["product_id"].'">
				<img src=upload/'.$row["product_img"].' class="responsive-img" />
				</a>
			</div>
			<div class="product-content">
				<p>'.$row["product_name"].'</p>
				<a href="view.php?id='.$row["product_id"].'" class="btn black hoverable">View product</a>
			</div>
		</div>';
	}
}
echo '
		</div>
	</main>
</body>';
require_once 'Components/loginModal.php';
require_once 'Components/footer.php';
?>
