<?php
session_start();

$url = "../fundme/";

    if(isset($_SESSION['user_name'])==false){
header('Location:'.$url);
  }

include("webservice/check_profile_status.php");

  $message = 'Profile needs to be edited first';

    // echo "<SCRIPT type='text/javascript'> //not showing me this
    //     alert('$message');
    //     window.location.replace(\"http:://localhost\");
    // </SCRIPT>";


if($profile_available)
{
//echo "<script>alert('Profile availabe')</script>";
}else{

 echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace('edit_info.php')
    </SCRIPT>";

}

  include("webservice/start_project_web.php");
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

</head>
<body>


<nav class="navbar  navbar-default" style="background-color: #FFF;  position: relative;">
  <div class="container-fluid">
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

       <!-- 
      <li><a href="#" style="color: #fff;"><span style="color: #fff;" class="glyphicon glyphicon-search"></span> Search</a></li> -->


      <li>
<button style="margin-top:3px; background-color: #fff; color: #000; border: none;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></button>

      </li>

    

      <?php if($notification_sign){ ?>

 <li><a href="notification.php" style="color: #fff;"><span style="color: #ff0000;" class="glyphicon glyphicon-bell"></span></a></li>

 <?php } else { ?> 

 <li><a href="notification.php" style="color: #fff;"><span style="color: #000;" class="glyphicon glyphicon-bell"></span></a></li>

 <?php } ?>

  <li><a href="myprofile.php" style="color: #000;"><span style="color: #000;" class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user_name']; ?></a></li>

      <li><a href="webservice/logout.php" style="color: #000;" id="logout_button"><span style="color: #000;" class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>

  </div>



</nav>




<style type="text/css">
  .cl{
    background-image: url("img/start_back.png");
    height: 120px;

  }
  .remove-all-margin-padding{
margin:0 ! important;
padding:0 ! important;
}
</style>



<div class="container">

<div class="row">
<div class="col-sm-12 ">
  <h2><b>Start a project</b></h2>
  </div>
</div>


<div class="row" style="padding-bottom: 100px;">
<div class="col-sm-6" style="background-color: #fff;">


<form class="form" id="contactForm" style="padding-top:20px;" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Title:</label>
    <input type="text" class="form-control" id="title_id" name="title_id">
  </div>

<div class="form-group">
  <label for="sel1">Category:</label>
  <select class="form-control" id="cat_id" name="cat_id">

<?php for ($i=1; $i <= $counts1; $i++) { ?> 
   <option><?php echo $cats[$i]; ?></option>

<?php } ?>


  </select>
</div>

   <div class="form-group">
    <label for="email">Location:</label>
    <input type="text" class="form-control" id="loc_id"  name="loc_id">
  </div>

  <div class="form-group">
    <label for="text">Company:</label>
    <input type="text" class="form-control" id="company_id" name="company_id">
  </div>

<div class="form-group">
  <label for="example-number-input" class="col-2 col-form-label">Fund Target: PKR</label>
  <div class="col-10">
    <input class="form-control" type="number" value="42" id="fund_id" name="fund_id">
  </div>
</div>

  <div class="form-group">
    <label for="pwd">Description:</label>
      <TEXTAREA type="text" class="form-control" name="desc_id" id="desc_id"> </TEXTAREA> 
  </div>

   
      <div class="form-group">
    <label for="email">Video :</label><span> if any..</span>
    <input type="text" class="form-control" id="video_id"  name="video_id">
  </div>

   

  <div class="form-group">
    <label for="exampleInputFile">File input</label>
 <input class="form-control" type="file" id="exampleTextarea" name="image" placeholder="image">
    <p class="help-block">Add image</p>
  </div>



  <input class="btn btn-primary" style="float: right;" type="submit" name="submit" value="submit"/>

  <!--  <button style="float:right; width: 120px; height: 50px; font-size: 17px;" type="submit" class="btn btn-primary"><b>Submit</b></button> -->
              
</form>

</div>


<div class="col-sm-4 col-md-offset-2">

<!--  <div class="panel panel-default">
  <div class="panel-heading"><b>Read our blogs</b></div>
  <div class="panel-body">

<div>
  <span id="paragraph">Read about technology and advancement happening around the globe</span>
</div>
<div style="padding-top: 15px;">
    <button style=" width: 100%; height: 50px; font-size: 17px;" type="submit" class="btn btn-primary"><b>CHECK IT OUT</b></button>
    </div>
  </div>


</div> -->




 <div class="panel panel-default">
  <div class="panel-heading"><b>Browse more categories</b></div>
  <div class="panel-body">

<div>
  <span id="paragraph">Arts</span>
  <br>
   <span id="paragraph">Games</span>
   <br>
    <span id="paragraph">Music</span>
    <br>
     <span id="paragraph">Food</span>
     <br>
     <span id="paragraph">Cosplay</span>
     <br>
     <span id="paragraph">YouTube channel</span>
     <br>
     <span id="paragraph">Photography</span>
     <br>
     <span id="paragraph">Crafts</span>
       <br>
     <span id="paragraph">Tech</span>
</div>

  </div>


</div>

</div>

</div>





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
</html>
