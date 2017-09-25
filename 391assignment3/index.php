<html>
    <head>
        <title>Home</title>
        
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/mobile.css">
    </head>
    
    <?php
        $mydate=date("Y-m-d"); 
        
//        $yesterday=date("Y-m-d",strtotime("-1 days"));
//        echo $yesterday;
    ?>
    
    <script type="text/javascript">
        var mechanicAndUnsername=[];
        var okayForUser=false;
        var okayForUser2=false;
//        var todayDate = Date();
//        todayDate=todayDate.getFullYear()+"-"+todayDate.getMonth+"-"+todayDate.getDate();
//        document.getElementById("a_date").innerHTML=todayDate;
        var saveMechanicCode="";
        function userClick(mechanicNameCode){
            saveMechanicCode=mechanicNameCode;
            document.getElementById("user-header").innerHTML="Book "+mechanicAndUnsername[mechanicNameCode]; 
            
            document.getElementById("c_eng").value="";
                    document.getElementById("c_date").value="";
            
            document.getElementById("user-book-panel").style.display="block";
        }
        
        function closeUserBookClick(){
            document.getElementById("user-book-panel").style.display="none";
        }
        
        function confirmUserBookClick(){
            var save=new Date (document.getElementById("c_date").value);
            u_date=save.getDate()+"-"+(save.getMonth()+1)+"-"+save.getFullYear();
            
            var c_name=document.getElementById("c_name").value;
            var c_address=document.getElementById("c_address").value;
            var c_phone=document.getElementById("c_phone").value;
            var c_lis=document.getElementById("c_lis").value;
            var c_eng=document.getElementById("c_eng").value; 
            
            
            if(document.getElementById("date_status").innerHTML!=""){  
                okayForUser2=false;
            }
            else{
                okayForUser2=true; 
            }
            
            if(document.getElementById("eng_status").innerHTML!=""){  
                okayForUser=false;
            }
            else{
                okayForUser=true;
            }
            
            
            
            if(c_name!="" && c_address!="" && c_phone!="" && c_lis!="" && c_eng!="" && okayForUser && okayForUser2){ 
            
                var theFile="user-add.inc.php?name="+c_name+"&address="+c_address+"&phone="+c_phone+"&lis="+c_lis+"&eng="+c_eng+"&appDate="+u_date+"&m_username="+saveMechanicCode; 

                if(window.XMLHttpRequest){
                        xmlhttp=new XMLHttpRequest();
                    }
                    else{
                        xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
                    }

                    xmlhttp.onreadystatechange=function(){
                        if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("temp").innerHTML=xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open('POST',theFile,true);
                    xmlhttp.send();
                
                if(document.getElementById("temp").innerHTML!=""){
                    alert("problem")
                }
                else{
                    alert("Inserted");
                    
                    document.getElementById("c_name").value="";
                    document.getElementById("c_address").value="";
                    document.getElementById("c_phone").value="";
                    document.getElementById("c_lis").value="";
                    document.getElementById("c_eng").value="";
                    document.getElementById("c_date").value="";

                    document.getElementById("user-book-panel").style.display="none";
                }
            }
            else{
                alert("Fill all the fields properly")
            }
            
        }
        
        function eng_key_up_click(){  
            var c_eng=document.getElementById("c_eng").value;
            var theFile="car-status.inc.php?eng="+c_eng;
            
            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            else{
                xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
            }

            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("eng_status").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('POST',theFile,true);
            xmlhttp.send();
            
            
        }
        
        function dateChange(){
            var save=new Date (document.getElementById("c_date").value);
            u_date=save.getDate()+"-"+(save.getMonth()+1)+"-"+save.getFullYear();
            
            
            var theFile="car-status.inc.php?theDate="+u_date+"&m_code="+saveMechanicCode;
//            document.getElementById("eng_status").innerHTML=theFile;
            
            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            else{
                xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
            }

            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("date_status").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('POST',theFile,true);
            xmlhttp.send(); 
        }
        
        
        function search_key_up_click(){
//            alert("okay");
            search=document.getElementById("searchText").value;
//            alert(search);
            
            if(search!=""){
                var theFile="sugg.inc.php?search="+search;



                if(window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                }
                else{
                    xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
                }

                xmlhttp.onreadystatechange=function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("search_result").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open('POST',theFile,true);
                xmlhttp.send(); 
            }
            else{
                document.getElementById("search_result").innerHTML="";
            }
        }
        
        
    </script>
    
    
    
    
<!--    date script-->
    
    
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
    
    
    
    <body style='background: url("image/b1.jpg") no-repeat center center fixed;background-size: cover;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;'>
        
        <div class="wrapper">
            <div class="header-panel">
                <h1>Workshop</h1>
            </div>

            <div class="body-panel">
                <div class="menu-panel">
                    
                    <input id="searchText" type="text" onkeyup="search_key_up_click();" placeholder="Your car engine no ..." list="suggestions">
                    
                    
 
                    
                </div>
                
                <div id="search_result"></div>
                
                <div class="mechanic-name-panel">
                     
                     <?php
                        include "database.php";
                        $selectMechanicsQ="select * from mechanic_table";
                        $result = $conn->query($selectMechanicsQ);
                        while($row = $result->fetch_assoc()){
                            $name=$row['m_name'];
                            $address=$row['m_address'];
                            $phone=$row['m_name']; 
                            $username=$row['m_username']; 
                            $buttonName="userClick('$username');";
                    ?>
                    
                    <script type="text/javascript">
                        mechanicAndUnsername["<?php echo $username;?>"]="<?php echo $name;?>";
//                        mechanicAndUnsername["kuu"]="lol";
                    </script>
                    <div class="mechanics">
                        <p>Name : <?php echo $name;?></p>
                        <p>Address : <?php echo $address;?></p>
                        <p>Phone : <?php echo $phone;?></p>
                        <input type="button" value="<?php echo 'Book '.$name;?>" onclick=<?php echo $buttonName;?>>
                    </div>
                    <?php
                      }
                    ?>
                </div>
                
                <div class="user-book-panel" id="user-book-panel">
                    <button class="user-close-button" type="button"  onclick="closeUserBookClick();" >X</button>
                    <h1 id="user-header"></h1>    
                    <label>Name : </label>
                    <input type="text"  id="c_name">
                    <label>Address : </label>
                    <input type="text"  id="c_address">
                    <label>Phone</label>
                    <input type="text"  id="c_phone">
                    <label>Car license no : </label>
                    <input type="text"  id="c_lis">
                    <label>Car engine no :</label>
                    <input type="text" id="c_eng" onkeyup="eng_key_up_click();">
                    <p id="eng_status"></p>
                    <input id="c_date"  type="date" onchange="dateChange();"  min="<?php echo $mydate;?>"> 
                    <p id="date_status"></p>
                    <button class="user-button" onclick="confirmUserBookClick();" >Get Appointment</button> 
                </div>
                
                <div id="temp"></div>
                
            </div>
            
            <div class="footer-panel">
                <a class="m-a-button" href="admin-panel.php">Admin Panel</a>
            </div>
        </div>
    </body>
</html>