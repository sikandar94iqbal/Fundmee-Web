<?php



include '../../connection.php';





if($db){

//READ ME
	//PUT VALUES BELOW 
	//API GIVES 1 on SUCCESS AND 0 ON FAIL

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


// $name = "Malik jee";
// $email = "gadag";
// $password = "123";

if($name!="" && $email!="" && $password!=""){


$sql="INSERT INTO `user_registration`( `name`, `email`, `password`, `company`, `biography`, `image`) VALUES ('$name','$email','$password','','','')";

 $query = $db->query($sql);

if($query){
// unset($_POST);


echo "1";


}
else{
	echo "0";
}


}else{
	echo "Strings empty";
}


}




?>
