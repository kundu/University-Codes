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
        $name=$_GET["name"];
        $address=$_GET["address"];
        $phone=$_GET["phone"];
        $username=$_GET["username"]; 
        
        $updateMechanic="UPDATE mechanic_table SET m_name='$name',m_address='$address',m_phone='$phone' WHERE m_username='$username'";
        
        if($conn->query($updateMechanic)===true){
            echo " Updated ";
       }
        else{
            echo " Not updated ";
        }
    }
    else{
        echo "problem";
    }
        
?>