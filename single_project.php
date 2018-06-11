<?php

session_start();

//     if(isset($_SESSION['user_id'])==false){
// header('Location:login.php');
//   }

  include "webservice/single_project_web.php";

//echo "<script>alert($ratings)</script>";

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

//include "webservice/search_web.php";


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

  <style type='text/css'>

.starrr {
  display: inline-block; 
    font-size: 23px;
  
    cursor: pointer;
    color: #FFD119;
    text-decoration: none; 
    }
  .starrr a {
    font-size: 23px;
  
    cursor: pointer;
    color: #FFD119;
    text-decoration: none; 
}

  </style>
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

<style type="text/css">
  #div-with-bg
{
    background: url('back1.png');
    opacity: 1;
}
</style>


<div class="container">

<div class="row">
<div class="col-sm-12">


<div class="row">
<div class="col-sm-5">
<h2><b><?php echo $project_title ?></b>  <span style="font-size: 20px; color: #808080">  -  <?php echo $project_category ?></span></h2>

<input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id ?>">
<?php if($is_user){ ?>
<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
<?php } ?>
<input type="hidden" name="author_id" id="author_id" value="<?php echo $author_id ?>">

<div class="row">
  <div class="col-sm-4">
    <a href="user.php?id=<?php echo $author_id ?>"><span style="font-size:17px; color: #808080" ><?php echo $author_name ?> </span></a>
  </div>
    <div class="col-sm-4">
    <span style="font-size:17px; color: #808080" ><?php echo $project_date ?> </span>
  </div>
</div>

<div class="row">
  <div class="col-sm-10">
    <div style="padding-top: 10px;">
  <img src="<?php echo $project_image ?>" style="width:640px; height: 420px;" />
</div>
  </div>
</div>

</div>

<div class="col-sm-5 col-md-offset-2" style="padding-top: 100px;">
  <div class="panel panel-primary" style="height: 420px;">
      <div class="panel-heading" style="font-size: 20px;"><b>Funds and Target</b></div>
      <div class="panel-body">
        
        <div style="margin-top: 10px;"><span style="font-size: 20px;">PKR <b><?php echo $project_target_achieved ?></b></span></div>
        <div><span style="font-size: 15px; color:#808080">pleaged of <b><?php echo $project_target_fund ?></b> goal</span></div>

        <div style="padding-top: 15px;">
        <?php if($backers_available==true){ ?>
<span style="font-size:20px;"><b><?php echo $backers_count ?></b></span>
<?php } else { ?>
<span style="font-size:20px;"><b>0</b></span>
<?php } ?>
<br>
<span style="font-size: 15px; color:#808080">backers</span>
        </div>

<input type="hidden" name="ratings" id="ratings" value="<?php echo $ratings ?>">
        <div style="padding-top: 10px;">
        <h4><b>USER RATING</b></h4>
      <div class='starrr' id='star1' ><a></a></div>

        </div>
   
       <div style="padding-top: 10px;">


<?php if($is_user){ ?>
<?php if($author_id == $_SESSION['user_id']){ ?>
<?php if($project_target_achieved == $project_target_fund){ ?>
       <a href="back_project.php?id=<?php echo $new_project ?>" style=" pointer-events: none;">
    <button style=" width: 100%; height: 50px; font-size: 17px;" class="btn btn-primary" disabled><b>BACK THIS PROJECT</b></button>
    </a>

 <button data-toggle="modal" data-target="#myModal_search" style=" width: 100%; height: 50px; font-size: 17px; margin-top: 10px;" class="btn btn-primary" disabled><b>RATE THIS PROJECT</b></button>

<?php } else { ?>
<a href="back_project.php?id=<?php echo $new_project ?>" style=" pointer-events: none;">
    <button style=" width: 100%; height: 50px; font-size: 17px;" class="btn btn-primary" disabled><b>BACK THIS PROJECT</b></button>
    </a>


    <button data-toggle="modal" data-target="#myModal_search" style=" width: 100%; height: 50px; font-size: 17px; margin-top: 10px;" class="btn btn-primary" disabled><b>RATE THIS PROJECT</b></button>
  

    <?php } ?>



    <?php } else { ?>

<?php if($project_target_achieved == $project_target_fund){ ?>
       <a href="back_project.php?id=<?php echo $new_project ?>"  style=" pointer-events: none;">
    <button style=" width: 100%; height: 50px; font-size: 17px;" class="btn btn-primary" disabled><b>BACK THIS PROJECT</b></button>
    </a>

     <button data-toggle="modal" data-target="#myModal_search" style=" width: 100%; height: 50px; font-size: 17px; margin-top: 10px;" class="btn btn-primary" ><b>RATE THIS PROJECT</b></button>

<?php } else { ?>
<a href="back_project.php?id=<?php echo $new_project ?>">
    <button style=" width: 100%; height: 50px; font-size: 17px;" class="btn btn-primary"><b>BACK THIS PROJECT</b></button>
    </a>

 <button data-toggle="modal" data-target="#myModal_search" style=" width: 100%; height: 50px; font-size: 17px; margin-top: 10px;" class="btn btn-primary"><b>RATE THIS PROJECT</b></button>

    <?php } ?>


    <?php } } ?>




    </div>


      </div>
    </div>
</div>

</div>
<!-- 
<div class="row">
  <div class="col-sm-12">
    
Go to www.addthis.com/dashboard to customize your tools <div class="addthis_inline_share_toolbox"></div>

  </div>
</div> -->


</div>
</div>


<div class="row">
  <div class="col-sm-12">


<div class="row">
  <div class="col-sm-7" id="paragraph" style="padding-top: 0px; padding-bottom: 60px;">


<div style="line-height: 180%;">
<span style="text-align:justify;"><?php echo $project_description ?></span>
</div>



  </div>
</div>


<div class="row">
  <div class="col-sm-7" id="paragraph" style="padding-top: 0px; padding-bottom: 60px;">


<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://fundmee-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>




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



<!--Rating Modal -->

<div id="myModal_search" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>RATE</b></h4>
      </div>
      <div class="modal-body">
       
       
       <form action="search.php" method="post">
         
        <input type="hidden" name="task" value="search">


  <div class="form-group">
    <label for="email">RATE PROJECT </label> 
   <div class='starrr' id='star2' ><a></a></div>
  </div>





      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

<!-- <input class="btn btn-primary" type="submit" value="submit"> -->
<!-- <input type="button" name="submit" id="rate" value="Submit" class="btn-primary"> -->
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
    



<script id="dsq-count-scr" src="//fundmee-1.disqus.com/count.js" async></script>
</body>
  <script src="js/home_page.js"></script>
 <script src="js/project_rate.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
  <script src="js/starrr.js"></script>
  <script>
var rat = $('#ratings').val();
   $('#star1').starrr({
    readOnly: true,
  rating: rat
})



    $('#star1').starrr({
      change: function(e, value){
        if (value) {
    alert(value);
        } else {
          //$('.your-choice-was').hide();
        }
      }
    });

        $('#star2').starrr({
      change: function(e, value){
        if (value) {
    var proj_id = $('#project_id').val();
       var user_id = $('#user_id').val();
          var author_id = $('#author_id').val();

    rate(value,proj_id,user_id,author_id);
        } else {
          //$('.your-choice-was').hide();
        }
      }
    });

    // var $s2input = $('#star2_input');
    // $('#star2').starrr({
    //   max: 10,
    //   rating: $s2input.val(),
    //   change: function(e, value){
    //     $s2input.val(value).trigger('input');
    //   }
    // });
  </script>
  <script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-39205841-5', 'dobtco.github.io');
    ga('send', 'pageview');
  </script>

</html>
