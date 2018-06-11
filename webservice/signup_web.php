<?php



include 'connection.php';





if($db){



$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql="INSERT INTO `user_registration`( `name`, `email`, `password`, `company`, `biography`, `image`) VALUES ('$name','$email','$password','','','')";

 $query = $db->query($sql);

if($query){
// unset($_POST);


echo "1";


}
else{
	echo "0";
}





}




?>
