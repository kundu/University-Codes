<?php
    ob_start();
    session_start();
    if(empty($_SESSION["name"])){ 
        header("Location:index.php");
    }
    else{ 
    }
?>


<?php
    require "database.php";
     
     if(isset($_GET["new_id"]) && isset($_GET["m_id"]) && isset($_GET["date"])){
            $id = $_GET["new_id"];
            $m_id = $_GET["m_id"];
            $date = $_GET["date"];

            $statusUpdateQuerry="update appointment_table set m_username='$m_id' , time='$date' where client_id='$id'";
            if($conn->query($statusUpdateQuerry)===true){
                    echo " Updated ";
            }
            else{
                echo " Not updated ";
            }

        }
        
?>