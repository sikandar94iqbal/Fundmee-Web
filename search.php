<?php
session_start();


// $url = "../kickstarter/";

//     if((isset($_SESSION['user_name'])==false)){
// header('Location:'.$url);
//   }else if((isset($_SESSION['admin_name'])==false)){
// header('Location:'.$url);
//   }
// else if
$is_user = false;
$is_admin = false;
if(isset($_SESSION['user_name'])){
$is_user = true;
}
else if(isset($_SESSION['admin_name'])){
$is_admin = true;
}

if($is_user){
include("webservice/get_notification.php");
//echo "<script>alert(' user ')</script>";
}
else if($is_admin){
//echo "<script>alert(' admin ')</script>";
}

include "webservice/search_web.php";





?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Fundmee</title>
  <link rel="icon" type="image/png" sizes="76x76" href="img/clip.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="assets/css/Footer-with-logo.css">
    <link rel="stylesheet" href="css/style.css">


<link rel="stylesheet" type="text/css" href="css1/Styles.css">
    
    <link rel="stylesheet" type="text/css" href="css1/Nav-color.css">
    
    <link rel="stylesheet" href="ism/css/my-slider.css"/>
    
    <script src="ism/js/ism-2.2.min.js"></script>

</head>
<body>

<nav class="navbar  navbar-default" style="background-color: #FFF;  position: relative;">
  <div class="container-fluid">
 

<?php if($is_user){ ?>

   <div class="navbar-header">
      <a class="navbar-brand" href="home.php" style="color: #000;   position: absolute;
    left: 50%;
    margin-left: -50px !important;  /* 50% of your logo width */
    display: block;"><img src="img/logo.png" style="width: 123px; height: 30px;"></a>
    </div>

    <ul class="nav navbar-nav">
     <li ><a href="home.php" style="color: #000;">Home</a></li>
       <li ><a href="explore.php" style="color: #000;">Explore</a></li>
        <li ><a href="startProject.php" style="color: #000;">Start a project</a></li>
      </ul>

       <ul class="nav navbar-nav navbar-right">

      <li>
<button style="margin-top:3px; background-color: #fff; color: #000; border: none;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></button>

      </li>

    

      <?php 
    
      if($notification_sign == true){ ?>

 <li><a href="notification.php" style="color: #ff0000;"><span style="color: #ff0000;" class="glyphicon glyphicon-bell"></span></a></li>

 <?php } else if($notification_sign == false) { ?> 

 <li><a href="notification.php" style="color: #000;"><span style="color: #000;" class="glyphicon glyphicon-bell"></span></a></li>

 <?php } ?>


  <li><a href="myprofile.php" style="color: #000;"><span style="color: #000;" class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user_name']; ?></a></li>





      <li><a href="webservice/logout.php" style="color: #000;" id="logout_button"><span style="color: #000;" class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>

    <?php } else if($is_admin){ ?>

     <div class="navbar-header">
      <a class="navbar-brand" href="admin/admin_home.php" style="color: #000;   position: absolute;
    left: 50%;
    margin-left: -50px !important;  /* 50% of your logo width */
    display: block;"><img src="img/logo.png" style="width: 123px; height: 30px;"></a>
    </div>


    <ul class="nav navbar-nav">
     <li ><a href="admin/admin_home.php" style="color: #000;">Home</a></li>
      
      
      </ul>

       <ul class="nav navbar-nav navbar-right">

      <li>
<button style="margin-top:3px; background-color: #fff; color: #000; border: none;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></button>

      </li>

    



  <li><a href="admin/admin_controls.php" style="color: #000;"><span style="color: #000;" class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['admin_name']; ?></a></li>





      <li><a href="admin/webservice/admin_logout.php" style="color: #000;" id="logout_button"><span style="color: #000;" class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>



    <?php } ?>



  </div>



</nav>

<style type="text/css">
  #div-with-bg
{
    background: url('back1.png');
   
}
</style>



<div class="container">

<div class="row" style="height: 500px;">
<div class="col-sm-12">

<h3><b>Search Result</b></h3>


<!---->

<div class="row" >
<div class="col-sm-12">


<?php
if($is_by_author){

while($row = mysqli_fetch_array($res)){
$u_id= $row['user_id'];
$name = $row['name'];
$desc = $row['biography'];
$email = $row['email'];
$image=$row['image'];
$company = $row['company'];

$desc = substr($desc, 0,100)


 ?>

<div class="row" style="margin-top: 30px; margin-bottom: 40px;">
  <div class="col-sm-3">

<?php if($image == ""){ ?>

    <img src="img/sample_profile.png"  style="height: 250px; width: 220px;"/>

<?php } else { ?>

 <img src="<?php echo $image ?>"  style="height: 250px; width: 220px;"/>

<?php } ?>

    </div>

    <div class="col-sm-4" style="margin-top: 50px;">

   <a href="user.php?id=<?php echo $u_id ?>"> <h3><?php echo $name ?></h3> </a>
    <span><b><?php echo $company ?></b></span>
    <br>
     <span><b><?php echo $email ?></b></span>
    <br>
    <span><?php echo $desc ?></span>
    </div>

</div>

<?php  } } else if($is_by_project){ 

while($row = mysqli_fetch_array($res)){


$project_title = $row['project_title'];
$project_id= $row['project_id'];
$fund_target = $row['fund_target'];
$project_description = $row['project_description'];

$image=$row['image'];
//$company = $row['company'];

$project_description = substr($project_description, 0,100);



$fund_targets = $row['fund_target'];
$fund_ach = $row['amount'];


    $percent1 = ($fund_ach / $fund_targets);
  $percent1 = $percent1 * 100;
$percent1 = round($percent1);
  //echo "<script>alert($percent)</script>";
 $style2 = "width:".$percent1."%";
  if($percent1 <= 20){
    $style_color = "progress-bar progress-bar-danger";
    
  }
  else if($percent1 >= 20 && $percent1 <= 40){

 $style_color = "progress-bar progress-bar-warning";  
  }
   else if($percent1 >= 40 && $percent1 <= 60){
  $style_color = "progress-bar progress-bar-info";

  }
    else if($percent1 >= 60 && $percent1 <= 80){
     
 $style_color = "progress-bar progress-bar-success";
  }
   else if($percent1 >= 80 && $percent1 <= 100){
     
 $style_color = "progress-bar progress-bar-success";
  }


?>
<!-- 
<div class="row" style="margin-top: 30px; margin-bottom: 40px;">
  <div class="col-sm-3">
    <img src="<?php echo $image ?>"  style="height: 200px; width: 270px;"/>
    </div>

    <div class="col-sm-4" style="margin-top: 50px;">

    <h3><a href="single_project.php?id=<?php echo $project_id ?>"><?php echo $project_title ?></a></h3>
    <span><b></b></span>
    <br>
     <span>fund target : <b><?php echo $fund_target ?></b></span>
    <br>
    <span><?php echo $project_description ?> ... </span>
    </div>

</div> -->





  <div  class=" padd col-sm-3 " style="margin-top: 20px; margin-bottom: 40px; margin-right: 60px;">
              <a href="single_project.php?id=<?php echo $project_id ?>" target="_blank"><img src="<?php echo $image ?>" style="height: 180px; width: 235px; margin-top: 25px;"></a>
              <h3><?php echo $project_title ?></h3>
              <p>
             <?php echo $project_description ?>
              </p>
              <div>
              <div class = "outerr" id = "outerr" style="height: 20px;">
             

<div class="progress">
  <div class="<?php echo $style_color ?>" role="progressbar" aria-valuenow="<?php echo $percent1 ?>"
  aria-valuemin="0" aria-valuemax="100" style="<?php echo $style2 ?>">
    <?php echo $percent1 ?>%
  </div>
</div>


              </div>
              </div>
              <div class = "info_higlights">
          <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"><?php echo $fund_ach ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">funded</div>
                </div>
            <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"> <?php echo $fund_targets ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">pledged</div>
                </div>
        
          
            </div>
             </div>



<?php } } else if($is_by_funders){ 

while($row = mysqli_fetch_array($res)){


$project_title = $row['project_title'];
$user_id = $row['user_id'];
$funded = $row['amount'];

$name = $row['name'];

$image=$row['image'];
$proj_id = $row['project_id'];

 $num_rows = mysqli_num_rows($res);
if($num_rows == 0 ){
  echo "<script>alert('name is empty')</script>";

}


?>


<div class="row" style="margin-top: 30px; margin-bottom: 40px;">
  <div class="col-sm-3">

   <?php if($image == ""){ ?>

    <img src="img/sample_profile.png"  style="height: 250px; width: 220px;"/>

<?php } else { ?>

 <img src="<?php echo $image ?>"  style="height: 250px; width: 220px;"/>

<?php } ?>


    </div>

    <div class="col-sm-3" style="margin-top: 50px;">

   <a href="user.php?id=<?php echo $user_id ?>"> <h3><?php echo $name ?></h3> </a>
    <a href="single_project.php?id=<?php echo $proj_id ?>"><span>project title : <b><?php echo $project_title ?></b></span></a>
    <br>
     <span>funded : <b><?php echo $funded ?></b></span>
    <br>
  
    </div>

</div>


<?php } } else if($is_by_content_creators){ 

while($row = mysqli_fetch_array($res)){


$project_title = $row['project_title'];
$user_id= $row['user_id'];


$name = $row['name'];
$project_id = $row['project_id'];
$project_description = $row['project_description'];

$project_description = substr($project_description, 0,100);

$image=$row['image'];


$fund_targets = $row['fund_target'];
$fund_ach = $row['amount'];


    $percent1 = ($fund_ach / $fund_targets);
  $percent1 = $percent1 * 100;
$percent1 = round($percent1);
  //echo "<script>alert($percent)</script>";
     $style2 = "width:".$percent1."%";
  if($percent1 <= 20){
    $style_color = "progress-bar progress-bar-danger";
    
  }
  else if($percent1 >= 20 && $percent1 <= 40){

 $style_color = "progress-bar progress-bar-warning";  
  }
   else if($percent1 >= 40 && $percent1 <= 60){
  $style_color = "progress-bar progress-bar-info";

  }
    else if($percent1 >= 60 && $percent1 <= 80){
     
 $style_color = "progress-bar progress-bar-success";
  }
   else if($percent1 >= 80 && $percent1 <= 100){
     
 $style_color = "progress-bar progress-bar-success";
  }


?>

<!-- <div class="row" style="margin-top: 30px; margin-bottom: 40px;">
  <div class="col-sm-3">

    <?php if($image == ""){ ?>

    <img src="img/sample_profile.png"  style="height: 250px; width: 220px;"/>

<?php } else { ?>

 <img src="<?php echo $image ?>"  style="height: 250px; width: 220px;"/>

<?php } ?>
    
    </div>

    <div class="col-sm-4" style="margin-top: 50px;">

    <h3><a href="single_project.php?id=<?php echo $project_id ?>"><?php echo $project_title ?></a></h3>
    <a href="user.php?id=<?php echo $user_id ?>"><span>Author : <b><?php echo $name ?></b></span></a>
    <br>
     
    <br>
    <span><?php echo $project_description ?> ... </span>
    </div>

</div> -->



  <div  class=" padd col-sm-3 " style="margin-top: 20px; margin-bottom: 40px; margin-right: 60px;">
              <a href="single_project.php?id=<?php echo $project_id ?>" target="_blank"><img src="<?php echo $image ?>" style="height: 180px; width: 235px; margin-top: 25px;"></a>
              <h3><?php echo $project_title ?></h3>
                <h5>Author : <b><?php echo $name ?></b></h5>
              <p>
             <?php echo $project_description ?>
              </p>
              <div>
              <div class = "outerr" id = "outerr" style="height: 20px;">
             

<div class="progress">
  <div class="<?php echo $style_color ?>" role="progressbar" aria-valuenow="<?php echo $percent1 ?>"
  aria-valuemin="0" aria-valuemax="100" style="<?php echo $style2 ?>">
    <?php echo $percent1 ?>%
  </div>
</div>


              </div>
              </div>
              <div class = "info_higlights">
          <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"><?php echo $fund_ach ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">funded</div>
                </div>
            <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"> <?php echo $fund_targets ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">pledged</div>
                </div>
        
          
            </div>
             </div>




<?php } } else if($is_by_amount && $res){ 


  
while($row = mysqli_fetch_array($res)){


$project_title = $row['project_title'];
$user_id= $row['user_id'];



$project_id = $row['project_id'];
$project_description = $row['project_description'];

$project_description = substr($project_description, 0,100);
$amount = $row['fund_target'];

$image=$row['image'];



$fund_targets = $row['fund_target'];
$fund_ach = $row['amount'];


    $percent1 = ($fund_ach / $fund_targets);
  $percent1 = $percent1 * 100;
$percent1 = round($percent1);
  //echo "<script>alert($percent)</script>";
 $style2 = "width:".$percent1."%";
  if($percent1 <= 20){
    $style_color = "progress-bar progress-bar-danger";
    
  }
  else if($percent1 >= 20 && $percent1 <= 40){

 $style_color = "progress-bar progress-bar-warning";  
  }
   else if($percent1 >= 40 && $percent1 <= 60){
  $style_color = "progress-bar progress-bar-info";

  }
    else if($percent1 >= 60 && $percent1 <= 80){
     
 $style_color = "progress-bar progress-bar-success";
  }
   else if($percent1 >= 80 && $percent1 <= 100){
     
 $style_color = "progress-bar progress-bar-success";
  }






?>



  <div  class=" padd col-sm-3 " style="margin-top: 20px; margin-bottom: 40px; margin-right: 60px;">
              <a href="single_project.php?id=<?php echo $project_id ?>" target="_blank"><img src="<?php echo $image ?>" style="height: 180px; width: 235px; margin-top: 25px;"></a>
              <h3><?php echo $project_title ?></h3>
              <p>
             <?php echo $project_description ?>
              </p>
              <div>
              <div class = "outerr" id = "outerr" style="height: 20px;">
             

<div class="progress">
  <div class="<?php echo $style_color ?>" role="progressbar" aria-valuenow="<?php echo $percent1 ?>"
  aria-valuemin="0" aria-valuemax="100" style="<?php echo $style2 ?>">
    <?php echo $percent1 ?>%
  </div>
</div>


              </div>
              </div>
              <div class = "info_higlights">
          <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"><?php echo $fund_ach ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">funded</div>
                </div>
            <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"> <?php echo $fund_targets ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">pledged</div>
                </div>
        
          
            </div>
             </div>





<?php } } ?>

</div>
</div>

<!---->




</div>
</div>



</div>



<!--puthere-->




<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>SEARCH</b></h4>
      </div>
      <div class="modal-body">
       
       
       <form action="search.php" method="post">
         
        <input type="hidden" name="task" value="search">


  <div class="form-group">
    <label for="email">Search for:</label>
    <input type="text" class="form-control" id="search_item" name="search_item">
  </div>

<div class="form-group">
  <label for="sel1">Search type:</label>
  <select class="form-control" id="search_type" name="search_type">

   <option>By Name</option>
   <option>By Funders</option>
   <option>By Content Creators</option>
   <option>By Project</option>
    <option>By Project Amount (under)</option>


  </select>
</div>




<!-- 
       <input type="submit" value="submit">


       </form> -->




      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

<input class="btn btn-primary" type="submit" value="submit">
       </form>


      </div>
    </div>

  </div>
</div>




<?php if($is_admin){ ?>
<footer id="myFooter"  style="background-color:  #535353; color: #808080">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" >
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="admin/admin_home.php">Home</a></li>
                    
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="admin/about_us.php">About Us</a></li>
                        <li><a href="admin/contact_us.php">Contact us</a></li>
                       
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="admin/faq.php">FAQ</a></li>
                        <li><a href="admin/help.php">Help desk</a></li>
                       
                    </ul>
                </div>
                <div class="col-sm-3 info">
                    <h5>Information</h5>
                    <p> Lorem ipsum dolor amet, consectetur adipiscing elit. Etiam consectetur aliquet aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
                </div>
            </div>
        </div>
        <div class="second-bar" style="background-color: #125B58;">
           <div class="container">
              <h2 class="logo"><a href="admin/admin_home.php"> <img src="img/logo.png" style="width: 123px; height: 30px;"></a></h2>
                <div class="social-icons">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </footer>

<?php } else if($is_user){ ?>

<footer id="myFooter"  style="background-color:  #535353; color: #808080">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" >
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                       
                        <li><a href="startProject.php">Start a Project</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="about_us.php">About Us</a></li>
                        <li><a href="contact_us.php">Contact us</a></li>
                       
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="help.php">Help desk</a></li>
                       
                    </ul>
                </div>
                <div class="col-sm-3 info">
                    <h5>Information</h5>
                    <p> Lorem ipsum dolor amet, consectetur adipiscing elit. Etiam consectetur aliquet aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
                </div>
            </div>
        </div>
        <div class="second-bar" style="background-color: #125B58;">
           <div class="container">
               <h2 class="logo"><a href="home.php"> <img src="img/logo.png" style="width: 123px; height: 30px;"></a></h2>
                <div class="social-icons">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </footer>



<?php } ?>







    
</body>
  <script src="js/home_page.js"></script>
 
</html>
