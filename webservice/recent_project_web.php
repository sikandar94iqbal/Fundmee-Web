<?php 


include "connection.php";
$is_mobile = true;



//RECENT PROJECTS
$sql = "SELECT user_project.project_id, `category_id`, `user_id`, `project_title`, `project_description`, `project_location`, `company`, `fund_target`, `video`, `image`, `project_date`, project_target_achieved.amount from user_project INNER join project_target_achieved on user_project.project_id=project_target_achieved.project_id ORDER by project_date desc";
$result = $db->query($sql);

?>