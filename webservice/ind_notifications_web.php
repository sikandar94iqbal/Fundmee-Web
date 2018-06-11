<?php


include("connection.php");
$u_id = $_SESSION['user_id'];
$notification_sign = false;
 $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$tokens = explode('id=', $url);
$n = $tokens[sizeof($tokens)-1];
//echo "<script>alert('$n');</script>";




 $new_notif = str_replace("-", " ", $n);


 $query_status = "UPDATE `temp_back_projects_status` SET `status_msg`= 1 WHERE `temp_back_id`=$new_notif";
$res_status = $db->query($query_status);



 $check_if_already_sql = "select * from backed_projects where temp_back_id = $new_notif";
$check_if_already_res = $db->query($check_if_already_sql);

$already_backed = false;

if($check_if_already_res){
    $row_cnt_notif = mysqli_num_rows($check_if_already_res);
    if($row_cnt_notif > 0){
        $already_backed = true;
    }
}


$sql = "SELECT user_project.image, temp_back_projects.t_pin,user_project.fund_target,temp_back_projects.author_id, temp_back_projects.backer_id ,temp_back_projects.project_id,temp_back_projects.amount, user_project.project_title, user_registration.name,temp_back_id from temp_back_projects INNER join user_project on user_project.project_id = temp_back_projects.project_id INNER join user_registration on user_registration.user_id = temp_back_projects.backer_id where temp_back_id= $new_notif";

$res = $db->query($sql);

if($res){
  while($row = mysqli_fetch_array($res)){
    $t_pin = $row['t_pin'];
    $fund_target = $row['fund_target'];
    $amount = $row['amount'];
    $project_title = $row['project_title'];
    $name = $row['name'];

    $temp_back_id = $row['temp_back_id'];
    $author_id = $row['author_id'];
    $backer_id = $row['backer_id'];
    $project_id = $row['project_id'];
    $image = $row['image'];
  }
}



?>