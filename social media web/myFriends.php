<?php 
include 'code.php';
require_once "database.php";
   $user="";
if(isset($_SESSION["name"])){ 
      $user=$_SESSION["name"];
}
else{
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
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
</head>
<body>


  <div class="col-md-6">
            <div class="row">
               <div class="col-lg-12">
                  <h2 class="page-header" style="color: #2980B9">My Friends</h2>
               </div>
               <?php 
                  $f_destination="";
                  $queryGetFriend="SELECT * FROM friend where f_source='$user'"; 
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
      </div>
</body>
</html>