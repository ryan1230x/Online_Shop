<?php
if(isset($_GET["upload"])) {
 if($_GET["upload"] === "success") {
  echo '<div class="card-panel teal">
		<p class="flow-text">The product has been uploaded <b>Successfully!</b></p>
	</div> ';

 } elseif ($_GET["upload"] === "failed") {
 echo '<div class="card-panel red">
		<p class="flow-text">There was an <b>error</b>, Please try again!</p>
       </div>';
 }
}


echo' 
<div id="purchasedSection" class="card-panel z-depth-2">
    <div class="row">
        <div class="col s12 m4 l4 input-field">        
            <input type="text" id="search" validate />
            <label for="search"><i class="material-icons">search</i> Search</label>        
        </div>        
    </div>
    <table>
	<thead>
		<tr>
			<th>ITEM NAME</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>';
$query="SELECT product_id, product_name FROM products_info ORDER BY id DESC LIMIT 5";
$results=$conn->query($query);
while($row=$results->fetch(PDO::FETCH_ASSOC)) {
	echo '
	<tr>
		<td>'.$row["product_name"].'</td>
		<td>
			<a href="?id='.$row["product_id"].'" class="btn secondary-btn hoverable">
				<i class="material-icons">edit</i>
			</a>
			<button class="btn red hoverable">
				<i class="material-icons">delete</i>
			</button>
		</td>
	</tr>
	';
}
echo'
        </tbody>
    </table>  
</div>

<section class="card-panel z-depth-2">
    <h4 class="align-left">Add Product</h4>
        <div class="row">            		
            <form action="included/upload.php" method="POST" id="modal-form" enctype="multipart/form-data">
                <div class="input-field col s12 m9">
                    <input type="text" id="title" name="title" requried />
                    <label for="title" >Product Title</label>
                </div>
                <div class="input-field col s12 m3">
                    <input type="text" id="price" class="validate" name="price" required />
                    <label for="price">Price</label>
                </div>
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" id="description" name="about" required></textarea>
                    <label for="description">Product Description</label>
                </div>
                <div class="input-field col s12">
                
                <select name="category" required >
                    <option value="0" disabled selected>Choose the category</option>
                    <option value="Shirts">Shirts</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Jacket">Jacket</option>
                    <option value="Trousers">Trousers</option>                    
                </select> 
                </div>
                <div class="input-field col s12">
                   
                    <select name="gender" required>
                        <option value="0" disabled selected>Choose your Gender</option>
                        <option value="men">Man</option>
                        <option value="women">Woman</option>
                    </select>
                </div>
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="large_file" id="large_file" required >
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Select Photo (Large)" id="file">
                    </div>
                </div> 

                <input type="submit" name="submit" class="btn waves-effect secondary-btn right mb-2 mt-2" value="add product" />
            </form>
        </div>    
</section>';
?>
