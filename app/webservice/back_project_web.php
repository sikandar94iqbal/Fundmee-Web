<?php
include "../../connection.php";

$std = new stdClass();

//READ ME//
//GET THESE VALUES FROM ANDROID

// ----> $project = $_POST['project_id'];
$backer = $_POST['backer_id'];
$author = $_POST['author_id'];
$amount = $_POST['amount_id'];
$temp_back_id = $_POST['temp_back_id'];

//TESTING
// $project = 25;
// $backer = 101;
// $author = 102;
// $amount = 3999;
// $temp_back_id = 40;
////// COMMENT ABOVE WHEN DONE
//NOTE : ABOVE TESTING VALUES WILL WORK IF YOU DELETE LAST ROW OF
//BACKED_PROJECTS TABLE 


$sql = "INSERT INTO `backed_projects`( `project_id`, `backer_id`, `author_id`, `amount`,`temp_back_id`) VALUES ($project,$backer,$author,$amount,$temp_back_id)";
$res = $db->query($sql);

$sql1 = "update project_target_achieved set amount = amount + ".$amount." where project_id = $project";
$res1 = $db->query($sql1);

if($res){
	//echo "1";
	$std->status = "1";
}
else {
	$std->status = "0";
	//echo "0";
}

echo json_encode($std);

?>