<?php



  

include("../../connection.php");


//READ ME//
//PUT USER ID HERE COMING FROM ANDROID
 // -----> $u_id = $_POST['user_id'];
//TESTING
$u_id = 101;


$sql1 = "Select * from user_bank where user_id = $u_id";
$sql2 = "Select * from transaction_easypaisa_method where user_id = $u_id";


$result_bank = $db->query($sql1);
$result_easyPaise = $db->query($sql2);

if($result_bank && $result_easyPaise){
 $num_rows1 = mysqli_num_rows($result_bank);
 $num_rows2 = mysqli_num_rows($result_easyPaise);
 
if($num_rows1==0 && $num_rows2==0){
       
       

//READ ME//
  //GET THESE VALUES FROM ANDROID
  //SUCCESS WILL ECHO 1, FAIL WILL ECHO 0 
  //TEST IT WITH DUMMY VALUES

$bank_branch = $_POST['bank_branch_id'];
$bank_acc = $_POST['bank_acc_id'];
$cnic = $_POST['cnic_id'];
$phone = $_POST['phone_id'];

$sql1 = "INSERT INTO `user_bank`(`user_id`, `bank_acc`, `bank_branch_no`) VALUES ($u_id,$bank_acc,$bank_branch)";

$sql2 = "INSERT INTO `transaction_easypaisa_method` (`user_id`, `user_phone`, `user_cnic`) VALUES ($u_id,'$phone','$cnic')";


$result_bank = $db->query($sql1);
$result_easyPaise = $db->query($sql2);

if($result_bank && $result_easyPaise){

  echo "1";
  //echo "<script>alert('Information Updated!')</script>";
}
else{
 // echo "<script>alert('Something went wrong!')</script>";
echo "0";


   }
 

       

    }
    else{



//READ ME//
  //GET THESE VALUES FROM ANDROID
  //SUCCESS WILL ECHO 1, FAIL WILL ECHO 0 
  //TEST IT WITH DUMMY VALUES

$bank_branch = $_POST['bank_branch_id'];
$bank_acc = $_POST['bank_acc_id'];
$cnic = $_POST['cnic_id'];
$phone = $_POST['phone_id'];

//TESTING 
// $bank_branch = 123;
// $bank_acc = 0293847563;
// $cnic = '61101-112393-2919';
// $phone = '03455464646';

//UNCOMMMENT ABOVE WHEN TESTING



$sql1 = "UPDATE `user_bank` SET `user_id`=$u_id,`bank_acc`=$bank_acc,`bank_branch_no`=$bank_branch WHERE `user_id` = $u_id";

$sql2 = "UPDATE `transaction_easypaisa_method` SET `user_id`=$u_id,`user_phone`='$phone',`user_cnic`= '$cnic' WHERE `user_id`=$u_id";


$result_bank = $db->query($sql1);
$result_easyPaise = $db->query($sql2);

if($result_bank && $result_easyPaise){

//      unset($_POST);
// header('Location:'.$_SERVER['PHP_SELF']);
echo "1";
// header('Location:myprofile.php');
//   echo "<script>alert('Information Updated!')</script>";
}
else{
  echo "0";
   }
 

      //echo "<script>alert('Not Empty!')</script>";
    }
}


?>