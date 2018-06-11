<?php


include("../../connection.php");
/*include 'image_class.php';
$obj_image = new Image();*/


$std = new stdClass();

if(isset($_POST['submit'])){


//getting values
$name = $_POST['name_id'];
$email = $_POST['email_id'];
$company = $_POST['company_id'];
$password = $_POST['password_id'];
$locationz = $_POST['loc_id'];
$biography = $_POST['biography_id'];
$u_id = $_POST['user_id'];














// $sql1 =  "UPDATE `user_registration` SET `name`='$name',`email`='$email',`password`='$password',`company`='$company',`biography`='$biography',`image`='$image_path' WHERE `user_id`=$u_id";

$sql1 =  "UPDATE `user_registration` SET `name`='$name',`email`='$email',`password`='$password',`company`='$company',`biography`='$biography' WHERE `user_id`=$u_id";

$result0 = $db->query($sql1);

if($result0){





 //THIS IS UPLOADING PART!! 


  // define('HOST','23.91.70.126');
  // define('USER','lavazmaa_sikanda');
  // define('PASS','rockstar007');
  // define('DB','lavazmaa_fundmee');
  
  //this is our upload folder 
  $upload_path = '../../uploads/';
  
  //Getting the server ip 
  $server_ip = gethostbyname(gethostname());
  
  //creating the upload url 
  $upload_url = 'lavazmaat.com/uploads/'; 
  
  //response array 
  $response = array(); 
  
  
  
    
    //checking the required parameters from the request 
    
      
      //connecting to the database 
      //$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
      
      //getting name from the request 
      ///$name = $_POST['name'];
      
      //getting file info from the request 
      $fileinfo = pathinfo($_FILES['image']['name']);
      
      //getting the file extension 
      $extension = $fileinfo['extension'];
      
                        


                        $file_name_from = getFileName();


      //file url to store in the database 
      $file_url = $upload_url . $file_name_from . '.' . $extension;
      
      //file path to upload in the server 
      $file_path = $upload_path . $file_name_from . '.'. $extension; 
      
      //trying to save the file in the directory 
      try{
        //saving the file 
        move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
                //echo $file_url;
      
         $sql11 = "UPDATE `user_registration` SET `image`='$file_url' where user_id=$u_id";
    
      $result11 = $db->query($sql11);

      if($result11){
        //$std->pic_status = 1;
        //echo "<br> added pic ProjectID($u_id)";
      }
      else{
         //$std->pic_status = 0;
        //echo "not added pic";
      }
    
      }catch(Exception $e){
        $response['error']=true;
        $response['message']=$e->getMessage();
      }   
      //displaying the response 
      //echo json_encode($response);
      
      //closing the connection 
      //mysqli_close($con);
    




$std->status = 1;

}
else{
   $std->status = 0;
}


//  while($row=mysqli_fetch_array($result0))
//     {
//       $user_ids[]=$row['user_id'];
//     }
// $num_rows = mysqli_num_rows($result0);
//  $_SESSION['user_name'] = $name;











      


}

  function getFileName(){
                    $num =  mt_rand(100000,999999); 
                    return "pic".$num;
  }


echo json_encode($std);
?>