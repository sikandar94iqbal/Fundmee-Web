<?php


  include 'connection.php';

$actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  $site_dir = dirname(dirname(dirname($actual_link)));

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

   while($row=mysqli_fetch_array($result0))
    {

$cats[]=$row['category_name'];
$cats_id[]=$row['category_id'];
    }


    $counts1 = mysqli_num_rows($result0);

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

    $var = trim($title);
    





//  echo "<SCRIPT type='text/javascript'>
//        if(document.getElementById('exampleTextarea').value != '') {
//    // you have a file
// }else{
//   alert('nopictureselected');
// }
//     </SCRIPT>";

$indx = "";

for ($i=1; $i <= $counts1; $i++) { 
  if($category == $cats[$i]){
 
      $indx = $i;
  }
}

$selected_category = $cats_id[$indx];

 //echo "<script language='javascript'>alert('$selected_category');</script>";

 $image_name = $_FILES['image']['name'];



if (isset($_POST['title_id']) && !empty($_POST['title_id']) && isset($_POST['cat_id']) && !empty($_POST['cat_id']) && isset($_POST['loc_id']) && !empty($_POST['loc_id']) && isset($_POST['company_id']) && !empty($_POST['company_id']) && isset($_POST['desc_id']) && !empty($_POST['desc_id']) && isset($_POST['fund_id']) && !empty($_POST['fund_id']) && isset($_POST['video_id']) && !empty($_POST['video_id']) && isset($image_name) && !empty($image_name)) {



$image_type = $_FILES['image']['type'];
 $image_size = $_FILES['image']['size'];

$image_tmp_name = $_FILES['image']['tmp_name'];
$flag =FALSE;
$image_path = $site_dir."/uploads/$image_name";
if($image_name==''){
  
}
else{

move_uploaded_file($image_tmp_name, "uploads/$image_name");
$flag=true;

     
}


date_default_timezone_get();
$datess = date('Y-m-d');





$query0 = "INSERT INTO `user_project`( `category_id`, `user_id`, `project_title`, `project_description`, `project_location`, `company`, `fund_target`, `video`, `image`, `project_date`) VALUES ($selected_category,$u_id,'$title','$description','$location','$company',$fund,'$video','$image_path','$datess')";
$result0 = $db->query($query0);


$generated_proj_id = mysqli_insert_id($db); 

$query1 = "INSERT INTO `project_target_achieved`(`project_id`, `amount`) VALUES ($generated_proj_id,0)";
$result1 = $db->query($query1);




 // echo "<script language='javascript'>alert('$generated_proj_id');</script>";

if($result0){
     unset($_POST);

     $url = "single_project.php?id=".$generated_proj_id;

 echo "<SCRIPT type='text/javascript'>
        window.location.replace('$url')
    </SCRIPT>";

//header('Location:'.$url);


 // echo "<script language='javascript'>alert('succeess');</script>";
}
else{
  echo "<script language='javascript'>alert('failed');</script>";
}


    

}
else {
    echo "<script language='javascript'>alert('Form data not complete');</script>";
    $url = "startProject.php";
     echo "<SCRIPT type='text/javascript'>
        window.location.replace('$url')
    </SCRIPT>";
}







 

  }



   
?>