<?php

session_start();


include '../../connection.php';

$info_available = false;
$backed_projects_available = false;
$rowz_backed_projects = array();
$rowz_myprofile_data = array();


$mobile=false;


  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$tokens = explode('id=', $url);
$n = $tokens[sizeof($tokens)-1];



if($db){



  //READ ME 
  
  $user_id = $n;

  $sql = "Select * from user_registration where user_id = $user_id";
  $result = $db->query($sql);




  
  if($result){
   while($row = mysqli_fetch_assoc($result)){
     $biography = $row['biography'];
     $user_name = $row['name'];
     $company = $row['company'];
     $images = $row['image'];

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

 $sql= "SELECT user_project.image, backed_projects.project_id, amount, user_project.project_title , user_project.project_description, project_category.category_name from backed_projects INNER join user_project on user_project.project_id=backed_projects.project_id INNER join project_category on project_category.category_id=user_project.category_id where backed_projects.backer_id = $user_id";

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