<?php
    require "database.php";
    if(isset($_GET["eng"])){
        $eng=$_GET["eng"];
        $save="";
        $check="select appointment_table.time from appointment_table where appointment_table.client_id in(select client_table.id_auto as pop from client_table where client_table.c_c_eng='$eng' and status='')";
        $result = $conn->query($check);
        while($row = $result->fetch_assoc()){
            $save= $row['time'];
        }
        if($save==""){
            
        }
        else{
            echo "This car has already appointed on ".$save; 
        }
    }
        
        
    elseif(isset($_GET["theDate"]) && isset($_GET["m_code"])){
        $theDate=$_GET["theDate"];
        $m_code=$_GET["m_code"];
//        echo $theDate." ".$m_code;
        
        $availableQuerry="select status from appointment_table where m_username='$m_code' and time='$theDate'";
        $result = $conn->query($availableQuerry);
        $row_cnt = $result->num_rows;
        if($row_cnt>=4){
            echo "No appointment on ".$theDate."<br>Chose another date.";
        }
        else{
//            echo "okay";
        }
    }
    else{
        
    }
?>