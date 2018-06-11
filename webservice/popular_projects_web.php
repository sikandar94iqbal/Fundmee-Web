<?php 


include "connection.php";
$is_mobile = true;



//WHATs MORE POPLULAR RATING ABOVE 3
$sql3 = "select project_target_achieved.amount, user_project.project_title,user_project.project_id,user_project.project_description,user_project.fund_target,user_project.image, project_category.category_name, project_rating.project_id, (sum(project_rating.rating)/count(project_rating.rating)) as AverageRating from user_project INNER join project_category on user_project.category_id = project_category.category_id INNER join project_rating on user_project.project_id = project_rating.project_id INNER join project_target_achieved on user_project.project_id=project_target_achieved.project_id where project_category.category_name='Tech' GROUP by user_project.project_id having (sum(project_rating.rating)/count(project_rating.rating)) >= 3";

$result2 = $db->query($sql3);

?>