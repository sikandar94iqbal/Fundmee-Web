<?php
//include "connection.php";
//include "webservice/signup_web.php";




?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kickstarter Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">


        <link rel="stylesheet" href="css/style_login.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                       <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong><b>FUNDME</b></strong></h1>
                            <div class="description">
                                <p>
                                    Get the attention you deserve
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row row-centered">
                    


                            <!-- signupp -->
                        <div class="col-md-6 col-md-offset-3">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="registration-form">
				                        <div class="form-group">
                                            <label class="sr-only" >Name</label>
                                            <input type="text" name="name1" placeholder="Name..." class="form-email form-control" id="name1">
                                        </div> 
				                   


                                        <div class="form-group">
                                            <label class="sr-only" for="form-email">Email</label>
                                            <input type="text" name="email1" placeholder="Email..." class="form-email form-control" id="email1">
                                        </div> 

                                         <div class="form-group">
                                            <label class="sr-only" for="form-last-name">Last name</label>
                                            <input type="password" name="password1" placeholder="Password" class="form-last-name form-control" id="password1">
                                        </div>

				                   
				                     
<input id="signup_button" class="btn" type="button" value="submit" name="submit" />
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                        <!-- signupp -->




                    </div>
                     <div>
                        <a href="login.php"><span><strong style="color:#fff;">Already have an account?</strong></span></a>
<br>
                    <!--      <a href="admin_signup.php"><span><strong style="color:#fff;">Admin Signup</strong></span></a> -->
                    </div>

                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        		
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
                <!--myScripts-->
        
 <script src="js/signup.js"></script>


</html>