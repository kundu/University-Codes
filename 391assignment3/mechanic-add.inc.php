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
   if(isset($_GET["name"]) && isset($_GET["address"]) && isset($_GET["phone"]) && isset($_GET["username"])){
//       echo "okay";
       $name=$_GET["name"];
       $address=$_GET["address"];
       $phone=$_GET["phone"];
       $username=$_GET["username"]; 
       $inserQuerry="insert into mechanic_table values('','$name','$address','$phone','$username','k')";
       
       if($conn->query($inserQuerry)===TRUE){
           echo "inserted";
       }
       else{
           echo "problem";
       }
   }
    else{
        echo "no";
    }
?>