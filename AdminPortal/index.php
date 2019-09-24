<?php
require_once 'required/adminHeader.php';
echo <<<_end
<main>
  <div class="container">
    <h4 class="left-align">Dashboard</h4><hr>
    <!-- Most Wanted Products -->  
    <div class="row">
    	<div class="col s6 m8">
	    	<h6 class="teal-text">Uploaded Articles</h6>
    	</div>
    		<form method="POST" action="adminSearch.php">
        <div class="input-field col s12 m4">
          <i class="material-icons prefix">search</i>
          <input type="text" id="search_bar" name="item"  />
          <label for="search_bar">Search</label>          
				</div>
			</form>
    </div>
    <table class="striped centered">
      <thead>
        <tr>
          <th>Image</th>
          <th>Product Name</th>
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
      <td><a class="btn waves-effect" href="admin-edit.php?id='. $row["img"] .'&mode=read">see</a></td>
    </tr>';
  }
}
echo'
  </tbody>
</table>';

require 'required/FAB.php';

echo <<<_end
</div>
_end;

require_once 'required/adminModal.php';

echo <<<_end
</main>
_end;

require_once 'required/adminFooter.php';
