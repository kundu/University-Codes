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

                    <div class="my-music for-home">
                        <h1>This page is for all music lover</h1>
                        <h3>Create your account and share music with others !!</h3>
                        <h1>Thank you!!!</h1>
                    </div>
 
            </div>
        </div>

    </div>



	</body>
    
    
    
    <script>
     
    </script>
</html>