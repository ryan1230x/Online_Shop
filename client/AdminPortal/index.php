<?php
// Get all users
function getAllUsers($conn) {
	$query="SELECT * FROM users";
	$num_rows=$conn->query($query)->rowCount();
	return $num_rows;
}
// Include the header
require_once 'required/adminHeader.php';
?>
<main>
	<div class="mb-top padding" id="container">
		<div id="firstSection">
			<!-- Most wanted section Start -->
			<div class="card-panel z-depth-2">
				<h5>Most Wanted Items</h5>
				<table>
					<thead>
					<tr>
						<th>N#</th>
						<th>Item Name</th>          
					</tr>
					</thead>

					<tbody>
					<tr>
						<td>1</td>
						<td>Jacket</td>        
					</tr>
					<tr>
						<td>2</td>
						<td>Shoes</td>        
					</tr>
					<tr>
						<td>3</td>
						<td>Lolipop</td>        
					</tr>
					</tbody>        
				</table>    
				<button class="btn secondary-btn hoverable waves-effect right">See all</button>    
			</div>
			<!-- Most wanted section End -->
			<!-- Most purchases section Start -->
			<div class="card-panel z-depth-2">
				<h5>Most Recent Items</h5>
				<table>
					<thead>
					<tr>						
						<th>Item Name</th>          
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
<?php
$query="SELECT product_name, product_id FROM products_info ORDER BY id DESC LIMIT 3";
$results=$conn->query($query);
if($results->rowCount() > 0) {
	while($row=$results->fetch(PDO::FETCH_ASSOC)) {
	echo '
	<tr>
		<td>'.$row["product_name"].'</td>
		<td>
			<a class="btn secondary-btn" href="./product-edit.php?id='.$row["product_id"].'">see</a>
		</td>
	</tr>
	';
	}
}
?>
					</tbody>
				</table>  
				<a href="./product-view-all.php" class="btn secondary-btn hoverable waves-effect right">See all</a>          
			</div>
			<!-- Most purchases section End -->
		</div>
		<!-- First section End-->
		<!-- Second section Start-->
		<div id="secondSection">
			<!-- Total Users Start-->
			<div class="card-panel z-depth-2">
    			<h3>Users</h3>
<?php
$query="SELECT * FROM users";
$num_rows=$conn->query($query)->rowCount();
echo "<h4>$num_rows</h4><span>Signed up</span>";
?>
			</div>
			<!-- Total Users end -->
			<!-- Orders send Start-->
			<div class="card-panel z-depth-2">
    			<h3>Orders Send</h3>
    			<h4>102</h4><span>Send Today</span>
			</div>
			<!-- Orders send End-->
			<!-- Total Products Start-->
			<div class="card-panel z-depth-2">
<?php 
$query="SELECT product_id FROM products_info";
$num_rows=$conn->query($query)->rowCount();
echo '
<h3>Products</h3>
<h4>'.$num_rows.'</h4>
<a href="./product-view-all.php"  class="btn right secondary-btn hoverable">see all</a>';
?>
			</div>
			<!-- Total Products End-->
		</div>
		<!-- Second section End -->
	</div>
</main>
<?php
// Include Admin Footer
require_once 'required/adminFooter.php';
?>
