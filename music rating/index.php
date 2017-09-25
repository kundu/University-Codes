<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>

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
            <div class="search-form">
                <form action="" method="get">
                    <input class="form-control" type="text" name="search" placeholder="music name.." required>
                    <input class="searchButton" type="submit" value="Search" name="searchClick">
                </form>
            </div>
            
            
            <div class="new-song">
                 <?php  
                        include "database.php";
                        
                        $querry="";
                        if(isset($_GET["searchClick"])){
                            $search=$_GET["search"]."%";
                            $querry="select * from music where music_name like '$search'";
                        }
                        else{
                            $querry="select * from music";
                        }
                
                         
                        $result = $conn->query($querry);
                        while($row = $result->fetch_assoc()){
                        $req=$row['user'];
                    ?>



                    <div class="my-music for-home">
                        
                        <h4><?php echo "Song: ".$row['music_name']; ?></h4>
                        <h5><?php echo "Singer: ".$row['singer']; ?></h5>
                        <h6><?php echo "Uploaded: <a href='account.php?user=$req'>".$row['user']."</a>"; ?></h6>
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