<?php
echo <<<_end
<div id="searchModal" class="modal bottom-sheet">
    <div class="modal-content">         
      <div class="row">
        <div class="col s12">
          <form class="input-field col s12" action="search.php" method="GET">

          <div class="input-field col s12">
            <input type="search" class="validate" id="search" name="search" />
            <label for="search">Search For Product...</lable>
          </div>

          </form>
        </div>
      </div>
    </div>
    <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Close</a>
      <a href="#!" class="modal-action modal-close waves-effect btn black">Search</a>
    </div>
  </div>
_end;
