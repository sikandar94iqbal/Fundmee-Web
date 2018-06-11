<?php

include "connection.php";
$u_id = $_SESSION['user_id'];
$sql = "select * from user_registration where user_id = $u_id";
$res=$db->query($sql);

while($row = mysqli_fetch_array($res)){
	$bio = $row['biography'];
}

$profile_available = false;

if($bio==""){
	$profile_available = false;
}
else{
	$profile_available = true;
}

?>