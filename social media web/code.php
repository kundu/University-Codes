<?php 
  $status = session_status();
  
  if($status == PHP_SESSION_NONE){
    session_start();
  }
   include 'database.php';

   $user_fName=$user_lName=$user_work=$user_study=$user_live=$user_phone=
   $user_email=$user_birth=$user_gender=$user_about=$user_ppName=$user_gender_def="";
   
  
   if(isset($_SESSION["name"])){ 
      $userEmail = $_SESSION["name"];
      $get_User_info_querry="SELECT * FROM user WHERE email='$userEmail'";
      $result = $conn->query($get_User_info_querry);
      $row = $result->fetch_assoc();
      if(!empty($row)){ 
        $user_fName=$row['fname'];
        $user_lName=$row['lname'];
        $user_work=$row['works'];
        $user_study=$row['studies'];
        $user_live=$row['live'];
        $user_phone=$row['mobile'];
        $user_email=$row['email'];
        $user_birth=$row['birthday'];
        $user_gender=$row['gender'];
        $user_about=$row['about'];
        $user_ppName=$row['ppname']; 


        if($user_gender=="Male"){
         $user_gender_def="Mr. ";
        }
        else{
         $user_gender_def="Miss ";
        }
      }
      else{
         echo "Sorry !!!!!!";
      }
   }
   else{
      header("Location:index.php");
   }
   ?>


   <?php 
   if (isset($_POST['updateClick'])) {
      $user_fName=$_POST['user_fname'];
      $user_lName=$_POST['user_lname'];
      $user_work=$_POST['user_work'];
      $user_study=$_POST['user_study'];
      $user_live=$_POST['user_live'];
      $user_phone=$_POST['user_phone'];
      $user_birth=$_POST['user_birth'];
      $user_gender=$_POST['user_gender'];
      $user_about=$_POST['user_about'];

      $size=$_FILES['file']['size'];
      $type=$_FILES['file']['type'];
      $name=$userEmail.".jpeg";
      $temp=$_FILES['file']['tmp_name'];
      $location="upload/";

      if($size!=0){

         // echo '<script language="javascript">
         // alert("1.")
         // </script>'; 

          if(file_exists("upload/".$name)){
            // echo "exist";
         // if(unlink(urldecode("upload/".$name))){
         //    echo "Deleted";
         // }
         // else{
         //    echo "not";
         // }
       }
       else{
        echo "no exist";
       }

         
         if(move_uploaded_file($temp, $location.$name)){
             $update_querry="UPDATE user SET fname='$user_fName',lname='$user_lName',
             works='$user_work',studies='$user_study',live='$user_live',
             mobile='$user_phone',birthday='$user_birth',gender='$user_gender',
             about='$user_about',ppname='$name' WHERE email='$userEmail'";


            if($conn->query($update_querry)===true){
                  // echo "updated and uploaded";
                  // header("Location:profile.php");
              }
              else{
               echo "not updated";
              }
         }
         else{
            // echo "! uploaded";
         }
      }

      else{

        // echo '<script language="javascript">
        //  alert("2.")
        //  </script>';


         $update_querry="UPDATE user SET fname='$user_fName',lname='$user_lName',
          works='$user_work',studies='$user_study',live='$user_live',
          mobile='$user_phone',birthday='$user_birth',gender='$user_gender',
          about='$user_about' WHERE email='$userEmail'";


         if($conn->query($update_querry)===true){
               // echo "updated";
               // header("Location:profile.php");
           }
           else{
            echo "not updated";
           }
      }
   }
 ?>