<?php


include("connection.php");

session_start();
    if(isset($_SESSION['admin_name'])==false){
header('Location: ../admin/admin_login.php');
  }

$sql = "SELECT DISTINCT project_id FROM backed_projects";
$res = $db->query($sql);

if($res){
$count_backed_projects = mysqli_num_rows($res);
//echo "<script>alert($num_rows)</script>";
}


$sql2 = "select count(category_id) as countt from project_category";
$res2 = $db->query($sql2);

if($res2){
  while($row = mysqli_fetch_array($res2)){
   $count_categories = $row['countt'];
  }
}


$sql3 = "select count(project_id) as countt from user_project";
$res3 = $db->query($sql3);

if($res3){
  while($row = mysqli_fetch_array($res3)){
   $count_projects = $row['countt'];
  }
}

$sql4 = "select sum(amount) as total from project_target_achieved";
$res4 = $db->query($sql4);

if($res4){
  while($row = mysqli_fetch_array($res4)){
   $total_fund = $row['total'];
  }
}



$sql5 = "select count(user_id) as countt from user_registration";
$res5 = $db->query($sql5);

if($res5){
  while($row = mysqli_fetch_array($res5)){
   $user_count = $row['countt'];
  }
}

$sql6 = "select count(DISTINCT user_id) as countt from user_project";
$res6 = $db->query($sql6);

if($res6){
  while($row = mysqli_fetch_array($res6)){
   $author_count = $row['countt'];
  }
}

$sql7 = "select count(DISTINCT backer_id) as countt from backed_projects";
$res7 = $db->query($sql7);

if($res7){
  while($row = mysqli_fetch_array($res7)){
   $backer_count = $row['countt'];
  }
}




?>