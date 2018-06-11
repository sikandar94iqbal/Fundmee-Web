<?php

include "connection.php";

$user_id = $_SESSION['user_id'];

$sql1 = "select author_id, project_id, temp_back_projects.temp_back_id, status_msg from temp_back_projects INNER join temp_back_projects_status on temp_back_projects.temp_back_id=temp_back_projects_status.temp_back_id where author_id=$user_id";
$result1 = $db->query($sql1);

if($result1){
	///echo "theek ha";

	$status_array = array();
while($row = mysqli_fetch_array($result1)){
$status_array[] = $row["status_msg"];
}

$counts = count($status_array);

$counts_of_zero=0;
for ($i=0; $i < $counts; $i++) { 
  if($status_array[$i] == 0){
   $counts_of_zero++;

  }
 } 

  //  echo "<script>alert('COUNT : $counts_of_zero ')</script>";

$notification_sign = false;
 if($counts_of_zero >= 1){
 $notification_sign =true;
 }
 else{
   $notification_sign =false;
 }





}
else{
	echo "failed";
}
?>