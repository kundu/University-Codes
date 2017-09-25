<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Photos</title>
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
         
         <?php include "myProfile.php" ?>

         <div class="col-md-1">
         </div>
         <div class="verticalLine">
         </div>
         
          <?php include "myPhotos.php" ?>
      </div>







   </body>
</html>