<?php

// session_start();

//     if(isset($_SESSION['user_name'])==false){
// header('Location:login.php');
//   }
include 'connection.php';
$info_available = false;
$backed_projects_available = false;
$my_projects_available = false;
$rowz_backed_projects = array();
$rowz_myprofile_data = array();
$row_cnt4 = 0;


$mobile=false;


// $user_name = "";
// $user_email = "";
// $biography = "";
// $company = "" ;

if($db){
  $user_id = $_SESSION['user_id'];
  //echo "<script language='javascript'>alert('succeess');</script>";
  $sql = "Select * from user_registration where user_id = $user_id";
  $result = $db->query($sql);




  
  if($result){
   while($row = mysqli_fetch_assoc($result)){
     $biography = $row['biography'];
     $user_name = $row['name'];
     $company = $row['company'];
     $images = $row['image'];
     $email = $row['email'];

     $rowz_myprofile_data[] = $row;
 
   }
   if($biography == ""){
    $info_available = false;
    //  echo "<script language='javascript'>alert('NO INFO');</script>";
   }
   else if($biography != ""){
    $info_available = true;
    
  


    //   echo "<script language='javascript'>alert('INFO found');</script>";
   }
  }
  else{
       echo "<script language='javascript'>alert('failed to retrieve Information');</script>";
  }

  //get backed projects count
  $sql1 = "Select * from backed_projects where backer_id = $user_id";
  $result1 = $db->query($sql1);

  $row_cnt = $result1->num_rows;

  if($row_cnt > 0){
     $backed_projects_available = true;


     while($row = mysqli_fetch_array($result1)){
      $project_id = $row['project_id'];
      $author_id = $row['author_id'];
      $backer_id = $row['backer_id'];
      $amount = $row['amount'];
     }






 $sql= "SELECT project_target_achieved.amount as target_ach,user_project.fund_target, user_project.image, backed_projects.project_id, backed_projects.amount, user_project.project_title , user_project.project_description, project_category.category_name from backed_projects INNER join user_project on user_project.project_id=backed_projects.project_id INNER join project_category on project_category.category_id=user_project.category_id INNER join project_target_achieved on project_target_achieved.project_id=backed_projects.project_id where backed_projects.backer_id = $user_id";

     $res = $db->query($sql);

if($mobile){
while($row = mysqli_fetch_assoc($res)){
  $rowz_backed_projects[] = $row; 
  // $rowz_myprofile_data['BackedProjects'] = $rowz_backed_projects;
}
}


  }
  else if($row_cnt == 0){
     $backed_projects_available = false;
  }


  //get my projects count
  $sql4 = "SELECT user_project.project_id, `category_id`, `user_id`, `project_title`, `project_description`, `project_location`, `company`, `fund_target`, `video`, `image`, `project_date`, project_target_achieved.amount from user_project INNER join project_target_achieved on user_project.project_id= project_target_achieved.project_id where user_project.user_id=$user_id";
  $result4 = $db->query($sql4);

  $row_cnt4 = $result4->num_rows;

  if($row_cnt4 > 0){
     $my_projects_available = true;



      //get my projects count
  $sql5 = "SELECT user_project.project_id, `category_id`, `user_id`, `project_title`, `project_description`, `project_location`, `company`, `fund_target`, `video`, `image`, `project_date`, project_target_achieved.amount from user_project INNER join project_target_achieved on user_project.project_id= project_target_achieved.project_id where user_project.user_id=$user_id";
  $result5 = $db->query($sql5);

}
else{
$my_projects_available = false;
}




}
else{
   echo "<script language='javascript'>alert('failed to connect to DB');</script>";
}

if($mobile){


$std = new stdClass();

$std->profile = $rowz_myprofile_data;
$std->backedProjects = $rowz_backed_projects;


echo json_encode($std);
// $rowz_myprofile_data['BackedProjects'] = array($rowz_backed_projects);
//   $obj['profile']=array( $rowz_myprofile_data );
// echo json_encode($rowz_myprofile_data);
// $rowz_myprofile_data['profile'] = $rowz_myprofile_data;
// echo json_encode($rowz_myprofile_data['profile']);
// $rowz_myprofile_data['BackeProjects'] = array($rowz_backed_projects);

// $array1 = array_values($rowz_myprofile_data);
// echo json_encode($array1);

// echo "<h1><b>this is my profile data</b></h1>";
// $rowz_myprofile_data = array_values($rowz_myprofile_data);
// echo json_encode($rowz_myprofile_data);
// echo "<h1><b>this is backed projects data</b></h1>";
// $rowz_backed_projects = array_values($rowz_backed_projects);
// echo json_encode($rowz_backed_projects);
}
?>