<?php 

include "connection.php";
$is_mobile = true;



//RECENT PROJECTS
$sql = "SELECT user_project.project_id, `category_id`, `user_id`, `project_title`, `project_description`, `project_location`, `company`, `fund_target`, `video`, `image`, `project_date`, project_target_achieved.amount from user_project INNER join project_target_achieved on user_project.project_id=project_target_achieved.project_id ORDER by project_date desc limit 3";
$result = $db->query($sql);



$sql33 = "SELECT user_project.project_id, `category_id`, `user_id`, `project_title`, `project_description`, `project_location`, `company`, `fund_target`, `video`, `image`, `project_date`, project_target_achieved.amount from user_project INNER join project_target_achieved on user_project.project_id=project_target_achieved.project_id ORDER by project_date desc";


$res1 = $db->query($sql33);

$sql2 = "select * from project_category";
$res_cat = $db->query($sql2);



//WHATs MORE POPLULAR RATING ABOVE 3
$sql3 = "select project_target_achieved.amount, user_project.project_title,user_project.project_id,user_project.project_description,user_project.fund_target,user_project.image, project_category.category_name, project_rating.project_id, (sum(project_rating.rating)/count(project_rating.rating)) as AverageRating from user_project INNER join project_category on user_project.category_id = project_category.category_id INNER join project_rating on user_project.project_id = project_rating.project_id INNER join project_target_achieved on user_project.project_id=project_target_achieved.project_id where project_category.category_name='Tech' GROUP by user_project.project_id having (sum(project_rating.rating)/count(project_rating.rating)) >= 3 limit 3";

$result2 = $db->query($sql3);




$sql_most_fund = "select project_category.category_name,user_project.project_id, amount, user_project.project_title, user_project.project_description,user_project.image, user_project.fund_target from project_target_achieved INNER join user_project on project_target_achieved.project_id = user_project.project_id INNER join project_category on user_project.category_id = project_category.category_id where amount = (select max(amount) from project_target_achieved) limit 3";

$res_most_fund = $db->query($sql_most_fund);

?>