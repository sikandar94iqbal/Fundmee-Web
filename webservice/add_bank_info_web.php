<?php



  

include("connection.php");

$u_id = $_SESSION['user_id'];

$sql1 = "Select * from user_bank where user_id = $u_id";
$sql2 = "Select * from transaction_easypaisa_method where user_id = $u_id";


$result_bank = $db->query($sql1);
$result_easyPaise = $db->query($sql2);

if($result_bank && $result_easyPaise){
 $num_rows1 = mysqli_num_rows($result_bank);
 $num_rows2 = mysqli_num_rows($result_easyPaise);
 
    if($num_rows1==0 && $num_rows2==0){
       //echo "<script>alert('Empty!')</script>";
       

if(isset($_POST['submit'])){

$bank_branch = $_POST['bank_branch_id'];
$bank_acc = $_POST['bank_acc_id'];
$cnic = $_POST['cnic_id'];
$phone = $_POST['phone_id'];



if (isset($_POST['bank_branch_id']) && !empty($_POST['bank_branch_id']) && isset($_POST['bank_acc_id']) && !empty($_POST['bank_acc_id']) && isset($_POST['cnic_id']) && !empty($_POST['cnic_id']) && isset($_POST['phone_id']) && !empty($_POST['phone_id'])) {

    //echo "<script language='javascript'>alert('SETT');</script>";

}
else {
    echo "<script language='javascript'>alert('Form data not complete');</script>";
    $url = "add_bank_info.php";
     echo "<SCRIPT type='text/javascript'>
        window.location.replace('$url')
    </SCRIPT>";
}



$sql1 = "INSERT INTO `user_bank`(`user_id`, `bank_acc`, `bank_branch_no`) VALUES ($u_id,$bank_acc,$bank_branch)";

$sql2 = "INSERT INTO `transaction_easypaisa_method` (`user_id`, `user_phone`, `user_cnic`) VALUES ($u_id,'$phone','$cnic')";


$result_bank = $db->query($sql1);
$result_easyPaise = $db->query($sql2);

if($result_bank && $result_easyPaise){

     unset($_POST);
header('Location:'.$_SERVER['PHP_SELF']);

header('Location:myprofile.php');
  //echo "<script>alert('Information Updated!')</script>";
}
else{
 // echo "<script>alert('Something went wrong!')</script>";



   }
 }

       

    }
    else{


if(isset($_POST['submit'])){

$bank_branch = $_POST['bank_branch_id'];
$bank_acc = $_POST['bank_acc_id'];
$cnic = $_POST['cnic_id'];
$phone = $_POST['phone_id'];


if (isset($_POST['bank_branch_id']) && !empty($_POST['bank_branch_id']) && isset($_POST['bank_acc_id']) && !empty($_POST['bank_acc_id']) && isset($_POST['cnic_id']) && !empty($_POST['cnic_id']) && isset($_POST['phone_id']) && !empty($_POST['phone_id'])) {

    //echo "<script language='javascript'>alert('SETT');</script>";

}
else 
{
    echo "<script language='javascript'>alert('Form data not complete');</script>";
    $url = "add_bank_info.php";
     echo "<SCRIPT type='text/javascript'>
        window.location.replace('$url')
    </SCRIPT>";
}




$sql1 = "UPDATE `user_bank` SET `user_id`=$u_id,`bank_acc`=$bank_acc,`bank_branch_no`=$bank_branch WHERE `user_id` = $u_id";

$sql2 = "UPDATE `transaction_easypaisa_method` SET `user_id`=$u_id,`user_phone`='$phone',`user_cnic`= '$cnic' WHERE `user_id`=$u_id";


$result_bank = $db->query($sql1);
$result_easyPaise = $db->query($sql2);

if($result_bank && $result_easyPaise){

     unset($_POST);
header('Location:'.$_SERVER['PHP_SELF']);

header('Location:myprofile.php');
  echo "<script>alert('Information Updated!')</script>";
}
else{
  echo "<script>alert('Something went wrong!')</script>";
   }
 }

      //echo "<script>alert('Not Empty!')</script>";
    }
}


?>