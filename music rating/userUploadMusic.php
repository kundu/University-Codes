<?php 
    ob_start(); 
    session_start();

    require "database.php"; 
    $user="";
     if(!empty($_SESSION["name"])){
//        header("Location:index.php");
        $user=$_SESSION["name"];
    }
    else{ 
        
        header("Location:index.php");
    }
    



//    if(isset($_POST["uploadClick"])){
//        
//        $music_name=$_POST["music_name"];
//        $singer_name=$_POST["singer_name"];
//        $info=$_POST["info"];
//        
//        
//        $size=$_FILES["music_file"]['size'];
//		$type=$_FILES["music_file"]['type'];
////        echo $type;
//		$music=microtime().".mp3";
//		$temp=$_FILES['music_file']['tmp_name']; 
//		$location="music/";
//        
//        if(move_uploaded_file($temp, $location.$music)){
//            $querry="insert into music values('','$user','$music_name','$music','$singer_name','$info',NOW())";
//
//
//            if($conn->query($querry)===TRUE){
//                echo "Done";
//                // header("Location:login.php");
//            }
//            else{
//                echo "not inserted";
//            }
//
//        }
//        else{
//            echo "not dome";
//        }
//        
//    }

?>







<!DOCTYPE html>
<html>
	<head>
		<title>Upload Music</title>

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
                        
                        <?php
                            
                        
                            if(isset($_POST["uploadClick"])){
        
                                $music_name=$_POST["music_name"];
                                $singer_name=$_POST["singer_name"];
                                $info=$_POST["info"];


                                $size=$_FILES["music_file"]['size'];
                                $type=$_FILES["music_file"]['type'];
                        //        echo $type;
                                $music=microtime().".mp3";
                                $temp=$_FILES['music_file']['tmp_name']; 
                                $location="music/";

                                if(move_uploaded_file($temp, $location.$music)){
                                    $querry="insert into music values('','$user','$music_name','$music','$singer_name','$info',NOW())";


                                    if($conn->query($querry)===TRUE){
                                        echo "<h3>Music Uploaded</h3>";
                                        // header("Location:login.php");
                                    }
                                    else{
                                        echo "not inserted";
                                    }

                                }
                                else{
                                    echo "not dome";
                                }

                            }
                        
                        
                        
                        ?>
                        
                        <form action="" method="POST" enctype="multipart/form-data">
                            
                            <label for="usr">Music Name</label>
                            <input class="form-control" type="text" name="music_name">
                            
                            <label for="usr">Singer Name</label>
                            <input class="form-control" type="text" name="singer_name">
                            
                            <label for="usr">Info</label>
                            <textarea class="form-control" name="info"></textarea>
                            
                            <label for="usr">Music File</label>
                            <input type="file" name="music_file">
                            
                            <br><br>
                            <input class="btn" type="submit" name="uploadClick" value="Upload Music">
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        

    </div>



	</body>
    
    
    
    <script>
     
    </script>
</html>