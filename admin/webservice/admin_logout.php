<?php
 session_start();
session_destroy();
$_SESSION = array();

// if($_SESSION['user']==""){
// 	//echo json_encode("done");
// 	//header("Location : login.php");
// }
// if (session_status() == PHP_SESSION_ACTIVE) {
//   // echo json_encode("Session is active");
$url = "../admin_login.php";
  header("Location:".$url);
//}
?>