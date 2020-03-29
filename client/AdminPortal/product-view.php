<?php
// include the Navigation header
require_once 'required/adminHeader.php';
?>
<main>
    <div class="mb-top padding">
        <!-- ProductsView Section Start -->
        <div class="card-panel z-depth-2">
            <div class="row">
				<div class="col s12">
					<a href="./product-view-all.php" class="btn secondary-btn right">see all products</a>
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
                $query="SELECT product_id, product_name FROM products_info ORDER BY id DESC LIMIT 5";
                $results=$conn->query($query);
                while($row=$results->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <tr>                        
                        <td>'.$row["product_name"].'</td>        
                        <td>
                            <a href="./product-edit.php?id='.$row["product_id"].'" class="btn secondary-btn hoverable">
                                <i class="material-icons">edit</i>
                            </a>
                            <form style="display:inline-block" action="product-delete.php" method="POST">
                                <input type="submit" class="btn red hoverable" name="submit" value="delete" />
								<input type="hidden" name="product_id"  value="'.$row["product_id"].'" />                                    
                            </form>
                        </td>
                    </tr>';
                }
                ?>
                </tbody>
            </table>  
        </div>
        <!-- ProductView Section End -->
        <!-- Product Form -->
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
        </section> 
    </div>
</main>
<?php
// Include the footer
require_once 'required/adminFooter.php';
?>
