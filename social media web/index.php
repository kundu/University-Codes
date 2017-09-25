<?php 
  session_start();
  if(isset($_SESSION["name"])){ 
      header("Location:profile.php");
  } 

?>


<?php 
  

  include "database.php"; 
  if(isset($_POST["signinClicked"])){
    $b=true;
    $email=$_POST["user_signin_name"];
    $password=$_POST["user_signin_password"];
    echo $email." - ".$password."<br>";
    $querry="SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($querry);
    $row = $result->fetch_assoc();
    if(!empty($row)){ 
     $_SESSION["name"]=$row['email']; 
      header("Location:profile.php");
    }
    else{ 
      echo "wrong passoword or email id";
    }
 
  }


 ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Wired</title>
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/animate.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="css/overwrite.css">
      <script src="js/modernizr.js"></script>
      <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      </header><!-- end of header section -->
      <!-- banner section starts here -->
      <section class="banner" id="home">
         <div class="container">
            <div class="row">
               <div class="col-xs-6 wow fadeInLeft animated">
                  <h3>It's free and always will be.</h3>
                  <h1>Welcome to WIRED!</h1>
                  <p>Wired helps you connect and share with the people in at BRAC University. You can look for thesis partner or find other students in your campus with similar interests.</p>
                  <button class="features-btn">Get started today!</button>
               </div>
               <div class="col-xs-6 banner-img wow fadeInRight animated">
                  <img class="img-responsive" src="img/brac_logo.png" alt="">
               </div>
            </div>
         </div>
      </section>
      <!-- end of banner section -->
      <a href='#form'></a>
      <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-4">
            <div class="form-main banner-img wow fadeInLeft animated">
               <h5>Have an account?</h5>
               <h2>Join In!</h2>
               <form class="form-horizontal" action="index.php" method="POST">
                  <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Email Address</label>
                     <div class="col-sm-10">
                        <input type="Name" class="form-control" id="inputName" required placeholder="Name" name="user_signin_name">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Password</label>
                     <div class="col-sm-10">
                        <input type="Password" class="form-control" id="inputName" required placeholder="Name" name="user_signin_password">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="signinClicked">Sign In</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-main banner-img wow fadeInRight animated">
               <h5>Don't have an account?</h5>
               <h2>Get Started!</h2>
               <form class="form-horizontal" action="index.php" method="POST">
                  <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">First name</label>
                     <div class="col-sm-10">
                        <input type="Name" class="form-control" id="inputName" required placeholder="Name" name="user_fName">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Last name</label>
                     <div class="col-sm-10">
                        <input type="Name" class="form-control" id="inputName" required placeholder="Name" name="user_lName">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="inputNumber" class="col-sm-2 control-label">Mobile Number</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNumber" placeholder="Phone Number" name="user_phone">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Email Address</label>
                     <div class="col-sm-10">
                        <input type="Name" class="form-control" id="inputName" required placeholder="Name" name="user_email">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Password</label>
                     <div class="col-sm-10">
                        <input type="Name" class="form-control" id="inputName" required placeholder="Name" name="user_password">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="inputAppointmentDate" class="col-sm-2 control-label">Birthday</label>
                     <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputAppointmentDate" placeholder="AppointmentDate" name="user_birthday">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="inputAppointmentDate" class="col-sm-2 control-label">Gender</label>
                     <div class="col-sm-10">
                        




                        <select name="user_gender" class="form-control">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
                     </div>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" name="signupClick">Sign Up</button>
                  </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-md-2"></div>
      </div>
      <!-- script tags
         ============================================================= -->
      <script src="js/jquery-2.1.1.js"></script>
      <script src="js/smoothscroll.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/wow.js"></script>
      <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
      <script src="js/gmaps.js"></script>
      <script>
         var map = new GMaps({
           el: '#map',
           lat: -12.043333,
           lng: -77.028333
         });
      </script>
   </body>
</html>


<?php 
  if (isset($_POST["signupClick"])) {
    $email=$_POST["user_email"];
    if(emailIsOkay($email)){
      $user_fname=$_POST["user_fName"];
      $user_lname=$_POST["user_lName"];
      $user_phone=$_POST["user_phone"];
      $user_email=$_POST["user_email"];
      $user_password=$_POST["user_password"];
      $user_birthday=$_POST["user_birthday"];
      $user_gender=$_POST["user_gender"];

      $user_insert_query="INSERT INTO user VALUES('','$user_fname','$user_lname','','','',$user_phone,'$user_email','$user_password','$user_birthday',
      '$user_gender','','')";

      if($conn->query($user_insert_query)===TRUE ){
         echo '<script language="javascript">
         alert("Your account has been succesffuly created!")
         </script>';
         
      }
      else{
         echo '<script language="javascript">
         alert("Not inserted")'.mysql_error().'
         </script>';
      }
    }

    else{
      echo "email is not okay";
    }
  }


  function emailIsOkay($email){ 
    include "database.php";
    $querry="SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($querry);
    $row = $result->fetch_assoc();
    if(empty($row)){
      return true;
    }
    else{
      return false;
    }
  }
 ?>

 