<?php

    require "database.php";
    if(isset($_GET["search"])){
        $search=$_GET["search"];
        $searchQuerry="SELECT client_table.id_auto ,appointment_table.status , appointment_table.time FROM client_table INNER JOIN appointment_table on client_table.id_auto=appointment_table.client_id and client_table.c_c_eng='$search' ORDER BY client_table.id_auto DESC Limit 1";
        
//        ORDER BY client_table.id_auto DESC Limit 1
        $result = $conn->query($searchQuerry);
        $row_cnt = $result->num_rows;
        if($row_cnt>0){
            while($row = $result->fetch_assoc()){
                $status= $row["status"];
                $time= $row["time"];
                
                if($status==""){
                    echo "Appointed: ".$time."<br>Work is going on";
                }
                else{
                    echo "Your car is delevaried";
                }
            }   
        }
        else{
            echo "No car available !!!!";
        }
    }
?>

 