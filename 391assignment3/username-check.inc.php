<?php
    ob_start();
    session_start();
    if(empty($_SESSION["name"])){ 
        header("Location:index.php");
    }
    else{ 
    }
?>


<?php
    
    require "database.php";
    
    if(isset($_GET['username'])){
        $username=$_GET['username'];
        $querryForUsrname="select * from mechanic_table where m_username='$username'";
        $result = $conn->query($querryForUsrname);
        $row = $result->fetch_assoc();
        if(empty($row)){
//            echo "username available."; 
        }
        else{
            echo "This username is already taken. Use something else !!";
        }
    }
    else{
        echo "no username";
    }
?>