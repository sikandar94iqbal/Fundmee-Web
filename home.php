<?php

session_start();

$url = "../fundme/";

    if(isset($_SESSION['user_name'])==false){
header('Location:'.$url);
  }


include("webservice/home_page_php.php");
include("webservice/get_notification.php");






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










<style type="text/css">
  .navbar {
    position: relative;
}
.brand {
    position: absolute;
    left: 50%;
    margin-left: -50px !important;  /* 50% of your logo width */
    display: block;
}
</style>

<nav class="navbar  navbar-default" style="background-color: #FFF;  position: relative;">
  <div class="container-fluid">
    <div class="navbar-header" >
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

       <!-- 
      <li><a href="#" style="color: #fff;"><span style="color: #fff;" class="glyphicon glyphicon-search"></span> Search</a></li> -->


      <li>
<button style="margin-top:3px; background-color: #fff; color: #000; border: none;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></button>

      </li>

    

      <?php if($notification_sign){ ?>

 <li><a href="notification.php" style="color: #000;"><span style="color: #ff0000;" class="glyphicon glyphicon-bell"></span></a></li>

 <?php } else { ?> 

 <li><a href="notification.php" style="color: #000;"><span style="color: #000;" class="glyphicon glyphicon-bell"></span></a></li>

 <?php } ?>

  <li><a href="myprofile.php" style="color: #000;"><span style="color: #000;" class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user_name']; ?></a></li>

      <li><a href="webservice/logout.php" style="color: #000;" id="logout_button"><span style="color: #000;" class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>

  </div>





</nav>




<div class="container">

<style type="text/css">
  .full-width-div {
    
    width: 100%;
    left: 0;
}
</style>

<div class="ism-slider full-width-div" data-play_type="loop" data-radios="false" id="my-slider">


      <ol>

<?php 

while($row = mysqli_fetch_array($res1)){

  $img = $row['image'];
//  echo "<script>alert('$img')</script>";
?>

        <li>
          <a href="<?php echo $img ?>" target="_blank"><img src="<?php echo $img ?>"></a>
        </li>

<?php } ?>

      </ol>


    </div>




<div class="row" style="margin-top: 50px;">
        <h1>Projects We love</h1>



<?php while($row = mysqli_fetch_array($res_most_fund)){

$proj_id = $row['project_id'];
$fund_ach = $row['amount'];
$proj_title = $row['project_title'];
$proj_desc = $row['project_description'];
$imgs = $row['image'];
$fund_targets = $row['fund_target'];
$category = $row['category_name'];


$proj_desc = substr($proj_desc, 0,260);

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



}

 ?>

        <div class="col-md-5">
                
          <a href="single_project.php?id=<?php echo $proj_id ?>" target="_blank"><img src="<?php echo $imgs ?>" style="height: 280px; width: 400px;"></a>
        </div>
        <div class="col-md-5">
                
          <h2><?php echo $proj_title ?></h2>
          <p><?php echo $proj_desc ?>..</p>
          
          <br>
          
          <div>

                          <div class = "outerr" id = "outerr" style="height: 20px;">
             

<div class="progress" >
  <div  class="<?php echo $style_color ?>" role="progressbar" aria-valuenow="<?php echo $percent1 ?>"
  aria-valuemin="0" aria-valuemax="100" style="<?php echo $style2 ?>">
    <?php echo $percent1 ?>%
  </div>
</div>


              </div>

          </div>
          
          <div class = "info_higlights">
          
            <div class = "description_highlight">
                <div class = "uper"><?php echo $fund_ach ?></div>
                  
                <div class = "lower">funded</div>
            </div>
            
            <div class = "description_highlight">
                <div class = "uper"><?php echo $fund_targets ?></div>
                  
                <div class = "lower">pledged</div>
            </div>
            
       
            
            <div class = "description_highlight">
                <div class = "uper"><?php echo $category ?></div>
                  
                <div class = "lower">Category</div>
            </div>
            
          </div>
        </div>
        
        <div class="col-md-2" id = "left_line">
                
          <ul class = "ulst">
             <?php while($row = mysqli_fetch_array($res_cat)){ ?>

              <li>
                <a href="ind_category.php?id=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a>
              </li>

              <?php } ?>

          </ul>
          
        </div>
      </div>
      












<!-- <div class="row" id="div-with-bg" style=" height: 500px; width: 100%;  opacity: 0.8;">
  <div class="col-sm-5 col-md-offset-5">
    <a href="startProject.php"><BUTTON class="btn"  style="opacity:1;margin-top: 240px; height: 40px; width: 250px; background-color: #0269C2; color: #fff; font-size: 20px;"><strong>START A PROJECT</strong></BUTTON>
</a>
  </div>
</div> -->


<!-- <div class="row">
<div class="col-sm-12">
<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
<div class="col-sm-3">
<img src="uploads/logo.png" style="width: 250px; height: 150px;" />  
</div>

<div class="col-sm-6" style="margin-top: 35px;">
<h3 id="title"><b><a href="single_project.php">BU student portal</a></b> <span style="font-size: 15px;"> -  Coding</span></h3> 
<span id="paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
</br>
<span id="paragraph"><b>By</b>: Sikandar Iqbal</span>
</div>
</div>

</div>
</div> -->


<div style="margin-top: 60px;">
<h3><a href="recent_project.php"><b>Recent Projects</b></a></h3>
</div>



<!---->

   


<div class="row" style="margin-bottom: 30px;">

<?php 

while($row = mysqli_fetch_array($result)):

  $image = $row['image'];
  $description = $row['project_description'];
  $title = $row['project_title'];
  $short_desc = substr($description,0,140);
  $project_id = $row['project_id'];
  $fund_target = $row['fund_target'];
  $amount = $row['amount'];



    $percent = ($amount / $fund_target);
  $percent = $percent * 100;
$percent = round($percent);
  //echo "<script>alert($percent)</script>";



 $style2 = "width:".$percent."%";

  if($percent <= 20){
    $style_color = "progress-bar progress-bar-danger";
    
  }
  else if($percent >= 20 && $percent <= 40){

 $style_color = "progress-bar progress-bar-warning";  
  }
   else if($percent >= 40 && $percent <= 60){
  $style_color = "progress-bar progress-bar-info";

  }
    else if($percent >= 60 && $percent <= 80){
     
 $style_color = "progress-bar progress-bar-success";
  }
   else if($percent >= 80 && $percent <= 100){
     
 $style_color = "progress-bar progress-bar-success";
  }

?>

  <div  class=" padd col-sm-3 " style="margin-top: 20px; margin-bottom: 40px; margin-right: 40px;">
              <a href="single_project.php?id=<?php echo $project_id ?>" target="_blank"><img src="<?php echo $image ?>" style="height: 180px; width: 255px; margin-top: 25px;"></a>
              <h3><?php echo $title ?></h3>
              <p>
             <?php echo $short_desc ?>
              </p>
              <div>
                 <div class = "outerr" id = "outerr" style="height: 20px;">
             

<div class="progress">
  <div class="<?php echo $style_color ?>" role="progressbar" aria-valuenow="<?php echo $percent ?>"
  aria-valuemin="0" aria-valuemax="100" style="<?php echo $style2 ?>">
    <?php echo $percent ?>%
  </div>
</div>


              </div>
              </div>
              <div class = "info_higlights">
          <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"><?php echo $amount ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">funded</div>
                </div>
            <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"> <?php echo $fund_target ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">pledged</div>
                </div>
        
          
            </div>
             </div>


<?php endWhile ?>






</div>

<div class="row">

<h3><a href="popular_projects.php"><b>Whats Popular</b></a></h3>


<?php 

while($row = mysqli_fetch_array($result2)):

  $image = $row['image'];
  $description = $row['project_description'];
  $title = $row['project_title'];
  $short_desc = substr($description,0,140);
  $project_id = $row['project_id'];
  $fund_target = $row['fund_target'];
  $amount = $row['amount'];

  $percent = ($amount / $fund_target);
  $percent = $percent * 100;
$percent = round($percent);
  //echo "<script>alert($percent)</script>";



  //here
 $style2 = "width:".$percent."%";
      if($percent <= 20){
    $style_color = "progress-bar progress-bar-danger";
    
  }
  else if($percent >= 20 && $percent <= 40){

 $style_color = "progress-bar progress-bar-warning";  
  }
   else if($percent >= 40 && $percent <= 60){
  $style_color = "progress-bar progress-bar-info";

  }
    else if($percent >= 60 && $percent <= 80){
     
 $style_color = "progress-bar progress-bar-success";
  }
   else if($percent >= 80 && $percent <= 100){
     
 $style_color = "progress-bar progress-bar-success";
  }


?>

  <div  class=" padd col-sm-3 " style="margin-top: 20px; margin-bottom: 40px; margin-right: 40px;">
              <a href="single_project.php?id=<?php echo $project_id ?>" target="_blank"><img src="<?php echo $image ?>" style="height: 180px; width: 255px; margin-top: 25px;"></a>
              <h3><?php echo $title ?></h3>
              <p>
             <?php echo $short_desc ?>
              </p>
              <div>
              <div class = "outerr" id = "outerr" style="height: 20px;">
             

<div class="progress">
  <div class="<?php echo $style_color ?>" role="progressbar" aria-valuenow="<?php echo $percent ?>"
  aria-valuemin="0" aria-valuemax="100" style="<?php echo $style2 ?>">
    <?php echo $percent ?>%
  </div>
</div>


              </div>
              </div>
              <div class = "info_higlights">
          <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"><?php echo $amount ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">funded</div>
                </div>
            <div class = "description_highlight">
                  <div class = "uperr" style="font-size: 17px;"> <?php echo $fund_target ?> PKR</div>
                  <div class = "lowerr" style="font-size: 14px;">pledged</div>
                </div>
        
          
            </div>
             </div>


<?php endWhile ?>



</div>



<!--puthere-->











</div>


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


</body>
  <script src="js/home_page.js"></script>
  <!--  <script src="js/search.js"></script>
 -->  <script type="text/javascript">
    textfield = document.getElementById("datatext");
contentselect = document.getElementById("contentselect");

contentselect.onchange = function(){
        var text = contentselect.options[contentselect.selectedIndex].value
         if(text != ""){
             //textfield.value += text;
         }
    }

  </script>
</html>
