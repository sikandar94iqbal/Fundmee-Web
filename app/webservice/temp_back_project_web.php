<?php


  include '../../connection.php';
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$tokens = explode('id=', $url);
$n = $tokens[sizeof($tokens)-1];


$back_projects_status = new stdClass();
$status_array = array();

 // $new_project = str_replace("-", " ", $n);

//READ ME
//GET PROJECT ID from android
//API returns 1 on success and 0 on fail and if submitted funding is ////
///more than taget fund API GIVES 100, handle in android accordingly
  $new_project = $_POST['project_id'];

 $bank_info_array = array();
 $easy_paisa_array = array();

 $std = new stdClass();

 $project_name = "";
 $author_ids = 0;
 $fund_targett = 0;




$query_id = "Select user_id from user_project where project_id=$new_project";
$res_id = $db->query($query_id);

if($res_id){
  while($row = mysqli_fetch_array($res_id)){
    $author_id = $row['user_id'];
   }
   
   $query1 = "select * from user_bank where user_id = $author_id";
   $query2 = "select * from transaction_easypaisa_method where user_id = $author_id";


   $res1 = $db->query($query1);
   $res2 = $db->query($query2);

    if($res1 && $res2){
      while($row = mysqli_fetch_assoc($res1)){
        $bank_acc = $row['bank_acc'];
        $bank_branch = $row['bank_branch_no'];

        $bank_info_array[] = $row;
      }
      while($row = mysqli_fetch_assoc($res2)){
        $user_phone = $row['user_phone'];
        $user_cnic = $row['user_cnic'];

        $easy_paisa_array[] = $row; 

      }
    }
  //echo "<script>alert('$author_id');</script>";
}


$std->bank = $bank_info_array;
$std->easypaise = $easy_paisa_array;

//sending json bank n easypaisa info
echo json_encode($std);



$sent = false;
$t_pin = generateRandomString();

$sql1 = "Select * from user_project where project_id='$new_project'";
$result1 = $db->query($sql1);
  $author_user_ids[]=array();
 while($row=mysqli_fetch_array($result1))
    {
      $project_title = $row['project_title'];
      $author_user_ids[]=$row['user_id'];
    }

    $project_name = $project_title;
    $author_ids = $author_user_ids[1];

$std->project_title = $project_name;
$std->author_id = $author_ids;

//GET ALL THESE VALUES FROM ANDROID on button pressed

if(isset($_POST['submit'])){

 $fund_amount = $_POST['fund_id'];
 $project_id = $new_project;
 $method = $_POST['method_id'];
$comment = $_POST['comment_id'];
$user_id = $_POST['user_id'];

//$namez = $_SESSION['user_name'];


$sql_target = "select * from user_project where project_id = $project_id";

$result_target = $db->query($sql_target);
$target=0;
if($result_target){
  while($row = mysqli_fetch_array($result_target)){
    $target = $row['fund_target'];
  }
}

$auth_id =  $author_user_ids[1];
$fund_targett = $target;


$std->target_fund = $fund_targett;




 
date_default_timezone_get();
$date1 = date('Y/m/d h:i:s', time());

if($target >= $fund_amount){

$sql = "INSERT INTO `temp_back_projects`( `author_id`, `backer_id`, `project_id`, `amount`, `t_pin`, `comment`, `transaction_method`,`notif_date`) VALUES ($auth_id,$user_id,$project_id,$fund_amount,'$t_pin','$comment','$method','$date1')";

$result0 = $db->query($sql);

$generated_temp_id = mysqli_insert_id($db); 
$sql1 = "INSERT INTO `temp_back_projects_status`(`temp_back_id`, `status_msg`) VALUES ($generated_temp_id,0)";

$result1 = $db->query($sql1);

if($result0 && $result1){
//$std->status = "1";
$status_array[] = 1;

}
else{
  //$std->status = "0";
$status_array[] = 0;
}

}
else{
//$std->status = "100";
$status_array[] = 100;
}




$new_std = new stdClass();
$std->stats = $status_array;

echo json_encode($std);



}





 function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}




?>