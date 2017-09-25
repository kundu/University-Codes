<?php
    ob_start();
    session_start();
    if(empty($_SESSION["name"])){ 
        header("Location:login.php");
    }
    else{ 
    }
?>




<html>
    <head>
        <title>Admin Panel</title>
        
        <link rel="stylesheet" href="css/style.css">
<!--        <link rel="stylesheet" href="css/mobile.css">-->
    </head>
    
    <script type="text/javascript">
        
        var allOkay=false;
        function mechanic_ading_panel_click(){
            document.getElementById("user-admin-panel").style.display="none";
            document.getElementById("mechanic-adding-panel").style.display="block"; 
        }
        
         function admin_check_click(){
            document.getElementById("mechanic-adding-panel").style.display="none";
            document.getElementById("user-admin-panel").style.display="block"; 
             
            theFile="user-request.inc.php"
            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            else{
                xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
            }

            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("user-admin-panel").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('POST',theFile,true);
            xmlhttp.send();
        }
        
        function insert_mechanic_click(){
            var name=stripBlank(document.getElementById("m-name").value);
            var address=stripBlank(document.getElementById("m-address").value);
            var phone=stripBlank(document.getElementById("m-phone").value);
            var username=stripBlank(document.getElementById("m-username").value);
            
            if(name !="" && address !="" && phone !="" && username !="" && allOkay){
                var theFile="mechanic-add.inc.php?name="+name+"&address="+address+"&phone="+phone+"&username="+username; 
                
                document.getElementById("m-name").value="";
                document.getElementById("m-phone").value="";
                document.getElementById("m-address").value="";
                document.getElementById("m-username").value="";
                
                if(window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                }
                else{
                    xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
                }

                xmlhttp.onreadystatechange=function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("userNameDiv").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open('POST',theFile,true);
                xmlhttp.send();
                
            }
            else{
                document.getElementById("userNameDiv").innerHTML="Try to fill all";
            } 
        }
        
        function keyDownFunctionForUsername(){ 
            var username=stripBlank(document.getElementById("m-username").value);
            if(username.indexOf(' ') >= 0){
                allOkay=false;
                document.getElementById("userNameDiv").innerHTML="Space";
            }
            else{
                var theFile="username-check.inc.php?username="+username;
                if(window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                }
                else{
                    xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
                }

                xmlhttp.onreadystatechange=function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("userNameDiv").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open('POST',theFile,true);
                xmlhttp.send();
                
                
                if((document.getElementById("userNameDiv").innerHTML)=="username available."){
                    allOkay=true;    
                }
                else{
                    allOkay=false;
                }
            }
        }
        
        function mechanic_details(){
            var x = document.getElementById("mechanic_name_select");
            var i = x.selectedIndex;
            var username = x.options[i].value;
            
            
            
            var theFile="mechanic-detail.inc.php?username="+username;  

            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            else{
                xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
            }

            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("mechanic_detail").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('POST',theFile,true);
            xmlhttp.send();
            
        }
        
        function updateClick(){
            var name=document.getElementById("m-u-name").value;
            var address=document.getElementById("m-u-address").value;
            var phone=document.getElementById("m-u-phone").value;
            var username=document.getElementById("m-u-username").value;
            
            
            var theFile="mechanic-update.inc.php?name="+name+"&address="+address+"&phone="+phone+"&username="+username;  
            name="";
            address="";
            phone="";
            username="";
                if(window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                }
                else{
                    xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
                }

                xmlhttp.onreadystatechange=function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("updateDiv").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open('POST',theFile,true);
                xmlhttp.send();
            
        }
        
        function status_updateClick(id){
            document.getElementById("mechanic-adding-panel").style.display="none";
            document.getElementById("user-admin-panel").style.display="block"; 
             
            theFile="user-request.inc.php?id="+id;
            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            else{
                xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
            }

            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("user-admin-panel").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('POST',theFile,true);
            xmlhttp.send();
        }
        
        
        function appointment_updateClick(id){
            
            if(document.getElementById("report"+id).innerHTML==""){  
                
                var temp="selected_m"+id;
                var x = document.getElementById(temp);
                var i = x.selectedIndex;
                var username = x.options[i].value;

                var temp="c_date"+id;
                if(document.getElementById(temp).value!=""){
                    var save=new Date (document.getElementById(temp).value);
                    var u_date=save.getDate()+"-"+(save.getMonth()+1)+"-"+save.getFullYear();
//                    alert(u_date);
                }
                else{
                    var u_date=(document.getElementById("oldDate"+id).value);
                }
             
                theFile="apointment-update.inc.php?new_id="+id+"&m_id="+username+"&date="+u_date; 
                
                document.getElementById("report"+id).innerHTML="Updating ......"
                
                if(window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                }
                else{
                    xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
                }

                xmlhttp.onreadystatechange=function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("report"+id).innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open('POST',theFile,true);
                xmlhttp.send();
                
                document.getElementById("newDate"+id).innerHTML="Date: "+u_date;
                
            }
            else{
//                okayForUser2=true; 
            }
            
        }
        
        function checkSlot(id){
            
            var temp="selected_m"+id;
            var x = document.getElementById(temp);
            var i = x.selectedIndex;
            var username = x.options[i].value;
//            alert(username);
             
            var temp="c_date"+id;
//            alert(temp);
            if(document.getElementById(temp).value!=""){
                var save=new Date (document.getElementById(temp).value);
//            alert(save);
                var u_date=save.getDate()+"-"+(save.getMonth()+1)+"-"+save.getFullYear();
    //            
//                alert(u_date);
            }
            else{
                var u_date=(document.getElementById("oldDate"+id).value);
            }
            
            
            
            var theFile="car-status.inc.php?theDate="+u_date+"&m_code="+username;
//            document.getElementById("eng_status").innerHTML=theFile;
            
            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            else{
                xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
            }

            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById("report"+id).innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('POST',theFile,true);
            xmlhttp.send(); 
            
        }
        
        function dateChange(id){
            checkSlot(id);
        }
        
        function sel_m(id){
            checkSlot(id);
        }
        
        function stripBlank(get){
            var text=get;
            var arrayOfStrings = text.split("\n");  
            var save="";
            
            for (var i=0; i<arrayOfStrings.length; i++){
                arrayOfStrings[i]=arrayOfStrings[i].trim();
            } 
            
            for (var i=0; i<arrayOfStrings.length; i++){
                if(i<arrayOfStrings.length-1){
                    save =save+arrayOfStrings[i] +"\n";
                }
                else{
                    save =save+arrayOfStrings[i];
                }
            } 
            save=save.replace(/(^[ \t]*\n)/gm, "");
            return save;
        }
    </script>
    
    <body >
        
<!--        style='background: url("image/b2.jpg") no-repeat center center fixed;background-size: cover;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;'-->
        
        
        
        <div class="wrapper">
            <div class="header-panel">
            </div>
            <div class="menu-panel-for-admin">
                <a class="m-a-button" href="index.php">Home</a>
                <button class="m-a-button" onclick="mechanic_ading_panel_click();">Mechanic</button>
                <button class="m-a-button" onclick="admin_check_click();">Admin</button>
                
                <a class="m-a-button" href="logout.php">Log out</a>
                
                
            </div>
            <div class="mechanic-adding-panel" id="mechanic-adding-panel">
                <h2>Add Mechanic</h2>
                <form>
                    <label>Name</label>
                    <input type="text" id="m-name" value="">
                    <label>Address</label>
                    <input type="text" id="m-address" value="">
                    <label>Phone</label>
                    <input type="text" id="m-phone" value="">
                    <label>Username</label>
                    <input type="text" id="m-username" value="" onkeyup="keyDownFunctionForUsername()">
                    <p id="userNameDiv"></p>
                    <input class="m-a-button" type="button" onclick="insert_mechanic_click();" value="Add Mechanic">
                </form>
                
                
                
                
                <div class="all-mechanic-name-admin" id="all-mechanic-name-admin">
                    <h2>Mechanic Info & Update </h2>
                    <select id="mechanic_name_select" onchange="mechanic_details()">
                    <?php
                        include "database.php";
                        $selectMechanicsQ="select * from mechanic_table";
                        $result = $conn->query($selectMechanicsQ);
                        while($row = $result->fetch_assoc()){
                            $name=$row['m_name'];
                            $address=$row['m_address'];
                            $phone=$row['m_name'];
                            $admin=$row['added_admin'];
                            $username=$row['m_username']; 
                    ?>
                    
                        <option value=<?php echo $username;?>><?php echo $name;?></option> 

                     <?php
                      }
                    ?>
                        </select>
                    
                    <div id="mechanic_detail"></div>
                </div>
            </div>
            <div class="user-admin-panel" id="user-admin-panel"> 
            </div>
        </div>
    </body>
</html>


