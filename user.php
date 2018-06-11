<?php

include "webservice/user_web.php";
//include("webservice/get_notification.php");

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fundmee</title>
  <link rel="icon" type="image/png" sizes="76x76" href="img/clip.png">
  <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    
      if($notification_sign){ ?>

 <li><a href="notification.php" style="color: #000;"><span style="color: #ff0000;" class="glyphicon glyphicon-bell"></span></a></li>

 <?php } else if(!$notification_sign) { ?> 

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


<?php if($info_available == false) { ?>
<!-- <div class="row" style="background-color: #fff; height: 300px;">
<div class="col-sm-2 col-md-offset-1">

<div style="margin-top: 20px;">
<img src="img/sample_profile.png" style="height: 250px; width: 220px;">
</div>

</div>


<div class="col-sm-5">

<div style="margin-top: 140px;">
<h3 id="title"><b><?php echo $user_name ?></b> <a href="edit_info.php"><i class="material-icons" style="font-size:25px">mode_edit</i></a></h3>
<span id="paragraph">No biography set</span>

<div class="row">
<div class="col-sm-4">
<h5><strong>No company set</strong></h5>
</div>

<div class="col-sm-4">
<h5><strong>Backed <?php echo $row_cnt ?> projects</strong></h5>
</div>



</div>
<!-- Add font awesome icons -->
<!-- <div style="margin-top: 0px;">
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-google"></a>
</div>

</div>

</div>

</div>  -->





  <div class="row" style="margin-top: 47px;">
        <div class = "col-md-4"></div>

        <div class = "col-md-4" style= "text-align:center;">
          <h1><b><?php echo $user_name ?></b></h1>
        <img style = "width:220px; height:220px; border-radius: 50%;" src="img/sample_profile.png">


<!-- <h3 id="title"><b><?php echo $user_name ?></b> <a href="edit_info.php"><i class="material-icons" style="font-size:25px">mode_edit</i></a></h3> -->

        </div>

        <div class = "col-md-4"></div>


      </div>



       <div class="row" style="margin-top: 15px;">
        <div class = "col-md-4"></div>

        <div class = "col-md-4" style= "text-align:center;">
          <span id="paragraph"><?php echo $email ?></span>
      
        </div>

        <div class = "col-md-4"></div>


      </div>

       <div class="row" style="margin-top: 15px;">
        <div class = "col-md-4"></div>

        <div class = "col-md-4" style= "text-align:center;">
          <span id="paragraph">No Biography set</span>
      
        </div>

        <div class = "col-md-4"></div>


      </div>

         <div class="row" style="margin-top: 15px;">
        

        <div class = "col-md-3 col-md-offset-3" style= "text-align:center; padding-left: 110px;">
          <span id="paragraph"><b>No Company set</b></span>
      
        </div>

           <div class = "col-md-2" style= "text-align:center;">
          <span id="paragraph">Backed <b><?php echo $row_cnt ?> Projects</b></span>
      
        </div>

      


      </div>

<?php } else if($info_available == true) { ?>

<!-- <div class="row" style="background-color: #fff; height: 300px;">
<div class="col-sm-2 col-md-offset-1">

<div style="margin-top: 20px;">
<img src="<?php echo $images ?>" style="height: 250px; width: 220px;">
</div>

</div>


<div class="col-sm-5">

<div style="margin-top: 80px;">
<h3 id="title"><b><?php echo $user_name ?></b> </h3>

<span id="paragraph"><?php echo $biography ?></span>

<div class="row">
<div class="col-sm-4">
<h5><strong><?php echo $company ?></strong></h5>
</div>

<div class="col-sm-4">
<h5><strong>Backed <?php echo $row_cnt ?> projects</strong></h5>
</div>



</div>
<!-- Add font awesome icons -->
<!-- <div style="margin-top: 0px;">
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-google"></a>
</div>

</div>

</div>

</div>  -->



  <div class="row" style="margin-top: 47px;">
        <div class = "col-md-4"></div>

        <div class = "col-md-4" style= "text-align:center;">
          <h1><b><?php echo $user_name ?></b></h1>

<?php if($images!=""){ ?>
         <img style = "width:220px; height:220px; border-radius: 50%;" src="<?php echo $images ?>">
<?php } else { ?>
 <img style = "width:220px; height:220px; border-radius: 50%;" src="img/sample_profile.png">

<?php } ?>
        </div>

        <div class = "col-md-4"></div>


      </div>



       <div class="row" style="margin-top: 15px;">
        <div class = "col-md-4"></div>

        <div class = "col-md-4" style= "text-align:center;">
          <span id="paragraph"><?php echo $email ?></span>
      
        </div>

        <div class = "col-md-4"></div>


      </div>

       <div class="row" style="margin-top: 15px;">
        <div class = "col-md-4"></div>

        <div class = "col-md-4" style= "text-align:center;">
          <span id="paragraph"><?php echo $biography ?></span>
      
        </div>

        <div class = "col-md-4"></div>


      </div>

         <div class="row" style="margin-top: 15px;">
        

        <div class = "col-md-1 col-md-offset-4" style= "text-align:center; padding-left: 110px;">
          <span id="paragraph"><b><?php echo $company ?></b></span>
      
        </div>

           <div class = "col-md-3" style= "text-align:center;">
          <span id="paragraph">Backed <b><?php echo $row_cnt ?> Projects</b></span>
      
        </div>

      


      </div>




<?php } ?>








<div class="container">


<div class="row" style="padding-bottom: 50px;">
  <div class="col-sm-12">
    <h3><b><?php echo $user_name ?>'s Projects</b> (<?php echo $row_cnt4 ?>) </h3>

<div class="row">
<?php if($my_projects_available == true){ 


     while($row = mysqli_fetch_array($result5)){
  $project_description1 = $row['project_description'];
$project_id1 = $row['project_id'];
$project_title1 = $row['project_title'];

$user_id1 = $row['user_id'];
$project_location1 = $row['project_location'];
$company1 = $row['company'];
$image1 = $row['image'];
 $project_date1 = $row['project_date'];
$fund_target1 = $row['fund_target'];
// $rating = $row['rating'];
$target_ach1 = $row['amount'];

$project_description1 = substr($project_description1, 0,120);



 $percent1 = ($target_ach1 / $fund_target1);
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
<!-- <div class="row">
<div class="col-sm-12">
<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
<div class="col-sm-3">
<img src="<?php echo $image ?>" style="width: 250px; height: 150px;" />  
</div>

<div class="col-sm-6" style="margin-top: 35px;">
<h3 id="title"><b><a href="single_project.php?id=<?php echo $project_id ?>"><?php echo $project_title ?></a></b> <span style="font-size: 15px;"> -  <?php echo $category_name ?></span></h3> 
<span id="paragraph"><?php echo $project_description ?></span>
</br>
<span id="paragraph"><b>Funded</b>: PKR <?php echo $amount ?></span>
</div>
</div>

</div>
</div> -->

<!-- <div class="col-sm-4" style="margin-bottom: 20px;">


<img src="<?php echo $image1 ?>" style="width:330px; height:200px;">
<a href="single_project.php?id=<?php echo $project_id1 ?>">
<h4  style="text-align: center;
vertical-align: middle; font-size:20px;"><stong><b><?php echo $project_title1 ?></b></stong></h4>
</a>
<span><?php echo $project_description1 ?>... </span>



</div> -->






       <div  class=" padd col-sm-3 " style="margin-top: 20px; margin-bottom: 40px; margin-right: 40px;">
              <a href="single_project.php?id=<?php echo $project_id1 ?>" target="_blank"><img src="<?php echo $image1 ?>" style="height: 180px; width: 245px; margin-top: 25px;"></a>
              <h3><?php echo $project_title1 ?></h3>
              <p>
             <?php echo $project_description1 ?>
              </p>
              <div>
                             <div class = "outerr" id = "outerr" style="height: 20px;">
             

<div class="progress" >
  <div  class="<?php echo $style_color  ?>" role="progressbar" aria-valuenow="<?php echo $percent1 ?>"
  aria-valuemin="0" aria-valuemax="100" style="<?php echo $style2 ?>">
    <?php echo $percent1 ?>%
  </div>
</div>


              </div>
              </div>
              <div class = "info_higlights">
            <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"><?php echo $target_ach1 ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">funded</div>
                </div> 
            <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"> <?php echo $fund_target1 ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">pledged</div>
                </div>
        
          
            </div>
             </div>



<?php } } ?>
</div>


  </div>
</div>










<div class="row" style="padding-bottom: 50px;">
  <div class="col-sm-12">
    <h3><b>Backed Project</b> (<?php echo $row_cnt ?>) </h3>

<div class="row">
<?php if($backed_projects_available == true){ 


 while($row = mysqli_fetch_array($res)){
      $project_id = $row['project_id'];
      $project_title = $row['project_title'];
      $project_description = $row['project_description'];
      $category_name = $row['category_name'];
      $amount = $row['amount'];
        $image = $row['image'];
        $project_description = substr($project_description, 0,125);

        $target_achz = $row['target_ach'];
        $fund_targetz = $row['fund_target'];



         $percent1 = ($target_achz / $fund_targetz);
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
<!-- <div class="row">
<div class="col-sm-12">
<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
<div class="col-sm-3">
<img src="<?php echo $image ?>" style="width: 250px; height: 150px;" />  
</div>

<div class="col-sm-6" style="margin-top: 35px;">
<h3 id="title"><b><a href="single_project.php?id=<?php echo $project_id ?>"><?php echo $project_title ?></a></b> <span style="font-size: 15px;"> -  <?php echo $category_name ?></span></h3> 
<span id="paragraph"><?php echo $project_description ?></span>
</br>
<span id="paragraph"><b>Funded</b>: PKR <?php echo $amount ?></span>
</div>
</div>

</div>
</div> -->

<!-- <div class="col-sm-4" style="margin-bottom: 20px;">


<img src="<?php echo $image ?>" style="width:330px; height:200px;">
<a href="single_project.php?id=<?php echo $project_id ?>">
<h4  style="text-align: center;
vertical-align: middle; font-size:20px;"><stong><b><?php echo $project_title ?></b></stong></h4>
</a>
<span><?php echo $project_description ?>... </span>



</div> -->






       <div  class=" padd col-sm-3 " style="margin-top: 20px; margin-bottom: 40px; margin-right: 40px;">
              <a href="single_project.php?id=<?php echo $project_id ?>" target="_blank"><img src="<?php echo $image ?>" style="height: 180px; width: 245px; margin-top: 25px;"></a>
              <h3><?php echo $project_title ?></h3>
              <p>
             <?php echo $project_description ?>
              </p>
              <div>
                             <div class = "outerr" id = "outerr" style="height: 20px;">
             

<div class="progress" >
  <div  class="<?php echo $style_color  ?>" role="progressbar" aria-valuenow="<?php echo $percent1 ?>"
  aria-valuemin="0" aria-valuemax="100" style="<?php echo $style2 ?>">
    <?php echo $percent1 ?>%
  </div>
</div>


              </div>
              </div>
              <div class = "info_higlights">
            <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"><?php echo $target_achz ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">funded</div>
                </div> 
            <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"> <?php echo $fund_targetz ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">pledged</div>
                </div>
        
          
            </div>
             </div>

<?php } } ?>
</div>


  </div>
</div>












</div> <!--Container -->










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
<footer id="myFooter"  style="background-color: #535353; color: #808080">
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

<footer id="myFooter"  style="background-color: #535353; color: #808080">
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
