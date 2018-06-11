<?php


include 'connection.php';
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$tokens = explode('id=', $url);
$n = $tokens[sizeof($tokens)-1];
//echo "<script>alert('$n');</script>";




 $new_category = str_replace("-", " ", $n);

 $query0 = "SELECT user_project.project_id, `category_id`, `user_id`, `project_title`, `project_description`, `project_location`, `company`, `fund_target`, `video`, `image`, `project_date`, project_target_achieved.amount from user_project INNER join project_target_achieved on user_project.project_id= project_target_achieved.project_id where category_id=$new_category";
$result0 = $db->query($query0);

 //echo "<script language='javascript'>alert('$new_category');</script>";

?>