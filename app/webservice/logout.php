<?php
 session_start();
session_destroy();
$_SESSION = array();

// if($_SESSION['user']==""){
// 	//echo json_encode("done");
// 	//header("Location : login.php");
// }
echo "1";

?>