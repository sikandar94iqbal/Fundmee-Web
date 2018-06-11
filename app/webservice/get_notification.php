<?php

include "../../connection.php";


//READ ME //
//THIS API WILL TELL IF THERE IS A NOTIFICATION FOR THIS USER OR NOT
//NOTIFICATION BUTTON WILL GLOW IF VALUE RETURNED IS TRUE 
//SO DO IT ON ANDROID ACCORDINGLY
//GET USER ID FROM ANDROID//
// ---> $user_id = $_SESSION['user_id'];

//TESTING
$user_id = 101;
//COMMENT ABOVE WHEN DONE
//IF API FAILS TO LOAD DUE TO CONNECTION IT WILL RETURN 0




$sql1 = "select author_id, project_id, temp_back_projects.temp_back_id, status_msg from temp_back_projects INNER join temp_back_projects_status on temp_back_projects.temp_back_id=temp_back_projects_status.temp_back_id where author_id=$user_id";
$result1 = $db->query($sql1);

if($result1){
	

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



$notification_sign = false;
 if($counts_of_zero >= 1){
 $notification_sign =true;
 }
 else{
   $notification_sign =false;
 }

echo json_encode($notification_sign);



}
else{
	echo "0";
}
?>