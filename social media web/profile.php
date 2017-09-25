<?php 
require_once 'code.php'; 
// session_start();
if(isset($_SESSION["name"])){ 
}
else{
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
      <title>Profile- <?php echo $user_fName; ?></title>
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="css/profile.css">
      <link href="css/round-about.css" rel="stylesheet">
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
         
         <?php include "myProfile.php" ;?>

         <div class="col-md-1">
         </div>
         <div class="verticalLine">
         </div>
         
          <?php include "myFriends.php" ;?>
      </div>






       
   </body>
</html>


<?php 
   // if (isset($_POST['updateClick'])) {
   //    $user_fName=$_POST['user_fname'];
   //    $user_lName=$_POST['user_lname'];
   //    $user_work=$_POST['user_work'];
   //    $user_study=$_POST['user_study'];
   //    $user_live=$_POST['user_live'];
   //    $user_phone=$_POST['user_phone'];
   //    $user_birth=$_POST['user_birth'];
   //    $user_gender=$_POST['user_gender'];
   //    $user_about=$_POST['user_about'];

   //    $size=$_FILES['file']['size'];
   //    $type=$_FILES['file']['type'];
   //    $name=$userEmail.".jpeg";
   //    $temp=$_FILES['file']['tmp_name'];
   //    $location="upload/";

   //    if($size!=0){

   //       echo '<script language="javascript">
   //       alert("Done mama miya.")
   //       </script>';
   //       if(unlink(urldecode($name))){
   //          echo "Deleted";
   //       }
   //       else{
   //          echo "not";
   //       }


   //       if($type=="image/jpeg" &&  move_uploaded_file($temp, $location.$name)){
   //           $update_querry="UPDATE user SET fname='$user_fName',lname='$user_lName',
   //           works='$user_work',studies='$user_study',live='$user_live',
   //           mobile='$user_phone',birthday='$user_birth',gender='$user_gender',
   //           about='$user_about',ppname='$name' WHERE email='$userEmail'";


   //          if($conn->query($update_querry)===true){
   //                echo "updated and uploaded";
   //                header("Location:profile.php");
   //            }
   //            else{
   //             echo "not updated and uploaded";
   //            }
   //       }
   //       else{
   //          echo "! uploaded";
   //       }
   //    }

   //    else{
   //       $update_querry="UPDATE user SET fname='$user_fName',lname='$user_lName',
   //        works='$user_work',studies='$user_study',live='$user_live',
   //        mobile='$user_phone',birthday='$user_birth',gender='$user_gender',
   //        about='$user_about' WHERE email='$userEmail'";


   //       if($conn->query($update_querry)===true){
   //             echo "updated";
   //             header("Location:profile.php");
   //         }
   //         else{
   //          echo "not updated";
   //         }
   //    }
   // }
 ?>