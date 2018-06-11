<?php  

include "../connection.php";
session_start();
$category_name = $_POST['category_name'];

//echo "<script>alert('$category_name')</script>";

$sql = "INSERT INTO `project_category`(`category_name`) VALUES ('$category_name')";

$res = $db->query($sql);

if($res){
	echo "<script>alert('Sucessfully Added!')</script>";
	header('Location:../admin_controls.php');
}
else{
	echo "<script>alert('Something went wrong!')</script>";
		//header('Location:../admin_controls.php');
}
?>