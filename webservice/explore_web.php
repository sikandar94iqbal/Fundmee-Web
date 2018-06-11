<?php

  include 'connection.php';
if($db){
  // echo "<script language='javascript'>alert('succeess');</script>";
}
else{
  //echo "<script language='javascript'>alert('failed');</script>";
}

//count for categories
$query0 = "SELECT count(project_category.category_id) as count,category_name,project_category.category_id from project_category INNER join user_project on user_project.category_id = project_category.category_id GROUP by project_category.category_id
";
$result0 = $db->query($query0);


//project we love
$sql_proj_we_love = "select DISTINCT user_project.project_description,user_project.category_id,user_project.user_id,user_project.project_location,user_project.company,user_project.image,user_project.project_date,user_project.project_id, user_project.project_title, user_project.fund_target, avg(project_rating.rating), project_target_achieved.amount from user_project INNER join project_rating on user_project.project_id = project_rating.project_id INNER join project_target_achieved on project_target_achieved.project_id=user_project.project_id GROUP by project_rating.project_id HAVING floor(AVG(rating)) > 4";
$res_proj_we_love = $db->query($sql_proj_we_love);

$count_proj_we_love = mysqli_num_rows($res_proj_we_love);



$sql_proj_nearly_funded = "SELECT (user_project.fund_target/100) * 70 as perc,project_target_achieved.amount, user_project.project_title, user_project.fund_target from project_target_achieved INNER join user_project on project_target_achieved.project_id = user_project.project_id where project_target_achieved.amount >= (user_project.fund_target/100) * 70";
$res_proj_nearly_funded = $db->query($sql_proj_nearly_funded);

$count_proj_nearly_funded= mysqli_num_rows($res_proj_nearly_funded);





$sql_proj_just_started = "SELECT user_project.project_id, category_id, user_id, project_title, project_description, project_location, company, fund_target, video, image, project_date, project_target_achieved.amount from user_project INNER join project_target_achieved on user_project.project_id = project_target_achieved.project_id ORDER by project_date desc";
$res_proj_just_started = $db->query($sql_proj_just_started);

$count_proj_just_started = mysqli_num_rows($res_proj_just_started);




$sql_proj_Everything = "select * from user_project";
$res_proj_Everything = $db->query($sql_proj_Everything);

$count_proj_Everything = mysqli_num_rows($res_proj_Everything);


?>