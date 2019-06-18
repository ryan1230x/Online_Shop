<?php
require_once 'required/header.php';
// Make a query to the databases
$value = $_GET["id"];
$query = "SELECT * FROM products WHERE img ='$value' LIMIT 1" ;

$result = mysqli_query($conn, $query);
// Check to see if there are row with the result
$result_check = mysqli_num_rows($result);
// Check to see if the $result_check was greater than 0
if($result_check > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo '
    <main>

      <!-- Img slider -->
      <div class="slider" id="product-slider">
        <ul class="slides">
          <li>
            <img class="img-responsive" src="uploaded/'. $row["img"] .'"> 
          </li>      
        </ul>
      </div>      
      <div class="row">      
        <div class="col s12">
          <ul class="tabs tabs-fixed-width">
            <li class="tab"><a class="about" href="#about">About</a></li>
            <li class="tab"><a  href="#gallery">Gallery</a></li>
            <li class="tab"><a href="#review">Reviews</a></li>        
          </ul>  

        <div id="about" class="col s12">
          <blockquote>
            <h4>'. $row["title"] .' $'. $row["price"] .'</h4>
          </blockquote>
          <p>'. $row["about"] .'</p>                    
        </div>

        <div id="gallery" class="col s12">
        
        </div>
        <div id="review" class="col s12">
        
        </div>      
          
      </div>
      <div class="fixed-action-btn">
        <a class="btn-floating btn-large black modal-trigger pulse" href="#cartModal">
          <i class="large material-icons">shopping_cart</i>
        </a>        
      </div>
      <div id="cartModal" class="modal modal-fixed-footer">
        <div class="modal-content">';
        if(isset($_SESSION["username"])) {
          echo '
          <form class="input-field col s12">            
            <h4>Choose A Color</h4>
            <div class="input-field">
              <select name="color" id="color">';
              $query = "SELECT products.title, products.product_id, product_color.product_color FROM product_color 
              INNER JOIN products ON products.title = product_color.product_id
              WHERE products.img = '$value'";
              $result = mysqli_query($conn, $query);
              while($row = mysqli_fetch_assoc($result))
              {
                echo '<option value="'. $row["product_color"] .'">'. $row["product_color"] .'</option>';
              }
              echo'
              </select>
            </div>
            <h4>Choose A Size</h4>
            <div class="input-field">
              <select name="size" id="size">';
              $query = "SELECT products.title, products.product_id, product_size.product_size FROM product_size 
              INNER JOIN products ON products.title = product_size.product_id
              WHERE products.img = '$value'";
              $result = mysqli_query($conn, $query);
              while($row = mysqli_fetch_assoc($result))
              {
                echo '<option value="'. $row["product_size"] .'">'. $row["product_size"] .'</option>';
              }
              echo '
              </select>';
              $query = "SELECT * FROM products WHERE img ='$value' LIMIT 1" ;
              $result = $conn->query($query);
              while($row = $result->fetch_assoc())
              {
                echo '<input id="hidden" type="hidden" value='. $row["product_id"] .' />';
              }

            echo '  
            </div>        
          </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat" type="button">Close</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="order_btn" type="submit">OK</a>            
        </div>
      </div>';

      } else {
        echo'
        
        <h6 class="flow-text">To add Items to Shopping cart you Must Create an account and Sign In.</h6>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat" type="button">Close</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>            
        </div>
      </div>';
      }
      echo '      
    </main>
    ';
  }
}

require_once 'required/footer.php';