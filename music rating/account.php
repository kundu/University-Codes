<?php

    $user="";
    if(isset($_GET["user"])){
        $user=$_GET["user"];
    }
    else{
        header("Location:index.php");
    }
?>



<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $user." :Music"?></title>

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
        
        
        <div class="body_panel">
            
            <h1 style="text-align: center; text-transform: uppercase; margin-top: 10px;"><?php echo $user." Songs"?></h1>
            
            <div class="new-song">
                 <?php  
                        include "database.php";
                         
                        $querry="select * from music where user = '$user'"; 
                
                         
                        $result = $conn->query($querry);
                        while($row = $result->fetch_assoc()){
 
                    ?>



                    <div class="my-music for-home">
                        <h4><?php echo "Song: ".$row['music_name']; ?></h4>
                        <h5><?php echo "Singer: ".$row['singer']; ?></h5>
                        <h6><?php echo "Uploaded: <a href='#'>".$row['user']."</a>"; ?></h6>
                        <p><?php echo "Info: ".$row['info']; ?></p>
                        <audio src="<?php echo 'music/'.$row['music_id']; ?>" controls>
                    </div>

                    <?php } ?>
            </div>
        </div>

    </div>



	</body>
    
    
    
    <script>
     
    </script>
</html>