<?php
    error_reporting(0);

    ob_start(); 
    session_start();

    $su_name="Sign in";
    $su_link="signup.php";

    $li_name="Log in";    
    $li_link="login.php";
    

    if(!empty($_SESSION["name"])){ 
        $su_name=$_SESSION["name"];
        $su_link="user.php";
        
        $li_name="Log out";
        $li_link="logout.php";
    }
    else{ 
        $su_name="Sign up";
        $su_link="signup.php";

        $li_name="Log in";    
        $li_link="login.php";
    }

?>




<div class="header_panel">
            <h1>Music Fun</h1>
</div>

<div class="menu_panel">
    <ul class="nav">
        <li><a href="http://localhost:8082/yash">Home</a></li> 
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="<?php echo $su_link;?>"/><?php echo $su_name;?></a></li>
        <li><a href="<?php echo $li_link;?>"/><?php echo $li_name;?></a></li>
    </ul>
</div>