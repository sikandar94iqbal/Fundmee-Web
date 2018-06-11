<?php


include '../../connection.php';
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$tokens = explode('id=', $url);
$n = $tokens[sizeof($tokens)-1];



//READ ME
//get category id from android
// for testing

//$new_category = 1;

//POST CATEGORY_ID
$new_category = $_POST['category_id'];


 $query0 = "SELECT * FROM `user_project` WHERE category_id=$new_category";
$result0 = $db->query($query0);
$array_data = array();
if($result0){
while($row = mysqli_fetch_assoc($result0)){
$array_data[] = $row;
}

}

$obj = new stdClass();
$obj->ind_category = $array_data;

echo json_encode($obj);

 //echo "<script language='javascript'>alert('$new_category');</script>";


?>