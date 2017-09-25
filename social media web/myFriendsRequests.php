<?php 
    
    $user="";
    require_once "database.php";
    if(!isset($_SESSION["name"])){
        header("Location:index.php");
    }
    else{ 
        $user=$_SESSION["name"];
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





<!-- Profile Info Bar starts -->



      


<div class="col-md-6">
         <div class="row">
            <div class="col-lg-12">

            <h1 class="page-header" style="color: #2980B9">Friend Requests</h1>


            <div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>User</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $temp="request";
                                    $f_source="";
                                    $queryRequest="SELECT * FROM friend WHERE
                                     f_destination='$user' AND status='$temp'";

                                    $result = $conn->query($queryRequest);
                                    while($row = $result->fetch_assoc()){
                                    $f_source = $row["f_source"];

                                     $queryRequestInfo="SELECT * FROM user WHERE
                                     email='$f_source'";

                                    $result2 = $conn->query($queryRequestInfo);
                                    while($row2 = $result2->fetch_assoc()){
                                        $name=$row2["fname"]." ".$row2["lname"];
                                        $ppname=$row2["ppname"];
                                ?>

                                <tr>
                                    <td>
                                        <img src=<?php echo "upload/".$ppname; ?> alt="img">
                                        <a href=<?php echo "user.php?search=".$f_source; ?> class="user-link"><?php echo $name ; ?></a>
                                        
                                    </td>
                                    
                                    <td style="width: 20%;">
                                        <form method="POST" action="">
                                                <input type="text" value=<?php echo $f_source; ?> name="f_source" hidden></input>
                                                <button type="submit" class="btn btn-success" name="confirm">Confirmm</button>
                                            
                                                <button type="submit" class="btn btn-danger" name="delete">Deletee Request</button>
                                            
                                        </form>
                                    </td>
                                </tr>

                                <?php 
                                        }
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



















</div>






   </body>
</html>