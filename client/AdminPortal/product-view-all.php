<?php
//require header
require_once 'required/adminHeader.php';
?>
<main>
	<div class="padding">
		<section class="card-panel z-depth-2">
			<h4>All Products</h4>
			<div class="row">
				<div class="col s12 m4 l4 input-field">
					<form action="#" method="post" class="col s12">        
	                    <input type="text" id="search" validate />
    	                <label for="search">
							<i class="material-icons">search</i> Search
						</label> 
					<form>
                </div>
			</div>
			<table>
                <thead>
                <tr>                    
                    <th>ITEM NAME</th>          
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query="SELECT product_id, product_name FROM products_info ORDER BY id DESC";
                $results=$conn->query($query);
                while($row=$results->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <tr>                        
                        <td>'.$row["product_name"].'</td>        
                        <td style="display:flex">
                            <a href="./product-edit.php?id='.$row["product_id"].'" class="btn secondary-btn hoverable">
                                <i class="material-icons">edit</i>
                            </a>
							<form action="./included/product-update.php" method="post">
	                            <input type="submit" class="btn red hoverable" value="delete" />
								<input type="hidden" value="'.$row["product_id"].'" />                                                         
							</form>
                        </td>
                    </tr>';
                }
                ?>
                </tbody>
            </table>  			
		</section>
	</div>
</main>
<?php
//require footer
require_once 'required/adminFooter.php';
?>
