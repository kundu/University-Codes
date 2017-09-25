<?php 

 	session_start();
    if(empty($_SESSION["name"])){ 

    }
    else{ 
        // header("Location:teacher.php");
    }
	include "database.php";
	if(isset($_GET["username"]) && isset($_GET["password"])){
		$username=$_GET["username"];
		$password=$_GET["password"];

		$querry="select * from teacher where username='$username' and password='$password'";


		$result = $conn->query($querry);
        if (mysqli_num_rows($result) > 0){
            $_SESSION["name"]=$username;
            if($username=="admin"){
                echo 'Admin click here. <a href="admin.php">Click here to control the class and subject !!!!</a>';    
            }
            echo 'Matched. <a href="index.php">Click here to control the files !!!!</a>';
        }
        else{
            echo "Wrong username or password ";
        }


	}
	else{

	}
 ?>



