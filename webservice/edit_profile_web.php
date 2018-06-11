<?php


include 'connection.php';
/*include 'image_class.php';
$obj_image = new Image();*/
if(isset($_POST['submit'])){


//getting values
$name = $_POST['name_id'];
$email = $_POST['email_id'];
$company = $_POST['company_id'];
$password = $_POST['password_id'];
$locationz = $_POST['loc_id'];
$biography = $_POST['biography_id'];
$u_id = $_SESSION['user_id'];








// //prevent from nasty javascript 
// $post_title = ($post_title);
// //prevent from nasty sql injections
// $post_title= $db->real_escape_string($post_title);








 $image_name = $_FILES['image']['name'];





if (isset($_POST['name_id']) && !empty($_POST['name_id']) && isset($_POST['email_id']) && !empty($_POST['email_id']) && isset($_POST['password_id']) && !empty($_POST['password_id']) && isset($_POST['company_id']) && !empty($_POST['company_id']) && isset($_POST['loc_id']) && !empty($_POST['loc_id']) && isset($_POST['biography_id']) && !empty($_POST['biography_id'])) {

    //echo "<script language='javascript'>alert('SETT');</script>";


    $image_type = $_FILES['image']['type'];
 $image_size = $_FILES['image']['size'];

$image_tmp_name = $_FILES['image']['tmp_name'];
$flag =FALSE;
$image_path = "uploads/$image_name";
if($image_name==''){
  
}
else{

move_uploaded_file($image_tmp_name, "uploads/$image_name");
$flag=true;

     
}



$sql1 =  "UPDATE `user_registration` SET `name`='$name',`email`='$email',`password`='$password',`company`='$company',`biography`='$biography',`image`='$image_path' WHERE `user_id`=$u_id";
$result0 = $db->query($sql1);

if($result0){
	 $_SESSION['user_name'] = $name;
   echo "<script language='javascript'>alert('Profile updated!');</script>";
   unset($_POST);
//header('Location:'.$_SERVER['PHP_SELF']);

header('Location:add_bank_info.php');
}


//  while($row=mysqli_fetch_array($result0))
//     {
//       $user_ids[]=$row['user_id'];
//     }
// $num_rows = mysqli_num_rows($result0);
 
//         echo "<script language='javascript'>alert('$num_rows');</script>";



//     if( $num_rows == 1){
    

//      $sql1 =  "UPDATE `user_registration` SET `name`='$name',`email`='$email',`password`='$password',`company`='$company',`biography`='$biography',`image`='$image_path' WHERE `user_id`=$u_id";

//      // $sql2 = "UPDATE `user_table_reg` SET `user_pass`='$password' , `user_email`='$email' , `name`='$name' WHERE `user_id`='$u_id'"; 

//      $result1 = $db->query($sql1);
//    //  $result2 = $db->query($sql2);

//      if($result1){

//       $_SESSION['user_name'] = $name;
//         echo "<script language='javascript'>alert('profile updated');</script>";
//      }
//      else{
//         echo "<script language='javascript'>alert('profile not updated!');</script>";
//      }

//     }
//     else if( $num_rows == 0){
    
//     $query1 = "INSERT INTO `user_registration`( `name`, `email`, `password`, `company`, `biography`, `image`) VALUES ('$name','$email','$password','$company','$biography','$image_path')";
     

    

//     $result = $db->query($query1);

//     if($result){
//         $_SESSION['user_name'] = $name;
//        echo "<script language='javascript'>alert('Profile inserted!!');</script>";
//     }
//     else{
//       echo "<script language='javascript'>alert('Failed insertion!');</script>";
//     }

//     }






}
else {
    echo "<script language='javascript'>alert('Form data not complete');</script>";
    $url = "edit_info.php";
     echo "<SCRIPT type='text/javascript'>
        window.location.replace('$url')
    </SCRIPT>";
}






      


}



?>