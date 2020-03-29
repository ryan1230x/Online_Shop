<?php
require_once 'Components/header.php';
?>
<main>
	<div class="padding">
		<section class="card-panel z-depth-2 panel-section">
			<h4>Wishlist</h4>
			<div class="row">
<?php
require_once '../PDOconfig/dbh.php';
$current_user=$_SESSION["username"];
$query="SELECT * FROM products_wishlist
JOIN products_info USING(product_id)
JOIN products_imgs USING(product_id)
WHERE products_wishlist.user = ?";

$stmt=$conn->prepare($query);
$stmt->execute([$current_user]);

if($stmt->rowCount() > 0) {
	while($row=$stmt->fetch()) {
	echo'
		<div class="col s12 m3" style="margin-bottom:1.5rem">
			<div class="product-img">
				<a href="view.php?id='.$row["product_id"].'">
				<img src="upload/'.$row["product_img"].'" class="responsive-img" />
				</a>
			</div>
			<div class="product-content">
				<p>'.$row["product_name"].'</p>
				<a href="view.php?id='.$row["product_id"].'" class="btn black hoverable">View product</a>
			</div>
		</div>';
	}
} else {
	echo "<p>There are currently no products in your wishlist</p>";
}

?>
		</div>
		</section>
	</div>
<?php require_once 'Components/loginModal.php'; ?>
</main>
<?php
require_once 'Components/footer.php';
?>
