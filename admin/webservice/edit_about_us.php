<?php
include "../connection.php";

session_start();
$edit_text = $_POST['edit_text'];

echo "<script>alert('$edit_text')</script>";

$author_id = $_SESSION['admin_id'];

$sql1 ="select * from about_us where author_id=$author_id";
$res1 = $db->query($sql1);

$cnt = mysqli_num_rows($res1);

date_default_timezone_get();
$datess = date('Y-m-d H:i:s');

if($cnt == 0){


$sql = "INSERT INTO `about_us`( `author_id`, `about_text`,`edit_date`) VALUES ($author_id,'$edit_text','$datess')";

$res = $db->query($sql);

$url = "../about_us.php";
if($res){
	header("Location:".$url);
}



}
else if($cnt > 0){

$sql = "update about_us set about_text='$edit_text',`edit_date`='$datess' where author_id=$author_id";

$res = $db->query($sql);

$url = "../about_us.php";
if($res){
	header("Location:".$url);
}



}



?>