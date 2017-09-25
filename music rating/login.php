<?php 
    ob_start(); 
    session_start();

    require "database.php"; 
 
     if(!empty($_SESSION["name"])){
        header("Location:index.php");
    }
    else{ 
        
//        header("Location:index.php");
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
        
        
        <div class="signup_panel">
            <h2>Log in</h2>
            
         
            
<?php
//    session_start();
    include "database.php"; 
    
    if(isset($_POST["login_click"])){
        $username=$_POST["user_name"];
        $userpassword=$_POST["user_password"]; 
        
        $queryForCheck="SELECT name FROM user WHERE name = '$username' and password='$userpassword'";
        
        $result = $conn->query($queryForCheck);
        $row_cnt = $result->num_rows; 
//        $userNameIsOkay=true;
        
        if($row_cnt==0){  
            echo "Wrong username or password";
        }
        else{  
//            session_start();
            $_SESSION["name"]=$username; 
//            echo "Right";
            header("Location:index.php");
        }  
    }
 
?> 
            
            
            
            
            
            <form action="" method="post">
                <label for="usr">Username</label>
                <input class="form-control" type="text" name="user_name">
                
                <label for="usr">Password</label>
                <input class="form-control" type="password" name="user_password">
                
                <br>
                <input class="btn" type="submit" name="login_click" value="Log in">
            </form>
        </div>

    </div>



	</body>
    
    
    
    <script>
     
    </script>
</html>