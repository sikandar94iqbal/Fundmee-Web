<?php  

include "../connection.php";
session_start();
$project_name = $_POST['project_name'];

//echo "<script>alert('$project_name')</script>";

$sql = "select project_id from user_project where project_title = '$project_name'";

$res = $db->query($sql);



if($res){
	while($row = mysqli_fetch_array($res)){
		$project_id = $row['project_id'];
	}
	//echo "<script>alert('$project_id')</script>";
	//header('Location:../admin_controls.php');
    
  $tables = array("project_target_achieved","user_project","temp_back_projects","temp_back_projects_status","backed_projects");
foreach($tables as $table) {
  $query = "DELETE FROM $table WHERE project_id=$project_id";
  mysqli_query($db,$query);
}

	echo "<script>alert('Project Deleted!')</script>";
	header('Location:../admin_controls.php');

}
else{
	echo "<script>alert('Something went wrong!')</script>";
		//header('Location:../admin_controls.php');
}
?>