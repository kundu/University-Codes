<?php 
require_once "code.php";
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
      
      <!-- Navigation Menu Bar ends -->
      <!-- Profile Info Bar starts -->
      
         <div class="col-md-3">
            <h2 style= "padding-top: 6%; color: #2980B9"><?php echo "Hello ".$user_gender_def.$user_lName; ?></h2>
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
                        <form class="form-horizontal" action="profile.php" method="POST" enctype="multipart/form-data">
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
                              <label for="inputName" class="col-sm-2 control-label">Works at</label>
                              <div class="col-sm-10">
                                 <input type="Name" class="form-control" id="inputName"  placeholder="Name"
                                    value='<?php echo $user_work; ?>' name="user_work">
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
                              <label for="inputName" class="col-sm-2 control-label">Lives at</label>
                              <div class="col-sm-10">
                                 <input type="Name" class="form-control" id="inputName"  placeholder="Name"
                                    value='<?php echo $user_live; ?>' name="user_live">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Mobile Number</label>
                              <div class="col-sm-10">
                                 <input type="Name" class="form-control" id="inputName"  placeholder="Name"
                                    value='<?php echo $user_phone; ?>' name="user_phone">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Email Address</label>
                              <div class="col-sm-10">
                                 <input type="Name" class="form-control" id="inputName" required placeholder="Name"
                                    value=<?php echo $user_email; ?> readonly>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Birthday</label>
                              <div class="col-sm-10">
                                 <input type="Name" class="form-control" id="inputName"  placeholder="Name"
                                    value='<?php echo $user_birth; ?>' name="user_birth">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Gender</label>
                              <div class="col-sm-10">
                                 <input type="Name" class="form-control" id="inputName" required placeholder="Name"
                                    value='<?php echo $user_gender; ?>' name="user_gender">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputAddress" class="col-sm-2 control-label">About You</label>
                              <div class="col-sm-10">
                                 <textarea id="txtArea" class="form-control" rows="5" cols="100" name="user_about"><?php echo $user_about; ?></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Upload Profile Picture</label>
                              <div class="col-sm-10">
                                 <input type="file" name="file" class="text-center center-block well well-sm">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                 <button type="submit" class="btn btn-primary" name="updateClick">Update</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
        
      
   </body>
</html>


<?php 
//    if (isset($_POST['updateClick'])) {
//       $user_fName=$_POST['user_fname'];
//       $user_lName=$_POST['user_lname'];
//       $user_work=$_POST['user_work'];
//       $user_study=$_POST['user_study'];
//       $user_live=$_POST['user_live'];
//       $user_phone=$_POST['user_phone'];
//       $user_birth=$_POST['user_birth'];
//       $user_gender=$_POST['user_gender'];
//       $user_about=$_POST['user_about'];

//       $size=$_FILES['file']['size'];
//       $type=$_FILES['file']['type'];
//       $name=$userEmail.".jpeg";
//       $temp=$_FILES['file']['tmp_name'];
//       $location="upload/";

//       if($size!=0){


//          if($type=="image/jpeg" &&  move_uploaded_file($temp, $location.$name)){
//              $update_querry="UPDATE user SET fname='$user_fName',lname='$user_lName',
//              works='$user_work',studies='$user_study',live='$user_live',
//              mobile='$user_phone',birthday='$user_birth',gender='$user_gender',
//              about='$user_about',ppname='$name' WHERE email='$userEmail'";


//             if($conn->query($update_querry)===true){
//                   echo "updated and uploaded";
//                   // header("Location:profile.php");
//               }
//               else{
//                echo "not updated and uploaded";
//               }
//          }
//          else{
//             echo "! uploaded";
//          }
//       }

//       else{
//          $update_querry="UPDATE user SET fname='$user_fName',lname='$user_lName',
//           works='$user_work',studies='$user_study',live='$user_live',
//           mobile='$user_phone',birthday='$user_birth',gender='$user_gender',
//           about='$user_about' WHERE email='$userEmail'";


//          if($conn->query($update_querry)===true){
//                echo "updated";
//                // header("Location:profile.php");
//            }
//            else{
//             echo "not updated";
//            }
//       }
//    }
 ?>