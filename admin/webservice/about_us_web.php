<?php 

include "../connection.php";

session_start();
$author_id = $_SESSION['admin_id'];

$sql = "select about_text from about_us where edit_date = (SELECT max(edit_date) from about_us)";
$res = $db->query($sql);


$about_text = "";
while($row = mysqli_fetch_array($res)){
$about_text = $row['about_text'];
}



?>

