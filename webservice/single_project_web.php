<?php


  include 'connection.php';
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$tokens = explode('id=', $url);
$n = $tokens[sizeof($tokens)-1];
//echo "<script>alert('$n');</script>";




 $new_project = str_replace("-", " ", $n);

  $query0 = "SELECT  user_project.project_id, user_project.user_id, project_target_achieved.amount,`name`,`category_name`,`project_title`, `project_description`, `project_location`, user_project.company, `fund_target`, `video`, user_project.image, `project_date` FROM `user_project` INNER JOIN project_category ON user_project.category_id=project_category.category_id INNER JOIN user_registration ON user_registration.user_id=user_project.user_id INNER JOIN project_target_achieved ON user_project.project_id=project_target_achieved.project_id where user_project.project_id = $new_project";
   $result0 = $db->query($query0);




     $query1 = "Select * from backed_projects where project_id=$new_project";
   $result1 = $db->query($query1);

$backers_available = false;
  if (mysqli_num_rows($result1)==0){
    $backers_available = false;
    //echo "<script>alert('result empty');</script>";
  }
  else{
    $backers_available = true;
     
     $sql = "Select project_target_achieved.amount,count(backed_projects.project_id) as backers from backed_projects INNER join user_project on user_project.project_id=backed_projects.project_id INNER join project_target_achieved on backed_projects.project_id=project_target_achieved.project_id where user_project.project_id = $new_project GROUP by backed_projects.project_id
";
     $res = $db->query($sql);

     while ($row = mysqli_fetch_array($res)) {
       $backers_count = $row['backers']; 
       $project_target_achieved = $row['amount'];
     }

    // echo "<script>alert('result not empty');</script>";
  }


while($row = mysqli_fetch_array($result0)){
  $author_id = $row['user_id'];
  $project_title = $row['project_title'];
  $project_description = $row['project_description'];
  $project_category = $row['category_name'];
  $author_name = $row['name'];
  $project_date = $row['project_date'];
  $project_image = $row['image'];
  $project_target_fund = $row['fund_target'];
  $project_target_achieved = $row['amount'];
  $project_id = $row['project_id'];


}


$sql_rating = "select * from project_rating where project_id=$project_id";
$res_rating = $db->query($sql_rating);
$ratings = 0;
$cnt_rating = mysqli_num_rows($res_rating);
if($res_rating){
  // echo "<script>alert($cnt_rating)</script>";
  if($cnt_rating == 0){
    //RATING IS 0
  }
  else if($cnt_rating > 0){
    //RATING IS AVAILABLE
    $get_rating_sql = "select project_id, AVG(rating) as rating from project_rating where project_id=$project_id";

    $res_rating_sql = $db->query($get_rating_sql);

    if($res_rating_sql){
      while($row = mysqli_fetch_array($res_rating_sql)){
        $ratings = $row['rating'];
      }
    }
  }



}


?>