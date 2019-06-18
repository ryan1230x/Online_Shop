<?php
require_once 'required/header.php';
echo <<<_end
<body>
    <main>
    <!-- Landing Jubotron -->
    <div class="jumbo">
        <blockquote style="border-left-color:#666;">
        <h4>Shopping Cart</h4>
        </blockquote>                    
    </div>

    <!-- Card Collection -->
    <div class="row">
_end;
$user = $_SESSION["username"];
$query = "select * from shoppingCart join products on products.product_id = shoppingCart.product_id WHERE username='$user'";
$result = $conn->query($query);
if($result->num_rows > 0) {
    echo '
    <div class="fixed-action-btn">        
    <a href="#" data-activates="checkout-nav" id="te" class="button-collapse btn-floating btn-large black pulse">
            <i class="material-icons">shopping_cart</i>
        </a>
    </div>';
    while($row = $result->fetch_assoc()) {
        echo '
        <div class="col s12 m6 l6">
            <div class="card">
            <div class="card-image">
                <img class="responsive-img" style="height:393.23px;" src="uploaded/'. $row["img"] .'">
                <span class="card-title">'. $row["title"] .'</span>
                <a class="btn-floating halfway-fab waves-effect waves-light btn-large grey hoverable deleteBtn">
                    <i class="material-icons">delete</i>
                </a>                  
                <input type="hidden" value="'. $row["product_id"] .'" />
            </div>
            <div class="card-content">
                <p class="truncate">'. $row["about"] .'</p>
            </div>
            <div class="card-action">
                <a href="product-view.php?id='. $row["img"] .'" class="btn-flat waves-effect">
                see more
                </a>
            </div>
            </div>
        </div>';
    }
}
       
echo '
</div>


<ul id="checkout-nav" class="side-nav" style="padding:0 32px;">
    <h5>Checkout</h5>    
    <hr />
    <div class="row">

        <div class="input-field col s12">
            <input type="text" class="validate" id="address" name="address" />
            <label for="address">Street Address (*)</label>
        </div>

        <div class="input-field col s12">
            <input type="text" class="validate" id="town" name="town" />
            <label for="town">Municipio / Town (*)</label>
        </div>

        <div class="input-field col s12">
            <input type="text" class="validate" id="mob" name="mob" />
            <label for="mob">Contact Number (*)</label>
        </div>

        <div class="input-field col s12" id="item">';
        $query = "select * from shoppingCart join products on products.product_id = shoppingCart.product_id WHERE username='$user'";
        $result = $conn->query($query);
        if($result->num_rows > 0 ) {
            while($row = $result->fetch_assoc()) {
                echo '
                <input type="hidden" name="item" value="'. $row["product_id"] .'" />';
            }
        }        
echo <<<_e
        </div>

        <div class="input-field col s12" id="color">
_e;
        $query = "select * from shoppingCart join products on products.product_id = shoppingCart.product_id WHERE username='$user'";
        $result = $conn->query($query);
        if($result->num_rows > 0 ) {
            while($row = $result->fetch_assoc()) {
                echo '
                <input type="hidden" name="color" value="'. $row["color"] .'" />';
            }
        }
echo'
        </div>

        <div class="input-field col s12" id="sizeitem">';

        $query = "select * from shoppingCart join products on products.product_id = shoppingCart.product_id WHERE username='$user'";
        $result = $conn->query($query);
        if($result->num_rows > 0 ) {
            while($row = $result->fetch_assoc()) {
                echo '
                <input type="hidden" name="size" value="'. $row["size"] .'" />';
            }
        }
echo '

        </div>

        <div class="col s12 center-align">
            <button class="btn waves-effect waves-black black" id="orderSubmit">order</button>
        </div>        

    </div>
</ul>


</main>';
require_once 'required/footer.php';

