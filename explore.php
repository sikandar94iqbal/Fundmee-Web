<?php

session_start();

$url = "../fundme/";

    if(isset($_SESSION['user_name'])==false){
header('Location:'.$url);
  }
include "webservice/explore_web.php";
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



<div class="container" style="height: 700px;">


<div>
<h2><b>Collections</b></h2>

<h3><a href="projectType.php?id=project_we_love"> Project We Love  <span>(<?php echo $count_proj_we_love ?>)</span></a></h3>
<h3><a href="projectType.php?id=project_nearly_funded"> Nearly Funded  <span> (<?php echo $count_proj_nearly_funded ?>)</span></a></h3>
<h3><a href="projectType.php?id=project_just_launched"> Just Launched  <span>(<?php echo $count_proj_just_started ?>)  </span></a></h3>
<h3><a href="projectType.php?id=project_everything"> Everything  <span>(<?php echo $count_proj_Everything ?>) </span></a></h3>
</div>

<h2><b>Categories</b></h2>


<div style="margin-bottom: 60px;">
<?php

while($row = mysqli_fetch_array($result0)):

$category = $row['category_name'];
$count = $row['count'];
$cat_id = $row['category_id'];

?>

<h3><a href="ind_category.php?id=<?php echo $cat_id ?>"><?php echo $category ?>  <span> (<?php echo $count ?>)</span></a></h3>


<?php endwhile ?>
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
