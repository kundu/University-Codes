<?php
    require "database.php";

    if(isset($_GET["name"]) && isset($_GET["address"]) && isset($_GET["phone"]) && isset($_GET["lis"]) && isset($_GET["eng"]) && isset($_GET["appDate"]) && isset($_GET["m_username"])){
        $name=($_GET["name"]);
        $address=($_GET["address"]);
        $phone=($_GET["phone"]);
        $lis=($_GET["lis"]);
        $eng=($_GET["eng"]);
        $appDate=($_GET["appDate"]);
        $m_username=($_GET["m_username"]);
        
//        echo $name." ".$address." ".$phone." ".$lis." ".$eng." ".$appDate." ".$m_username; 
        
        $insertUserQuerry="insert into client_table values('','$name','$address','$phone','$lis','$eng')";
        
        if($conn->query($insertUserQuerry)===TRUE){
//            echo "inserted";
            $last_id = mysqli_insert_id($conn);
            
            $insertQuerryForClient="insert into appointment_table values('','$m_username','$last_id','$appDate','')";
            if($conn->query($insertQuerryForClient)===TRUE){
//                echo " inserted 2";
            }
            else{
                echo "no";
            }
            
        }
           else{
               echo "problem";
        } 
    }
    
        else{
            echo "problem";
        }
?>