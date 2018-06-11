<?php

session_start();


  include '../../connection.php';


$actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  $site_dir = dirname(dirname(dirname($actual_link)));

$picc = $site_dir."/uploads/srk.jpg";

$std = new stdClass();


if($db){
   //echo "<script language='javascript'>alert('succeess');</script>";
}
else{
  // echo "<script language='javascript'>alert('failed');</script>";
}
//$category = $_POST['cat_id'];

$query0 = "select * from project_category";
$result0 = $db->query($query0);
   $cats[]=array();
   $cats_id[]=array();
if($result0){

   while($row=mysqli_fetch_assoc($result0))
    {

$cats[]=$row['category_name'];
$cats_id[]=$row['category_id'];
    }


    $counts1 = mysqli_num_rows($result0);

$std_cats = new stdClass();

$std_cats->categories = $cats;
echo json_encode($std_cats);

}
else{
  //echo "shitt";
}





if(isset($_POST['submit'])){



$title = $_POST['title_id'];
$category = $_POST['cat_id'];
$location = $_POST['loc_id'];
$company = $_POST['company_id'];
$description = $_POST['desc_id'];
$fund = $_POST['fund_id'];
$video = $_POST['video_id'];
$u_id = $_SESSION['user_id'];

$indx = "";

for ($i=1; $i <= $counts1; $i++) { 
  if($category == $cats[$i]){
 
      $indx = $i;
  }
}

$selected_category = $cats_id[$indx];

 //echo "<script language='javascript'>alert('$selected_category');</script>";


date_default_timezone_get();
$datess = date('Y-m-d');





$query0 = "INSERT INTO `user_project`( `category_id`, `user_id`, `project_title`, `project_description`, `project_location`, `company`, `fund_target`, `video`, `project_date`) VALUES ($selected_category,$u_id,'$title','$description','$location','$company',$fund,'$video','$datess')";
$result0 = $db->query($query0);


$generated_proj_id = mysqli_insert_id($db); 

$query1 = "INSERT INTO `project_target_achieved`(`project_id`, `amount`) VALUES ($generated_proj_id,0)";
$result1 = $db->query($query1);



 // echo "<script language='javascript'>alert('$generated_proj_id');</script>";

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
      
         $sql11 = "UPDATE `user_project` SET `image`='$file_url' where project_id=$generated_proj_id";
    
      $result11 = $db->query($sql11);

      if($result11){
                          $std->status = 1;
        //echo "<br> added pic ProjectID($generated_proj_id)";
      }
      else{
 $std->status = 0;
        //echo "not added pic";
      }
    
      }catch(Exception $e){
        $response['error']=true;
        $response['message']=$e->getMessage();
      }   
      //displaying the response 
      //echo json_encode($response);
      
      //closing the connection 
      mysqli_close($con);
    

  
  /*
    We are generating the file name 
    so this method will return a file name for the image to be upload 
  */

    
     //THIS IS UPLOADING PART





 $std->status = 1;




}
else{

 $std->status = 0;
}

 

  }
else{
$std->status = 0;
}

  function getFileName(){
    // $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
    // $sql = "SELECT max(id_guide) as id FROM guide";
    // $result = mysqli_fetch_array(mysqli_query($con,$sql));
    
    // mysqli_close($con);
    //if($result['id']==null)
    //  return 1; 
    //else 
      //return ++$result['id'];

                    $num =  mt_rand(100000,999999); 
                    return "pic".$num;
  }

echo json_encode($std);
   
?>