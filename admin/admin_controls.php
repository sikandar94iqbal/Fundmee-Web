<?php


include("connection.php");

include "webservice/admin_controls_web.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Fundmee</title>
  <link rel="icon" type="image/png" sizes="76x76" href="../img/clip.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../assets/css/Footer-with-logo.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav class="navbar  navbar-default" style="background-color: #FFF;  position: relative;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin_home.php" style="color: #000;   position: absolute;
    left: 50%;
    margin-left: -50px !important;  /* 50% of your logo width */
    display: block;"><img src="../img/logo.png" style="width: 123px; height: 30px;"></a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="admin_home.php" style="color: #000;">Home</a></li>
       
     
      </ul>

       <ul class="nav navbar-nav navbar-right">

       <!-- 
      <li><a href="#" style="color: #fff;"><span style="color: #fff;" class="glyphicon glyphicon-search"></span> Search</a></li> -->


      <li>
<button style="margin-top:3px; background-color: #fff; color: #000; border: none;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></button>

      </li>

    

   <!--    <?php if($notification_sign){ ?> -->

 <li><a href="notification.php" style="color: #000;"><span style="color: #ff0000;" class="glyphicon glyphicon-bell"></span></a></li>

<!--  <?php } else { ?> 

 <li><a href="notification.php" style="color: #fff;"><span style="color: #fff;" class="glyphicon glyphicon-bell"></span></a></li>

 <?php } ?> -->

  <li><a href="admin_controls.php" style="color: #000;"><span style="color: #000;" class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['admin_name']; ?></a></li>

      <li><a href="webservice/admin_logout.php" style="color: #000;" id="logout_button"><span style="color: #000;" class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>

  </div>



</nav>





<div class="container" style="height: 800px;">


<div class="row">
<div class="col-sm-12">


<div class="row">


<div class="col-sm-3">

<div>
<BUTTON class="btn btn-lg btn-primary" style="margin-top:3px;  color: #fff; border: none;" type="button" data-toggle="modal" data-target="#myModal_category">Add category</BUTTON>
</div>

<div style="margin-top: 10px;">
<BUTTON class="btn btn-lg btn-primary"  style="margin-top:3px; color: #fff; border: none;" type="button" data-toggle="modal" data-target="#myModal_delete_user">Delete a user</BUTTON>
</div>

<div style="margin-top: 10px;">
<BUTTON class="btn btn-lg btn-primary"  style="margin-top:3px; color: #fff; border: none;" type="button" data-toggle="modal" data-target="#myModal_delete">Delete project</BUTTON>
</div>

<div style="margin-top: 10px;">
<BUTTON class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal_add_admin">Add admin &nbsp;&nbsp;&nbsp;</BUTTON>
</div>

<!-- <div style="margin-top: 10px;">
<BUTTON class="btn btn-lg btn-primary">Add a Blog &nbsp;&nbsp;&nbsp;</BUTTON>
</div> -->


</div>


<div class="col-sm-4">
<div class="panel panel-primary">
  <div class="panel-heading"><b>Projects stats</b></div>
  <div class="panel-body">

<div>
  <span id="paragraph" style="font-size: 18px; padding-top: 5px;">Category count : <b><?php echo $count_categories ?></b></span>
  <br>
   <span id="paragraph" style="font-size: 18px; padding-top: 5px;">Project count : <b><?php echo $count_projects ?></b></span>
   <br>
    <span id="paragraph" style="font-size: 18px; padding-top: 5px;">Project backed : <b><?php echo $count_backed_projects ?></b></span>
    <br>
     <span id="paragraph" style="font-size: 18px; padding-top: 5px;">Total funding : <b><?php echo $total_fund ?></b></span>
</div>
</div>
</div>




</div>

<div class="col-sm-4">
<div class="panel panel-primary">
  <div class="panel-heading"><b>User Stats</b></div>
  <div class="panel-body">

<div>
  <span id="paragraph" style="font-size: 18px; padding-top: 5px;">Users Count : <b><?php echo $user_count ?></b></span>
  <br>
   <span id="paragraph" style="font-size: 18px; padding-top: 5px;">Authors Count : <b><?php echo $author_count ?></b></span>
   <br>
    <span id="paragraph" style="font-size: 18px; padding-top: 5px;">Backers Count : <b><?php echo $backer_count ?></b></span>
    <br>
  
</div>
</div>
</div>




</div>




</div>






</div>
</div>





</div>

<!--search modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>SEARCH</b></h4>
      </div>
      <div class="modal-body">
       
       
       <form action="../search.php" method="post">
         
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
<!---->




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





<!--Add category modal -->

<div id="myModal_category" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Add Category</b></h4>
      </div>
      <div class="modal-body">
       
       
       <form action="webservice/add_category_web.php" method="post">
         
        <input type="hidden" name="task" value="search">


  <div class="form-group">
    <label for="email">Category Name:</label>
    <input type="text" class="form-control" id="category_name" name="category_name">
  </div>

    </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

<input class="btn btn-primary" type="submit" value="submit">
       </form>


      </div>
    </div>

  </div>
</div>



<!--delete project modal -->

<div id="myModal_delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Delete project</b></h4>
      </div>
      <div class="modal-body">
       
       
       <form action="webservice/delete_project_web.php" method="post">
         
        <input type="hidden" name="task" value="search">


  <div class="form-group">
    <label for="email">Project Name:</label>
    <input type="text" class="form-control" id="project_name" name="project_name">
  </div>

    </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

<input class="btn btn-primary" type="submit" value="submit">
       </form>


      </div>
    </div>

  </div>
</div>



<!--delete user modal -->

<div id="myModal_delete_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Delete user</b></h4>
      </div>
      <div class="modal-body">
       
       
       <form action="webservice/delete_user_web.php" method="post">
         
        <input type="hidden" name="task" value="search">


  <div class="form-group">
    <label for="email">User Email:</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>

    </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

<input class="btn btn-primary" type="submit" value="submit">
       </form>


      </div>
    </div>

  </div>
</div>




<!--add admin modal -->

<div id="myModal_add_admin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Add admin</b></h4>
      </div>
      <div class="modal-body">
       
       
       <form action="webservice/admin_signup_web.php" method="post">
         
        <input type="hidden" name="task" value="admin">


  <div class="form-group">
    <label for="email">Admin name :</label>
    <input type="text" class="form-control" id="name1" name="name1">
  </div>

  <div class="form-group">
    <label for="text">Admin Email :</label>
    <input type="text" class="form-control" id="email1" name="email1">
  </div>

    <div class="form-group">
    <label for="form-password">Password :</label>
    <input type="Password" class="form-control" id="password1" name="password1">
  </div>

    </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

<input class="btn btn-primary" type="submit" value="submit">
       </form>


      </div>
    </div>

  </div>
</div>





<footer id="myFooter"  style="background-color: #535353; color: #000;">
        <div class="container" style="color:#000">
            <div class="row">
                <div class="col-sm-3" >
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="admin_home.php">Home</a></li>
                    
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
                 <h2 class="logo"><a href="admin_home.php"> <img src="../img/logo.png" style="width: 123px; height: 30px;"></a></h2>
                <div class="social-icons">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </footer>


</body>
 <!--  <script src="js/home_page.js"></script> -->
  <!--  <script src="js/search.js"></script>
 -->  
</html>
