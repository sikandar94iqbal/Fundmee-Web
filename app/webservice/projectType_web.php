<?php

 include '../../connection.php';


//POST ONE OF THE TYPES BELOW ( CHECK SPELLING N STUFF )
$new_category = $_POST['type'];



$project_we_love = "project we love";
$project_nearly_funded = "project nearly funded";
$project_just_launched = "project just launched";
$project_everything = "project everything";



$proj_we_love = false;
$proj_nearly_funded =false;
$proj_just_launched = false;
$proj_everything = false;


$std = new stdClass();

$data_Array = array(); 

 if($new_category == $project_we_love){

 $sql_proj_we_love = "select DISTINCT user_project.project_description,user_project.category_id,user_project.user_id,user_project.project_location,user_project.company,user_project.image,user_project.project_date,user_project.project_id, user_project.project_title, user_project.fund_target, avg(project_rating.rating) as rating, project_target_achieved.amount from user_project INNER join project_rating on user_project.project_id = project_rating.project_id INNER join project_target_achieved on project_target_achieved.project_id=user_project.project_id GROUP by project_rating.project_id HAVING floor(AVG(rating)) > 4";
    
    $res = $db->query($sql_proj_we_love);
    
    $proj_we_love = true;

    $count_proj_we_love = mysqli_num_rows($res);

    while ($row = mysqli_fetch_assoc($res)) {
        $data_Array[] = $row;
    }

    $std->data = $data_Array;

 }
 else if($new_category == $project_nearly_funded){

    $sql_proj_nearly_funded = "SELECT (user_project.fund_target/100) * 70 as perc,project_target_achieved.amount, user_project.project_title, user_project.project_description,user_project.project_id,user_project.user_id,user_project.project_location,user_project.company,user_project.fund_target,user_project.image, user_project.fund_target from project_target_achieved INNER join user_project on project_target_achieved.project_id = user_project.project_id where project_target_achieved.amount >= (user_project.fund_target/100) * 70";
$res = $db->query($sql_proj_nearly_funded);
$proj_nearly_funded = true;
$count_proj_nearly_funded= mysqli_num_rows($res);


 while ($row = mysqli_fetch_assoc($res)) {
        $data_Array[] = $row;
    }

    $std->data = $data_Array;

 }
 else if($new_category == $project_just_launched){


    $sql_proj_just_launched = "SELECT user_project.project_id, category_id, user_id, project_title, project_description, project_location, company, fund_target, video, image, project_date, project_target_achieved.amount from user_project INNER join project_target_achieved on user_project.project_id = project_target_achieved.project_id ORDER by project_date desc";

$res = $db->query($sql_proj_just_launched);

$count_proj_nearly_funded= mysqli_num_rows($res);

    $proj_just_launched = true;

 while ($row = mysqli_fetch_assoc($res)) {
        $data_Array[] = $row;
    }

    $std->data = $data_Array;


 }
 else if($project_everything){
$sql_proj_just_launched = "SELECT user_project.project_id, `category_id`, `user_id`, `project_title`, `project_description`, `project_location`, `company`, `fund_target`, `video`, `image`, `project_date`, project_target_achieved.amount from user_project INNER join project_target_achieved on user_project.project_id= project_target_achieved.project_id
";

$res = $db->query($sql_proj_just_launched);

$count_proj_nearly_funded = mysqli_num_rows($res);

    $proj_everything = true;

     while ($row = mysqli_fetch_assoc($res)) {
        $data_Array[] = $row;
    }

    $std->data = $data_Array;


 }


 echo json_encode($std);


?>