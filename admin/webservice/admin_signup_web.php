<?php



include '../connection.php';





if(isset($_POST['task'])){


$name = $_POST['name1'];
$email = $_POST['email1'];
$password = $_POST['password1'];

$sql="INSERT INTO `admin`( `name`, `email`, `password`) VALUES ('$name','$email','$password')";

$query = $db->query($sql);

 $message = 'User Already Exists';

if($query){
 unset($_POST);
 header('Location:'.'../admin_controls.php');


}
else{
		echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace('../admin_controls.php')
    </SCRIPT>";
}






}



?>
