<?php

Require '../webservice/connection.php';
class signup_class{

public static function insert($first_name,$last_name,$password,$email){

$sql="INSERT INTO `user_table_reg`(`user_id`, `first_name`, `last_name`, `user_pass`, `user_email`) VALUES ('','$first_name','$last_name','$password','$email')";

 $query = mysqli_query($db, $sql);

if($query){
return true;
}
else{
	return false;
}

}

}
?>