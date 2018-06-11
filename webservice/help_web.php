<?php 

include "connection.php";

// session_start();
// $author_id = $_SESSION['admin_id'];

$sql = "select help_text from help where edit_date = (SELECT max(edit_date) from help)";
$res = $db->query($sql);


$help_text = "";
while($row = mysqli_fetch_array($res)){
$help_text = $row['help_text'];
}



?>