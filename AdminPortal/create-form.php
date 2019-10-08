<?php
require_once 'required/adminHeader.php';
echo <<<_end
<main>
   <div class="container">
_end;
  if(isset($_GET["error"]))
  {
    if($_GET["error"] == "emptyfields")
    {
      echo "<h5 class=\"center-align red-text\">Please fill all the fields.</h5>";
    } else if($_GET["error"] == "invalidtext")
    {
      echo "<h5 class='center-align red-text'>Please fill the form with valid text.</h5>";
    }
  }
echo '
  <div class="row">
    <h4 class="left-align teal-text">Add Product</h4>
    <form action="included/createForm.php" class="col s12" method="POST" enctype="multipart/form-data">
    <!-- Card Title -->
    <div class="input-field col s9">
      <input type="text" id="card_title" name="title" validate required>
      <label for="card_title">Product Title</label>
    </div>
    <!-- Price -->
    <div class="input-field col s3">
      <input type="text" name="price" id="price" validate required>
      <label for="price">Price</label>
    </div>
    <!-- Card Description -->
    <div class="input-field col s12">
      <textarea id="card_description" class="materialize-textarea" data-length="200" name="description" validate required></textarea>
      <label for="card_description">Product Description</label>
    </div>
    <!-- Category Selet -->
    <div class="input-field col s12">
      <select name="category" required>
        <option value="" disabled selected>Please Select Category</option>
        <option value="shirts">Shirts</option>
        <option value="trouser">Trousers</option>
        <option value="sportswear">Sports Wear</option>
        <option value="swimwear">Swimwear</option>
        <option value="accessories">Accessories</option>
      </select>
      <label>Category</label>
    </div>
    <!-- Sizes Available -->
    <div class="input-field col s6">
      <span class="teal-text">Select Available Colors</span>
      <p>
        <label>
          <input type="checkbox" name="color[]" value="Red" />
          <span>Red</span>
        </label>
      </p>
      <p>
        <label>
          <input type="checkbox" name="color[]" value="Green" />
          <span>Green</span>
        </label>
      </p>
      <p>
        <label>
          <input type="checkbox" name="color[]" value="Blue" />
          <span>Blue</span>
        </label>
      </p>
    <p>
      <label>
        <input type="checkbox" name="color[]" value="Black" />
        <span>Black</span>
      </label>
    </p>
    <p>
      <label>
        <input type="checkbox" name="color[]" value="White" />
        <span>White</span>
      </label>
      </p>
    </div>

    <div class="input-field col s6">
      <span class="teal-text">Select Available Size</span>
      <p>
        <label>
          <input type="checkbox" name="size[]" value="XL" />
          <span>XL</span>
        </label>
      </p>
      <p>
        <label>
          <input type="checkbox" name="size[]" value="L" />
          <span>L</span>
        </label>
      </p>
      <p>
        <label>
          <input type="checkbox" name="size[]" value="M" />
          <span>M</span>
        </label>
      </p>
      <p>
        <label>
          <input type="checkbox" name="size[]" value="S" />
          <span>S</span>
        </label>
      </p>
      <p>
        <label>
          <input type="checkbox" name="size[]" value="XS" />
          <span>XS</span>
        </label>
      </p>
    </div>
    <!-- File Upload -->
    <div class="file-field input-field col s12">
      <div class="btn">
        <span>File</span>
        <input type="file" name="file[]" multiple>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Select Photo" name="file" required>
      </div>
    </div>
    <!-- Gender CheckBox -->
    <div class="col s6 center-align">
      <p>
        <label>
          <input class="with-gap active" type="radio" name="gender" value="man">
          <span>Man</span>
        </label>
      </p>
    </div>
    <div class="col s6 center-align">
      <p>
        <label>
          <input class="with-gap" type="radio" name="gender" value="female">
          <span>Woman</span>
        </label>
      </p>
    </div>
    <button type="submit" class="hoverable waves-effect waves-green btn" style="width:100%;margin-top:32px;" name="submit-btn">Post</button>
  </form>
</div>';
require_once 'required/FAB.php';
require_once 'required/adminModal.php';
echo '
  </div>
</main>';
require_once 'required/adminFooter.php';
