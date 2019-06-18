<?php
require_once 'required/header.php';
echo <<<_end
<body>
    <main>
    <!-- Landing Jubotron -->
    <div class="jumbo">
        <blockquote style="border-left-color:#666;">
        <h4>WishList</h4>
        </blockquote>                    
    </div>

    <!-- Card Collection -->
    <div class="row">
_end;
$user = $_SESSION["username"];
$query = "select * from wishlist join products on products.product_id = wishlist.product_id where username='$user'";
$result = $conn->query($query);
while($row = $result->fetch_assoc()) {
    echo '
    <div class="col s12 m6 l6">
        <div class="card">
        <div class="card-image">
            <img class="responsive-img" style="height:393.23px;" src="uploaded/'. $row["img"] .'">
            <span class="card-title">'. $row["title"] .'</span>            
            <a class="btn-floating halfway-fab waves-effect waves-light btn-large grey hoverable unLike" >
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
        
echo '
    </div>
    </main>';
require_once 'required/footer.php';


