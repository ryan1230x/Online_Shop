<?php
require_once 'required/adminHeader.php';
echo '
<main>
	<div class="mb-top padding" id="container">
		<div class="" id="firstSection">';
require_once 'required/mostWanted.php';
require_once 'required/mostPurchased.php';
echo '
		</div>
		<div id="secondSection">';

require_once 'required/totalUsers.php';
require_once 'required/ordersSent.php';
require_once 'required/totalProducts.php';
echo '
		</div>
	</div>
	

</main>';
require_once 'required/adminFooter.php';
