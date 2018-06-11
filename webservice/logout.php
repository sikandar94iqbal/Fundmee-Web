<?php
 session_start();
session_destroy();
$_SESSION = array();
$url = "../index.php";
//header("Location :"."$url");

echo "<SCRIPT type='text/javascript'> window.location.replace('../') </SCRIPT>";

// if($_SESSION['user']==""){
// 	//echo json_encode("done");
// 	//header("Location : login.php");
// }
// if (session_status() == PHP_SESSION_ACTIVE) {
//   echo json_encode("Session is active");
  
// }
?>