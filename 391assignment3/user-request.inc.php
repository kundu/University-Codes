<?php
    ob_start();
    session_start();
    if(empty($_SESSION["name"])){ 
        header("Location:index.php");
    }
    else{ 
    }
?>


<html>
    <head>
        <title>User-Admin</title>
        
        <link rel="stylesheet" href="css/style.css">
<!--        <link rel="stylesheet" href="css/mobile.css">-->
    </head>
    
    
    
 <script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
    }
</script>
 
<script>
    if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
        jQuery(function($){ //on document.ready
            $('#c_date').datepicker({
                minDate: "<?php echo $mydate;?>",  
            }); 
        })
    }
</script>
    
    
    <body>
    
<!--    <div class="wrapper">-->
        <?php
            require "database.php";
        
            $mydate=date("Y-m-d"); 
            
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                
                $statusUpdateQuerry="update appointment_table set status='done' where client_id='$id'";
                if($conn->query($statusUpdateQuerry)===true){
//                    echo " Updated ";
                }
                else{
                    echo " Not updated ";
                }
                
            } 
        
                $selectMechanicsQ="select * from mechanic_table";
                $result = $conn->query($selectMechanicsQ);
                while($row = $result->fetch_assoc()){
                    $name=$row['m_name'];
                    $username=$row['m_username'];
                    $m_info[$username]=$name;
                }


                $querryForAppointment="select * from appointment_table INNER JOIN client_table on appointment_table.client_id=client_table.id_auto ORDER BY appointment_table.status ASC";
                $result = $conn->query($querryForAppointment);
                    while($row = $result->fetch_assoc()){
                        echo '<div class="user_info">';
                        $id=$row["id_auto"];
                        $m_username=$row["m_username"];
                        $client_id=$row["client_id"];
                        $time= $row["time"];
                        $status=$row["status"];
                        
                        if($status==""){
                            $buttonName="Not deleveried";
                            $buttonUpdateClick="appointment_updateClick(".$id.")";
                            $buttonStatusClick="status_updateClick(".$id.")"; 
                            $buttonAbility="";
                            $buttonVisibility="";
                        }
                        else{
                            $buttonName="Deleveried";
                            $buttonAbility="disabled";
                            $buttonVisibility="hidden";
                            $buttonUpdateClick="";
                            $buttonStatusClick="";
                        }
 
                        $client_info="Name: ".$row["c_name"]."<br>"."Address: ".$row["c_address"]."<br>Phone: ".$row["c_phone"]."<br>Car License number: ".$row["c_c_lis"]."<br>"."Car Engine Number: ".$row["c_c_eng"];


            ?>
 
                    <p><?php echo $client_info;?></p> 
                    <p id="<?php echo "newDate".$id;?>"><?php echo "Date: ".$time?></p>
                    <input id="<?php echo "oldDate".$id;?>" hidden readonly value="<?php echo $time;?>">
                    
                    <p>Appointed Mechanic:</p>
                    <select id="<?php echo "selected_m".$id;?>" <?php echo $buttonAbility;?> onchange="<?php echo "sel_m($id);";?>">
                        <?php
                            $temp="";
                            foreach($m_info as $key=>$key_value){
                            if($m_username==$key){
                                $temp="selected";
                            }
                            else{
                                $temp="";
                            }
                        ?>
                        <option  value="<?php echo $key?>"  <?php echo $temp;?>> <?php echo $key_value;?> </option>
                        <?php

                            }
                        ?>
                    </select>
                    
                    <input type="date" id="<?php echo "c_date".$id;?>" class="c_date" onchange="<?php echo "dateChange($id);";?>" <?php echo $buttonVisibility;?>  min="<?php echo $mydate;?>">
                    
                    <button type="button" class="m-a-button" id="appoint_button" <?php echo $buttonVisibility;?> onclick="<?php echo $buttonUpdateClick;?>" >Mechanic or Date Change</button>

                    <button type="button" class="m-a-button" id="status_button" <?php echo $buttonAbility;?> onclick="<?php echo $buttonStatusClick;?>" ><?php echo $buttonName;?></button>
                    
                    <div  id="<?php echo "report".$id;?>"></div>
                    <?php
                        echo "</div>";
                        } 
                    ?>
        
            
<!--            <input type="date" id="c_date" class="c_date" onchange="dateChange();">-->
<!--        </div>   -->
        
    </body>
</html>