<?php 

include "../connection.php";

session_start();
$author_id = $_SESSION['admin_id'];

$sql = "select faq_text from faq where edit_date = (SELECT max(edit_date) from faq)";
$res = $db->query($sql);


$faq_text = "";
while($row = mysqli_fetch_array($res)){
$faq_text = $row['faq_text'];
}



?>