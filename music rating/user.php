<?php 
    ob_start(); 
    session_start();

    require "database.php"; 
    
    $name="";
    $date="";
     if(!empty($_SESSION["name"])){
        $name=$_SESSION["name"];
        $date=$_SESSION["date"];
    }
    else{ 
        
        header("Location:index.php");
    }


?>







<!DOCTYPE html>
<html>
	<head>
		<title>Log in</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
		<link rel="stylesheet" type="text/css" href="css/style.css">
<!--		<link rel="stylesheet" type="text/css" href="css/mobile.css">-->

	</head>
	<body>


    <div class="container">
        
        <div class="header-panel-main">
            <?php
                include "menu.php";    
             ?>
        </div>
        
        
        
        <div class="user-body-panel">
            <div class="row">
                <div class="left-bar col-xs-12 col-sl-4 col-md-3 col-lg-3 ">
                    <div class="left-bar-sub">
                        <img src="image/1.jpg" style="width:100%;">
                        <a href="index.php">Home</a>
                        <a href="user.php">My Profile</a>
                        <a href="myMusics.php">My Musics</a>
                        <a href="userUploadMusic.php">Upload New Music</a>
                    </div>
                </div>


                <div class="right-bar col-xs-12 col-sl-8 col-md-9 col-lg-9 ">
                    <div class="right-bar-sub">
                        <h1><?php echo 'Welcome '.$name." !!!"?></h1>
                        <p>Your total music is 34.</p> 
                    </div>
                </div>
            </div>
        </div>
        
        

    </div>



	</body>
    
    
    
    <script>
     
    </script>
</html>