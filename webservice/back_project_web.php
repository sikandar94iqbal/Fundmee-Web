<?php
include "connection.php";

$project = $_POST['project_id'];
$backer = $_POST['backer_id'];
$author = $_POST['author_id'];
$amount = $_POST['amount_id'];
$temp_back_id = $_POST['temp_back_id'];


$sql = "INSERT INTO `backed_projects`( `project_id`, `backer_id`, `author_id`, `amount`,`temp_back_id`) VALUES ($project,$backer,$author,$amount,$temp_back_id)";
$res = $db->query($sql);

$sql1 = "update project_target_achieved set amount = amount + ".$amount." where project_id = $project";
$res1 = $db->query($sql1);

if($res){
	echo "1";
}
else {
	echo "0";
}


?>