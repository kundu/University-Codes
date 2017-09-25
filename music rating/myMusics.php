<?php 
    ob_start(); 
    session_start();

    require "database.php"; 
    
    $user="";
     if(!empty($_SESSION["name"])){
        $user=$_SESSION["name"];
    }
    else{  
        header("Location:index.php");
    }


?>







<!DOCTYPE html>
<html>
	<head>
		<title>My Music</title>

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


                    <?php  
                        $querry="select * from music where user='$user'";

                        $result = $conn->query($querry);
                        while($row = $result->fetch_assoc()){
 
                    ?>



                    <div class="my-music">
                        <h4><?php echo $row['music_name']; ?></h4>
                        <h5><?php echo $row['singer']; ?></h5>
                        <h6><?php echo $row['date']; ?></h6>
                        <p><?php echo $row['info']; ?></p>
                        <audio src="<?php echo 'music/'.$row['music_id']; ?>" controls>
                    </div>

                    <?php } ?>

                    
                    
                </div>
            </div>
        </div>
        
        

    </div>



	</body>
    
    
    
    <script>
     
    </script>
</html>