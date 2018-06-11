<?php


  include 'connection.php';
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$tokens = explode('id=', $url);
$n = $tokens[sizeof($tokens)-1];
//echo "<script>alert('$n');</script>";




 $new_project = str_replace("-", " ", $n);

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
      while($row = mysqli_fetch_array($res1)){
        $bank_acc = $row['bank_acc'];
        $bank_branch = $row['bank_branch_no'];
      }
      while($row = mysqli_fetch_array($res2)){
        $user_phone = $row['user_phone'];
        $user_cnic = $row['user_cnic'];
      }
    }
  //echo "<script>alert('$author_id');</script>";
}






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

if(isset($_POST['submit'])){



 $fund_amount = $_POST['fund_id'];
 $project_id = $new_project;
 $method = $_POST['method_id'];
$comment = $_POST['comment_id'];
$user_id = $_SESSION['user_id'];
$namez = $_SESSION['user_name'];

// $sql1 = "Select * from user_project where project_id='$project_id'";
// $result1 = $db->query($sql1);
//   $author_user_ids[]=array();
//  while($row=mysqli_fetch_array($result1))
//     {
//       $project_title = $row['project_title'];
//       $author_user_ids[]=$row['user_id'];
//     }
$sql_target = "select * from user_project where project_id = $project_id";

$result_target = $db->query($sql_target);
$target=0;
if($result_target){
  while($row = mysqli_fetch_array($result_target)){
    $target = $row['fund_target'];
  }
}

$auth_id =  $author_user_ids[1];

  //echo "<script language='javascript'>alert('$target');</script>";
date_default_timezone_get();
$date1 = date('Y/m/d h:i:s', time());

if($target >= $fund_amount){

$sql = "INSERT INTO `temp_back_projects`( `author_id`, `backer_id`, `project_id`, `amount`, `t_pin`, `comment`, `transaction_method`,`notif_date`) VALUES ($auth_id,$user_id,$project_id,$fund_amount,'$t_pin','$comment','$method','$date1')";

$result0 = $db->query($sql);

$generated_temp_id = mysqli_insert_id($db); 
$sql1 = "INSERT INTO `temp_back_projects_status`(`temp_back_id`, `status_msg`) VALUES ($generated_temp_id,0)";

$result1 = $db->query($sql1);

if($result0 && $result1){
 
echo "<script language='javascript'>alert('success');</script>";
   unset($_POST);
 header('Location:'.$_SERVER['PHP_SELF']);
 header('Location:'.'home.php');
}
else{
echo "<script language='javascript'>alert('Something went wrong');</script>";
}

}
else{
  echo "<script language='javascript'>alert('Funding amount is more than target');</script>";
}








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