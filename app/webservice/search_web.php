<?php


include("../../connection.php");


$notification_sign = false;



//READ ME
//GET SEARCH TYPE AND SEARCH TEXT FROM ANDROID AND PUT BELOW
//API WILL RETURN 0 WHEN NO RESULT FOUND
// --->
$type = $_POST['search_type'];
$search_item = $_POST['search_item'];



 // $type = "By Project Amount (under)";
 // $search_item = "20000";

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
  
  $data_array = array();
  $std= new stdClass();
  if($res){
    if(mysqli_num_rows($res) == 0){
       $empty = "0";
     echo json_encode($empty);
    }else{
    while($row = mysqli_fetch_assoc($res)){
      $data_array[] = $row; 
    }
    $std->searchResult = $data_array;
    echo json_encode($std);
  }
  }else{
    $std->searcResult = "0";
     // echo json_encode($std);
  }
 
}
else if($type == "By Funders"){
 $sql = "SELECT user_registration.image,name, user_registration.user_id , backed_projects.project_id, amount, user_project.project_title from user_registration INNER join backed_projects on user_registration.user_id = backed_projects.backer_id INNER join user_project on user_project.project_id = backed_projects.project_id where name like 
 '%".$search_item."%'";
  $res = $db->query($sql);
  $is_by_funders = true;

  $data_array = array();
  $std= new stdClass();
  if($res){
    if(mysqli_num_rows($res) == 0){
       $empty = "0";
     echo json_encode($empty);
    }else{
    while($row = mysqli_fetch_assoc($res)){
      $data_array[] = $row; 
    }
    $std->searchResult = $data_array;
    echo json_encode($std);
  }
  }else{
    $std->searcResult = "0";
     // echo json_encode($std);
  }

}
else if($type == "By Content Creators"){
$sql = "select name, user_registration.user_id, user_project.image, project_id, project_title, project_description from user_registration INNER join user_project on user_project.user_id=user_registration.user_id where user_registration.name like '%".$search_item."%'";
  $res = $db->query($sql);
 $is_by_content_creators = true;

 $data_array = array();
  $std= new stdClass();
  if($res){
    if(mysqli_num_rows($res) == 0){
       $empty = "0";
     echo json_encode($empty);
    }else{
    while($row = mysqli_fetch_assoc($res)){
      $data_array[] = $row; 
    }
    $std->searchResult = $data_array;
    echo json_encode($std);
  }
  }else{
    $std->searcResult = "0";
     // echo json_encode($std);
  }
}
else if($type == "By Project"){
$is_by_project = true;
  $sql = "SELECT * FROM `user_project` WHERE project_title LIKE '%".$search_item."%'";
  $res = $db->query($sql);

  $data_array = array();
  $std= new stdClass();
  if($res){
    if(mysqli_num_rows($res) == 0){
       $empty = "0";
     echo json_encode($empty);
    }else{
    while($row = mysqli_fetch_assoc($res)){
      $data_array[] = $row; 
    }
    $std->searchResult = $data_array;
    echo json_encode($std);
  }
  }else{
    $std->searcResult = "0";
     // echo json_encode($std);
  }
  
}
else if($type == "By Project Amount (under)"){
$sql = "SELECT * FROM `user_project` WHERE fund_target <= ".$search_item;
  $res = $db->query($sql);
  $is_by_amount = true;

  $data_array = array();
  $std= new stdClass();
  if($res){
    if(mysqli_num_rows($res) == 0){
       $empty = "0";
     echo json_encode($empty);
    }else{
    while($row = mysqli_fetch_assoc($res)){
      $data_array[] = $row; 
    }
    $std->searchResult = $data_array;
    echo json_encode($std);
  }
  }else{
    $std->searcResult = "0";
     // echo json_encode($std);
  }
  
}



 // echo "1";




?>