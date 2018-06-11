<?php  

include "../connection.php";
session_start();
$email = $_POST['email'];

//echo "<script>alert('$project_name')</script>";

$sql = "select user_id from user_registration where email = '$email'";

$res = $db->query($sql);



if($res){


	while($row = mysqli_fetch_array($res)){
		$user_id = $row['user_id'];
	}

//echo "<script>alert($user_id)</script>";
    $query2 = "DELETE FROM user_registration WHERE user_id=$user_id";
  mysqli_query($db,$query2);

  $tables = array("temp_back_projects");
foreach($tables as $table) {
  $query = "DELETE FROM $table WHERE backer_id=$user_id";
  mysqli_query($db,$query);
    $query1 = "DELETE FROM $table WHERE author_id=$user_id";
  mysqli_query($db,$query1);
}

	echo "<script>alert('User Deleted!')</script>";
	header('Location:../admin_controls.php');

}
else{
	echo "<script>alert('Something went wrong!')</script>";
		//header('Location:../admin_controls.php');
}
?>