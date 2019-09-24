<?php
echo <<<_end
<div class="modal bottom-sheet" id="modal1">
<!-- Modal Content -->
<div class="modal-content">
  <div class="row">
    <div class="col s12">
      <h5 class="red-text left-align">Delete Product</h5><hr />
    </div>
    <div class="col s12 mb-top">
      <!-- Search Bar -->
      <nav>
        <div class="nav-wrapper">
          <div class="input-field">
            <input type="search" name="search" id="search">
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- Product Table -->
  <table class="striped centered">
    <thead>
      <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Action</th>
      </tr>
    </thead>
      <tbody>
_end;
$query = "SELECT * FROM products ORDER BY id DESC LIMIT 10";
$stmt = $conn->prepare($query); $stmt->execute([]);
if($stmt->rowCount() > 0) {
  while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
    echo '
    <tr>
      <td>
        <img src="uploaded/'.$row["img"].'" class="materialboxed" style="cursor:pointer;width:50px;height:50px;border-radius:3px;">
      </td>
      <td>'.$row["title"].'</td>
      <td><form action="included/delete.inc.php" method="POST">
        <button class="btn red" name="deleteBtn">delete</button>
        <input type="hidden" value="'.$row["id"].'" name="itemId" />
        </form>
      </td>
    </tr>';
    }
  }
echo '
</tbody>
</table>
</div>
</div>';
