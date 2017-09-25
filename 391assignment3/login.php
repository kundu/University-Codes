<?php
    ob_start();
    require "database.php";
    session_start();
 
    if(empty($_SESSION["name"])){ 
        
    }
    else{ 
        header("Location:admin-panel.php");
    }


    if(isset($_POST["loginClick"])){
        $username=$_POST["username"];
        $password=$_POST["password"];
        
        
        $adminQuery="select * from admin_panel where admin_username='$username' and admin_password='$password'";
        $result = $conn->query($adminQuery);
        $row_cnt = $result->num_rows;
        if($row_cnt>0){
            $row=mysqli_num_rows($result);
            session_start();
            $_SESSION["name"]=$username;
            header("Location:admin-panel.php");
        }
        else{
            echo "wrong";
        }
        
        
    }
        
    
?>

<head>
    <title>Log in</title>

    <link rel="stylesheet" href="css/style.css">
<!--        <link rel="stylesheet" href="css/mobile.css">-->
</head>

<div class="wrapper">
    <div class="logInForm">
        <a class="m-a-button" href="index.php">Home</a>
        <h1>Admin Log in</h1>
        <form action="login.php" method="post">
            Username :<input type="text" name="username">
            Password :<input type="password" name="password"> 
            <input type="submit" name="loginClick" value="Log in">
        </form>
    </div>
</div>