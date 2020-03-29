<?php
require_once '../PDOconfig/dbh.php';
require_once 'Components/header.php';
?>
<body>
  <main>
<!-- Recent Start -->
<div class="card-panel panel-section">
	<div class="row">
	    <h5 class="underline">Men's Shirts</h5>    	   
<?php
$query = "SELECT * FROM products_info
JOIN products_categories USING(product_id)
JOIN products_gender USING(product_id)
JOIN products_imgs USING(product_id) 
WHERE product_gender='men' AND product_category='Shirts' LIMIT 4";
$result = $conn->query($query);
while($row = $result->fetch()) {
  echo '
      <div class="col s6 m3 mb-4">
          <a href="view.php?id='.$row["product_id"].'" class="black-text">
              <img src="upload/'.$row["product_img"].'" alt="" class="responsive-img">                                
              <span>'.$row["product_name"] .' '. $row["product_price"].'$</span>                
          </a>                                
      </div>';
}

?>                  
    </div>
    <p class="center-align">
        <a href="category.php?category=Shirts&gender=men" class="more-btn">See More</a>
    <p>
</div>
<!-- Recent End -->
<!-- Popular Start -->
<div class="card-panel panel-section">
	<h5 class="underline">Women's Shirts</h5>    
		<div class="row">    
<?php
$query = "SELECT * FROM products_info
JOIN products_categories USING(product_id)
JOIN products_gender USING(product_id)
JOIN products_imgs USING(product_id) 
WHERE product_gender='women' AND product_category='Shirts' LIMIT 4";
$result = $conn->query($query);
while($row = $result->fetch()) {
  echo '
      <div class="col s6 m3 mb-4">
          <a href="view.php?id='.$row["product_id"].'" class="black-text">
              <img src="upload/'.$row["product_img"].'" alt="" class="responsive-img">
              <span>'.$row["product_name"] .' '. $row["product_price"].'$</span>
          </a>
      </div>';
}

?>

	    </div>
		<p class="center-align">
			<a href="category.php?category=Shirts&gender=women" class="more-btn">See More</a>
		<p>
</div>
<!-- Popular End -->
<!-- Recommend start -->
<div class="card-panel panel-section">
    <h5 class="underline">Recomended For You</h5>    
    <div class="row">    
<?php
$query = "SELECT * FROM products_info
JOIN products_categories USING(product_id)
JOIN products_gender USING(product_id)
JOIN products_imgs USING(product_id)
WHERE product_category='Trousers' LIMIT 8";
$result = $conn->query($query);
while($row = $result->fetch()) {
  echo '
      <div class="col s12 m3 mb-4">
          <a href="view.php?id='.$row["product_id"].'" class="black-text">
              <img src="upload/'.$row["product_img"].'" alt="" class="responsive-img">
              <span>'.$row["product_name"] .' '. $row["product_price"].'$</span>
          </a>
      </div>';
}
?>

	</div>
    <p class="center-align">
		<a href="category.php?category=Trousers&gender=men" class="more-btn">See More</a>
    <p>
</div>
<!-- Recomend End -->
<?php
require_once 'Components/newsletter.php';
require_once 'Components/loginModal.php';
echo "</main>
</body>";
require_once 'Components/footer.php';
?>
