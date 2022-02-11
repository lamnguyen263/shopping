<?php
// header
require_once "./mvc/view/include/admin_header.php"; 
// require_once "./mvc/view/include/admin_topbar.php";	  	  
require_once "./mvc/view/include/admin_sidebar.php";

// content
require_once "./mvc/view/".$data['page'].".php";

//footer
require_once "./mvc/view/include/admin_footer.php";
?>