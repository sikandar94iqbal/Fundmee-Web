<?php 

include "../../connection.php";
$is_mobile = true;



$sql = "SELECT * FROM `user_project` ORDER BY project_date DESC";
$result = $db->query($sql);

while($row = mysqli_fetch_assoc($result)){
	echo json_encode($row);
}


?>