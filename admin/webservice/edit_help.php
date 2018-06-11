<?php
include "../connection.php";

session_start();
$edit_text = $_POST['edit_text'];

//echo "<script>alert('$edit_text')</script>";

$author_id = $_SESSION['admin_id'];

$sql1 ="select * from help where author_id=$author_id";
$res1 = $db->query($sql1);

$cnt = mysqli_num_rows($res1);


date_default_timezone_get();
$datess = date('Y-m-d H:i:s');

if($cnt == 0){


$sql = "INSERT INTO `help`( `author_id`, `help_text`,`edit_date`) VALUES ($author_id,'$edit_text','$datess')";

$res = $db->query($sql);

$url = "../help.php";
if($res){
	header("Location:".$url);
}


echo "fuc2";
}
else if($cnt > 0){
	
$sql = "update help set help_text='$edit_text', `edit_date` = '$datess'  where author_id=$author_id";

$res = $db->query($sql);

$url = "../help.php";
if($res){
	header("Location:".$url);
}



}



?>