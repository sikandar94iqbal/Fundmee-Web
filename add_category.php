<?php
session_start();

    if(isset($_SESSION['user'])==false){
header('Location:login.php');
  }

include 'connection.php';
if($db){
   //echo "<script language='javascript'>alert('succeess');</script>";
}
else{
  // echo "<script language='javascript'>alert('failed');</script>";
}
$category = $_POST['cat_id'];

$query0 = "INSERT INTO `project_category`(`category`) VALUES ('$category')";
$result0 = $db->query($query0);

if($result0){
  echo "<script language='javascript'>alert('succeess');</script>";
}
else{
  echo "<script language='javascript'>alert('failed');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kickstarter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar  navbar-default" style="background-color: #0269C2;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color: #fff;">Kickstarter</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="#" style="color: #fff;">Home</a></li>
       <li ><a href="#" style="color: #fff;">Explore</a></li>
        <li ><a href="startProject.php" style="color: #fff;">Start a project</a></li>
      </ul>

       <ul class="nav navbar-nav navbar-right">
      <li><a href="#" style="color: #fff;"><span style="color: #fff;" class="glyphicon glyphicon-search"></span> Search</a></li>

  <li><a href="myprofile.php" style="color: #fff;"><span style="color: #fff;" class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user']; ?></a></li>

      <li><a href="login.php" style="color: #fff;" id="logout_button"><span style="color: #fff;" class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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


<div class="row">
<div class="col-sm-6">


<form class="form" id="catform_id" style="padding-top:20px;" method="post" >
<div class="form-group">
    <label for="email">Category:</label>
    <input type="text" class="form-control" id="cat_id"  name="cat_id">
  </div>

  <input type="submit" name="submit" value="submit"/>
    </form>          

</div>
</div>


</div>

</body>
  <script src="js/home_page.js"></script>
</html>
