<?php
echo <<<_end
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a href="index.php" class="btn-floating cyan"><i class="material-icons">home</i></a></li>
    <li><a href="adminmail.php" class="btn-floating black"><i class="material-icons">mail</i></a></li>
    <li><a href="#modal1" class="btn-floating green modal-trigger"><i class="material-icons">delete</i></a></li>
    <li><a href="create-form.php" class="btn-floating orange"><i class="material-icons">add</i></a></li>
    <li><a href="included/adminsignout.inc.php" class="btn-floating indigo btn-large"><i class="material-icons">exit_to_app</i></a></li>
  </ul>
</div>
_end;
