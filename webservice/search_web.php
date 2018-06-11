<?php


include("connection.php");


$notification_sign = false;

//include "webservice/search_web.php";




$type = $_POST['search_type'];
$search_item = $_POST['search_item'];

$is_by_author = false;
$is_by_project = false;
$is_by_funders = false;
$is_by_content_creators = false;
$is_by_amount = false;

//echo "<script>alert('$type')</script>";

if($type == "By Name"){
  $sql = "SELECT * FROM `user_registration` WHERE name LIKE '%".$search_item."%'";
  $res = $db->query($sql);
  $is_by_author = true;
 
}
else if($type == "By Funders"){
 $sql = "SELECT user_registration.image,name, user_registration.user_id , backed_projects.project_id, amount, user_project.project_title from user_registration INNER join backed_projects on user_registration.user_id = backed_projects.backer_id INNER join user_project on user_project.project_id = backed_projects.project_id where name like 
 '%".$search_item."%'";
  $res = $db->query($sql);
  $is_by_funders = true;

}
else if($type == "By Content Creators"){
$sql = "select name, user_registration.user_id, user_project.image, user_project.project_id, project_title, project_description,user_project.fund_target,project_target_achieved.amount from user_registration INNER join user_project on user_project.user_id=user_registration.user_id INNER join project_target_achieved on user_project.project_id=project_target_achieved.project_id where user_registration.name like '%".$search_item."%'";
  $res = $db->query($sql);
 $is_by_content_creators = true;
}
else if($type == "By Project"){
$is_by_project = true;
  $sql = "select name, user_registration.user_id, user_project.image, user_project.project_id, project_title, project_description,user_project.fund_target,project_target_achieved.amount from user_registration INNER join user_project on user_project.user_id=user_registration.user_id INNER join project_target_achieved on user_project.project_id=project_target_achieved.project_id where user_project.project_title LIKE '%".$search_item."%'";
  $res = $db->query($sql);
  
}
else if($type == "By Project Amount (under)"){
$sql = "select name, user_registration.user_id, user_project.image, user_project.project_id, project_title, project_description,user_project.fund_target,project_target_achieved.amount from user_registration INNER join user_project on user_project.user_id=user_registration.user_id INNER join project_target_achieved on user_project.project_id=project_target_achieved.project_id where user_project.fund_target <= ".$search_item;
  $res = $db->query($sql);
  $is_by_amount = true;
  
}



 // echo "1";




?>