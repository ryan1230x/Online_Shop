<?php
require_once 'required/header.php';
echo <<<_end
<main>
  <blockquote>
      <h4>Seach Page</h4>
  </blockquote>
  <div class="row">
_end;
if(isset($_GET["search"])) {

  // Query the database
  $query = "SELECT * FROM products WHERE title LIKE '%$search%' OR about LIKE '%$search%'";
  // Run the query to the database, store the result in a variable
  $stmt = $conn->prepare($query);
  $stmt->execute([$_GET["search"]]);
  // Conditional statement, if the number of row is greater than 0
  if($stmt->rowCount() > 0) {
    while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
    echo '
    <div class="col s12 m6 l6">
      <div class="card">
        <div class="card-image">
          <img class="responsive-img" style="height:393.23px;" src="uploaded/'. $row["img"] .'">
          <span class="card-title">'. $row["title"] .'</span>';
          if(isset($_SESSION["username"])) 
          {
            echo '
            <a class="btn-floating halfway-fab waves-effect waves-light btn-large grey hoverable likeIcon">
              <i class="material-icons">favorite</i>
            </a>
            <input type="hidden" value="'. $row["product_id"] .'" />';
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
  }
} 
echo <<<_end
  </div>
</main>
_end;
require_once 'required/searchFAB.php';
require_once 'required/searchModal.php';
require_once 'required/footer.php';