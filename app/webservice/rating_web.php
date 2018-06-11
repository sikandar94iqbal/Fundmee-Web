<?php

session_start();


include '../../connection.php';

$project_id = $_POST['project_id'];
$user_id = $_POST['user_id'];
$author_id = $_POST['author_id'];
$rating = $_POST['rating'];

//echo $project_id . " " . $user_id . " " .$author_id . " ".$rating . " ";
$std = new stdClass();
$sql1 = "select * from project_rating where user_id=$user_id and project_id=$project_id";
$res1 = $db->query($sql1);

$count_rows = mysqli_num_rows($res1);

if($count_rows == 0){

$sql = "INSERT INTO `project_rating`( `project_id`, `user_id`, `author_id`, `rating`) VALUES ($project_id,$user_id,$author_id,$rating)";

$res = $db->query($sql);


if($res){
$std->status = 1;
echo json_encode($std);
}
else{
$std->status = 0;
echo json_encode($std);
}

}
else if ($count_rows > 0 ){

$sql = "UPDATE `project_rating` SET `project_id`=$project_id,`user_id`=$user_id,`author_id`=$author_id,`rating`=$rating WHERE `project_id`=$project_id AND `user_id`=$user_id";

$res = $db->query($sql);


if($res){
$std->status = 1;
echo json_encode($std);
}
else{
$std->status = 0;
echo json_encode($std);
}



}



?>

