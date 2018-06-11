<?php

include("connection.php");
$u_id = $_SESSION['user_id'];
$notification_sign = false;

$sql = "SELECT temp_back_projects_status.status_msg, temp_back_projects.author_id, temp_back_projects.backer_id ,temp_back_projects.project_id,temp_back_projects.amount, user_project.project_title, user_registration.name, temp_back_projects.temp_back_id from temp_back_projects INNER join user_project on user_project.project_id = temp_back_projects.project_id INNER join user_registration on user_registration.user_id = temp_back_projects.backer_id INNER join temp_back_projects_status on temp_back_projects_status.temp_back_id = temp_back_projects.temp_back_id where author_id=$u_id ORDER by temp_back_projects.notif_date DESC";

$res = $db->query($sql);

if($res){

}

?>