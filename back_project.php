<?php
session_start();

$url = "../fundme/";

    if(isset($_SESSION['user_name'])==false){
header('Location:'.$url);
  }

  include "webservice/temp_back_project_web.php";
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
  #div-with-bg
{
    background: url('back1.png');
    opacity: 1;
}
</style>



<div class="container">

<h2><b>Back <?php echo $project_title ?></b></h2>

<div class="row" style=" padding-bottom: 50px;">
<div class="col-sm-6">

<form class="form" id="contactForm" style="padding-top:20px;" method="post" enctype="multipart/form-data">





<div class="form-group">
  <label for="example-number-input" class="col-2 col-form-label">Amount: PKR</label>
  <div class="col-10">
    <input class="form-control" type="number" value="42" id="fund_id" name="fund_id">
  </div>
</div>

   <div class="form-group">
    <label for="pwd">Comment:</label> <span> (any)</span>
    <TEXTAREA type="text" class="form-control" name="comment_id" id="comment_id"> </TEXTAREA> 
  </div>

<div class="form-group">
  <label for="sel1">Payment:</label>
  <select class="form-control" id="method_id" name="method_id">
    


      
   <option>Bank Transfer</option>
    <option>EasyPaisa</option>


  </select>
</div>



<div style="padding-top: 20px">
<span><b>Bank information</b></span>
<br>

<?php if(isset($bank_acc)){ ?>

<span id="paragraph" style="font-size: 17px;">Bank Acc No. <b><?php echo $bank_acc ?></b></span>
<?php } ?>

<br>



<?php if(isset($bank_branch)){ ?>
<span id="paragraph" style="font-size: 17px;">Branch No. <b><?php echo $bank_branch ?></b></span>
<?php } ?>

<br>

<br>
</div>

<div style="padding-top:10px">
<span><b>EasyPaisa information</b></span>
<br>

<?php if(isset($user_cnic)){ ?>
<span id="paragraph" style="font-size: 17px;">CNIC no. <b><?php echo $user_cnic ?></b></span>
<?php } ?>


<br>

<?php if(isset($user_phone)){ ?>
<span id="paragraph" style="font-size: 17px;">Phone no. <b><?php echo $user_phone ?></b></span>

<?php } ?>


<br>
<div style="padding-top:10px">
<br>
<span id="paragraph">Transaction pin : <b><?php echo $t_pin ?></b></span></div>
<br>
</div>








    <div style="padding-top: 25px;">

<!--     <button style=" width: 200px; height: 50px; font-size: 17px; float: right;" type="submit" class="btn btn-primary"><b><a href="back_project.php" style="color: #fff;">BACK THIS PROJECT</a></b></button> -->

<input class="btn btn-primary" style="float: right;" type="submit" name="submit" value="submit">
<?php if($sent){ ?>
<h4><b>Back request sent!</b></h4>
<?php }  ?>

    </div>
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
