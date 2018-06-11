<?php 
include "connection.php";

if($db){
	//echo "success";
}
else{
//	echo "failed";
}

$task = $_POST['task'];
$email = $_POST['email'];
$password = $_POST['password'];

$name_array[] = array();
$user_id_array[] = array();
$user_email_array[] = array();


$user_names = "";
$user_ids = "";
$user_emails = "";

if(isset($task)){
	$sql = "SELECT * FROM `user_registration` WHERE email='".$email."' and password='".$password."'";



	$result = $db->query($sql);
	while($row = mysqli_fetch_array($result)){
			$name_array[] = $row['name'];
			$user_id_array[] = $row['user_id'];
			$user_email_array[] = $row['email'];

			$user_ids = $row['user_id'];
			$user_names = $row['name'];
			$user_emails = $row['email'];


		}


	if($result){
		$row_cnt = $result->num_rows;

		
		
		if($row_cnt == 1){

session_start();

$_SESSION["user_id"] = $user_ids;
$_SESSION["user_name"] = $user_names;
$_SESSION["user_email"] = $user_emails;

           echo "1";
		}
		else if($row_cnt == 0){
			echo "0";
		}

	}
	else{
		echo "failed";
	}
}


?>