<?php
require_once 'required/header.php';
echo <<<_end
<main>
_end;
require_once 'required/img_slider.php';
require_once 'required/jumbotron.php';
require_once 'required/searchFAB.php';

echo <<<_end
<!-- Section 1 -->
<blockquote>
  <h4>Most featured</h4>
</blockquote>
<div class="row" id="section_1">
_end;
$query = "SELECT * FROM products LIMIT 10";
$result = $conn->query($query);
while($row = $result->fetch_assoc()) {
    echo '
    <div class="col s12 m6 l6">
      <div class="card hoverable">
        <div class="card-image">
          <img class="responsive-img" style="height:393.23px;" src="uploaded/'. $row["img"] .'">
          <span class="card-title">'. $row["title"] .'</span>';
          if(isset($_SESSION["username"])) {
          echo '
          <a class="btn-floating halfway-fab waves-effect waves-light btn-large grey hoverable likeIcon">
            <i class="material-icons">favorite</i>
          </a>
          <input type="hidden" value="'. $row["product_id"] .'" />
          ';
          }
        echo'
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
';
require_once 'required/newsletter.php';
require_once 'required/brand_img.php';
echo '
</main>';
require_once 'required/searchModal.php';
require_once 'required/footer.php';
?>
