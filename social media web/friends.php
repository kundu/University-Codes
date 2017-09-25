<?php 

   session_start();
   require_once "database.php";

   if(!isset($_SESSION["name"])){
      header("Location:index.php");
   }

    


?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Friend Requests</title>
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" type="text/css" href="css/friends.css">
      
      
      <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>

   <!-- Navigation Menu Bar starts -->

      <?php include "menu.php"; ?>



      <!-- Navigation Menu Bar ends -->






<!-- Profile Info Bar starts -->



      
<div class="row">
      
      <div class="col-md-1"></div>
      

         <?php include "myProfile.php";  ?>

<div class="col-md-1">
         </div>
         <div class="verticalLine">
         </div>


 <?php include "myFriendsRequests.php"; ;


   if(isset($_POST["confirm"])){
        $f_source=$_POST["f_source"];
        $queryUpdateFriend="UPDATE friend SET status='friend' WHERE f_source=
        '$f_source' AND f_destination='$user'";
        if($conn->query($queryUpdateFriend)===true){
            echo "Updated  !! Please Reload this page.";  
            $queryInsert="INSERT INTO friend VALUES('','$user','$f_source','friend')";
            if($conn->query($queryInsert)===TRUE ){
               echo '<script language="javascript">
               alert("Become friend")
               </script>'; 
         }
         else{
            echo '<script language="javascript">
            alert("Not inserted")'.mysql_error().'
            </script>';
         }
      }
        else{
           echo "Not updated";
        }
    }

    if(isset($_POST["delete"])){
        $f_source=$_POST["f_source"];
       $queryUpdateFriend="DELETE FROM friend WHERE f_source=
        '$f_source' AND f_destination='$user'";
        if($conn->query($queryUpdateFriend)===true){
            echo "Deleted !! Please Reload this page."; 
        }
        else{
           echo "Not Deleted";
        }

    }

  ?>
 

      

</div>





   </body>
</html>