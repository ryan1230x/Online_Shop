<?php 
// Include header
require_once 'required/adminHeader.php';
?>
<main>
<?php 
// Flash Message
if(isset($_GET["status"])) {
	if($_GET["status"] === "success") {
		echo '<article class="padding">
			<div class="card-panel teal z-depth-2">
				<p class="flow-text">The product was updated successfully</p>
			</div>
		</article>';
	}
	if($_GET["status"] === "failed") {
		echo '<article class="padding">
    	    <div class="card-panel red z-depth-2">
    	        <p class="flow-text">Error the product was updated unsuccessfully! Please try again.</p>
            </div>
    	</article>';
	}
}
// Get productID
$product_id=$_GET["id"];
$query="SELECT * FROM products_info
JOIN products_gender USING(product_id)
JOIN products_categories USING(product_id)
JOIN products_imgs USING(product_id)
WHERE product_id = ?";
$stmt=$conn->prepare($query);
$stmt->execute([$product_id]);

if($stmt->rowCount() > 0) {
 while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
 echo'
  <div class="padding">
    <div class="card-panel z-depth-2">
        <div class="row">
            <div class="col s12 ui-actions">
		<h4>Edit Product</h4>
                <a href="./product-view.php" class="btn secondary-btn">go back</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <form action="./included/product-update.php" method="POST">
                    <div class="input-field col s12">
                        <input type="text" class="validate" name="product_name" id="product_name" value="'.$row["product_name"].'" />
                        <label for="product_name">Title</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" class="validate" name="product_price" id="product_price" value="'.$row["product_price"].'" />
                        <label for="product_price">Price</label>
                    </div>
                    <div class="input-field col s12">                    
                        <textarea class="materialize-textarea" id="product_about" name="product_about">'.$row["product_about"].'</textarea>
                        <label for="product_about">Product Description</label>                    
                    </div>
                    <div class="input-field col s12">
                        <select name="product_category" >
                            <option value="'.$row["product_category"].'" selected >'.$row["product_category"].'</option>
                            <option value="Shirts">Shirts</option>
                            <option value="Shoes">Shoes</option>
                            <option value="Jacket">Jacket</option>
                            <option value="Trousers">Trousers</option>                    
                        </select> 
                    </div>
                    <div class="input-field col s12">
                        <select name="product_gender">
                            <option value="'.$row["product_gender"].'" selected >'.$row["product_gender"].'</option>
                            <option value="men">Man</option>
                            <option value="women">Woman</option>
                        </select>
                    </div>
                    <div class="file-field input-field col s12">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="large_file" id="large_file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Select Photo (Large)" id="file" value="'.$row["product_img"].'">
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn secondary-btn right" value="edit and save" name="submit" />                        
                        <input type="hidden" value="'.$row["product_id"].'" name="product_id" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>';
 }
} else {
echo '
<div class="padding">
	<div class="card-panel z-depth-2 red">
		<h4 class="">No Product Matches</h4>
		<p class="flow-text">Please Select An Existing Product</p>
	</div>
</div>
';
}

?>
</main>
<?php
// Include Footer
require_once 'required/adminFooter.php';
?>
