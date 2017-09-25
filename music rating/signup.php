 
<!DOCTYPE html>
<html>
	<head>
		<title>Sign up</title>

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
            <h2>Join Us !!!</h2>
            
            
<?php
    
    include "database.php"; 
    
    if(isset($_POST["signup_click"])){
        $username=$_POST["user_name"];
        $userpassword=$_POST["user_password"]; 
        
        $queryForCheck="SELECT name FROM user WHERE name = '$username'";
        
        $result = $conn->query($queryForCheck);
        $row_cnt = $result->num_rows; 
        $userNameIsOkay=true;
        
        if($row_cnt==0){ 
            $userNameIsOkay=true; 
        }
        else{ 
            $userNameIsOkay=false ;
        } 
        
        if($userNameIsOkay){  
            $photoName=$username.".jpg";
            $temp=$_FILES['file']['tmp_name']; 
            $location="photo/";

            if(move_uploaded_file($temp, $location.$photoName)){
                
                $queryUserInsert="insert into user values('','$username','$userpassword','$photoName',NOW())";
                
                if($conn->query($queryUserInsert)===TRUE){
                    echo "Welcome";
                    header("Location:login.php");
                }
                else{
                    echo "not inserted";
                }
                
            }
            else{
                echo " not";
            }   
        }
        else{
            echo "Username is available. Try to take another username !!!";
        }
      
    }
 
?>      
            
            <form action="" method="post" enctype="multipart/form-data">
                <label for="usr">Username</label>
                <input class="form-control" type="text" name="user_name">
                
                <label for="usr">Password</label>
                <input class="form-control" type="password" name="user_password">
                
                <label for="usr">Your photo</label>
                <input class="form-control" type="file" name="file">
                <br>
                <input class="btn" type="submit" name="signup_click" value="Join">
            </form>
        </div>

    </div>



	</body>
    
    
    
    <script>
     
    </script>
</html>