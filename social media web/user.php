<?php  
   $userEmail=$_GET["search"];
   require_once 'database.php';
   $saveName="";
   // echo $userEmail; 
   
   $user_fName=$user_lName=$user_work=$user_study=$user_live=$user_phone=$user_birth=$user_gender=$user_about=$user_ppName=$user_gender_def="";
   
   session_start();
   if($userEmail==$_SESSION["name"]){
    header("Location:index.php");
   }


   if(isset($_SESSION["name"])){ 
      // $userEmail = $_SESSION["name"];
      $get_User_info_querry="SELECT * FROM user WHERE email='$userEmail'";
      $result = $conn->query($get_User_info_querry);
      $row = $result->fetch_assoc();
      if(!empty($row)){ 
        $user_fName=$row['fname'];
        $user_lName=$row['lname'];
        $saveName=$user_lName."'s";
        $user_work=$row['works'];
        $user_study=$row['studies'];
        $user_live=$row['live'];
        $user_phone=$row['mobile'];
        $user_birth=$row['birthday'];
        $user_gender=$row['gender'];
        $user_about=$row['about'];
        $user_ppName=$row['ppname'];
        if($user_gender=="Male"){
         $user_gender_def="Mr.";
        }
        else{
         $user_gender_def="Miss. ";
        }
      }
      else{ 
         // header("Location:index.php");
      }
   }
   else{
      // header("Location:index.php");
   }

   

    if(isset($_POST["sendRequestClick"])){

      $friendSource=$_SESSION["name"];
      $friendDestination=$_POST["getMailToReload"];
      $userEmail=$friendDestination;

      $queryForFriendRequest="INSERT INTO friend VALUES('','$friendSource',
        '$friendDestination','request')";
      if($conn->query($queryForFriendRequest)===TRUE ){
         echo '<script language="javascript">
         alert("Done mama miya.")
         </script>';
         
      }
      else{
        echo "Not send";
      }
      header("Location:user.php?search=".$userEmail);
    }



    if(isset($_POST["cancelRequestClick"])){

      $friendSource=$_SESSION["name"];
      $friendDestination=$_POST["getMailToReload"];
      $userEmail=$friendDestination;

      $queryForFriendCancel="DELETE FROM friend WHERE f_source='$friendSource'
        AND f_destination='$friendDestination'";

      // $queryForFriendCancel2="DELETE FROM friend WHERE f_source='$friendDestination'
      //   AND f_destination='$friendSource'";


      if(($conn->query($queryForFriendCancel)===TRUE)){
         echo '<script language="javascript">
         alert("Done mama miya.")
         </script>';
         
      }
      else{
         // echo '<script language="javascript">
         // alert("bash mama miya.")
         // </script>';
      }
      header("Location:user.php?search=".$userEmail);
    }

    

   ?>



   
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>User- <?php echo $user_fName; ?></title>
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
      <?php include "menu.php" ?>
      <!-- Navigation Menu Bar ends -->
      <!-- Profile Info Bar starts -->
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-3">
            <h3 style= "padding-top: 6%; color: #2980B9"><?php echo "Lets communicate with ".$user_gender_def.$user_lName; ?></h3>
            <hr>
            <div class="panel panel-info" style="margin-left: -4%">
               <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $user_fName." ".$user_lName; ?></h3>
               </div>
               <div class="panel-body">
                  <div class="row">
                     <div class="col-md-3 col-lg-3 " align="center"> 
                        <img alt="User Pic" src="<?php echo 'upload/'.$user_ppName; ?>" class="img-circle img-responsive">
                     </div>
                     <div class=" col-md-9 col-lg-9 ">
                        <form class="form-horizontal" method="POST" action="user.php" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">First Name</label>
                              <div class="col-sm-10">
                                 <input type="Name" class="form-control" id="inputName"  placeholder="Name"
                                    value='<?php echo $user_fName; ?>' name="user_fname">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Last Name</label>
                              <div class="col-sm-10">
                                 <input type="Name" class="form-control" id="inputName"  placeholder="Name"
                                    value='<?php echo $user_lName; ?>' name="user_lname">
                              </div>
                           </div>
                           
                           <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Studies at</label>
                              <div class="col-sm-10">
                                 <input type="Name" class="form-control" id="inputName"  placeholder="Name"
                                    value='<?php echo $user_study; ?>' name="user_study">
                              </div>
                           </div>
                           
                           <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Email Address</label>
                              <div class="col-sm-10">
                                 <input type="Name" class="form-control" id="inputName" name="getMailToReload" required placeholder="Name"
                                    value=<?php echo  $userEmail; ?> readonly>
                              </div>
                           </div>
                           
                           <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                 <?php 
                                  $f_source=$_SESSION["name"];
                                  $f_destination=$userEmail;
                                  $f_result="";
                                  $queryFriendRequest="SELECT * FROM friend WHERE f_source='$f_source'
                                   AND f_destination='$f_destination'";
                                   $result = $conn->query($queryFriendRequest);
                                   $row = $result->fetch_assoc();


                                   $queryFriendRequest2="SELECT * FROM friend WHERE f_source='$f_destination'
                                   AND f_destination='$f_source'";
                                   $result2 = $conn->query($queryFriendRequest2);
                                   $row2= $result2->fetch_assoc();
 

                                   if(!empty($row) || !empty($row2)){
                                      $f_result=$row["status"]."";
                                      $f_result2=$row2["status"]."";

                                      if($f_result=="request"){
                                        include "cancelFriendRequestButton.php";
                                     }
                                     elseif ($f_result2=="") {
                                        
                                     }
                                    elseif($f_result=="friend"){
                                       echo '<button type="button" class="btn btn-primary">Send Message</button>';
                                     }
                                     elseif ($f_result2=="") {
                                       
                                     }
                                   }
                                   // elseif($f_result=="" || $f_result2=="request"){
                                   //    include "cancelFriendRequestButton.php";
                                   // }
                                   else{
                                    include "friendRequestButton.php";
                                   }

                                  ?>
                                 
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-1">
         </div>
         <div class="verticalLine">
         </div>
         
         <div class="col-md-6">
            <div class="row">
               <div class="col-lg-12">
                  <h2 class="page-header" style="color: #2980B9"><?php echo $saveName." Friend List"; ?></h2>
               </div>
               <?php 
                  $f_destination="";
                  $queryGetFriend="SELECT * FROM friend where f_source='$userEmail'"; 
                  $result = $conn->query($queryGetFriend);
                  while($row = $result->fetch_assoc()) {
                     $f_destination=$row["f_destination"];


                     $queryRequestInfo="SELECT * FROM user WHERE
                      email='$f_destination'";

                     $result2 = $conn->query($queryRequestInfo);
                     while($row2 = $result2->fetch_assoc()){
                         $name=$row2["fname"]." ".$row2["lname"];
                         $ppname=$row2["ppname"];
                      

                ?>
               <div class="col-lg-4 col-sm-6 text-center">
                  <img class="img-circle img-responsive img-center" src=<?php echo "upload/".$ppname; ?> alt="profile pic">
                  <a href=<?php echo "user.php?search=".$f_destination; ?>> <h3><?php echo $name; ?>
                  </h3></a>
               </div>
              
              <?php 
                  }
                   }

               ?>
            </div>
         </div>
   </body>
</html>




