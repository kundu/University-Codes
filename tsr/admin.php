<?php 

	session_start();
    if(!empty($_SESSION["name"]) && ($_SESSION["name"]=="admin")){ 
    	
    }
    else { 
        header("Location:index.php");
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | TSR.COM</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<!-- base style st -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="stylesheet" type="text/css" href="css/mobile.css"> 
</head>

	<script type="text/javascript">
		function classPanelShow(){
			
			document.getElementById("subject_panel").style.display="none";
			document.getElementById("class_panel").style.display="block";

			theFile="classPanel.inc.php";
			// alert(theFile);
        	theDiv="class_panel"; 

            if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}
			else{
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById(theDiv).innerHTML=xmlhttp.responseText;

				}
			}

			xmlhttp.open('GET',theFile,true);
			xmlhttp.send(); 

			
  
		}

		function subjectPanel(){ 

			document.getElementById("class_panel").style.display="none";
			document.getElementById("subject_panel").style.display="block";


			theFile="subjectPanel.inc.php";
			// alert(theFile);
        	theDiv="subject_panel"; 

            if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}
			else{
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById(theDiv).innerHTML=xmlhttp.responseText;

				}
			}

			xmlhttp.open('GET',theFile,true);
			xmlhttp.send(); 
		}

		function addSubjectClick(){
			var classID=document.getElementById("classForSubject").value;
			var subject=document.getElementById("subject_name").value;

			theFile="subjectPanel.inc.php?subject="+subject+"&class_id="+classID;
			// alert(theFile);
        	theDiv="subject_panel"; 

            if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}
			else{
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById(theDiv).innerHTML=xmlhttp.responseText; 
				}
			}

			xmlhttp.open('GET',theFile,true);
			xmlhttp.send(); 

			// subjectPanel();
		}


		function classChangeForSeeingSubject(){
			var classID=document.getElementById("seeClassForSubject").value;
			// document.write(classID);
			document.getElementById("class_panel").style.display="none";
			document.getElementById("subject_panel").style.display="block";


			theFile="seeClassInAjax.inc.php?classIdToSeeTheSubjects="+classID;
			// alert(theFile);
        	theDiv="subjectsList"; 

            if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}
			else{
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById(theDiv).innerHTML=xmlhttp.responseText;

				}
			}

			xmlhttp.open('GET',theFile,true);
			xmlhttp.send(); 
		}


		function deleteButtonSubjectCLick(subjectID ){


			// var classID=document.getElementById("seeClassForSubject").value;
			  
			document.getElementById("class_panel").style.display="none";
			document.getElementById("subject_panel").style.display="block";


			theFile="seeClassInAjax.inc.php?deleteSubjectID="+subjectID;
			// alert(classID);
        	theDiv="subjectsList";
        	alert("Deleted");

            if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}
			else{
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById(theDiv).innerHTML=xmlhttp.responseText;

				}
			}

			xmlhttp.open('GET',theFile,true);
			xmlhttp.send();

			classChangeForSeeingSubject();
		}


		function classSubmitClick(){
			var className=document.getElementById("className").value;
			theDiv="class_panel"; 
			if(className!=""){
				theFile="classPanel.inc.php?class="+className;
				// alert(theFile);
	        	

	            if(window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}
				else{
					xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
				}

				xmlhttp.onreadystatechange=function(){
					if(xmlhttp.readyState==4 && xmlhttp.status==200){
						document.getElementById(theDiv).innerHTML=xmlhttp.responseText; 
					}
				}

				xmlhttp.open('GET',theFile,true);
				xmlhttp.send(); 
			}
			else{
				alert("Fill it properly");
			}
		}


		function deleteCLassClick(){
			var classDelete = document.getElementById("classForDelete").value;

 
			theFile="classPanel.inc.php?id="+classDelete; 
        	theDiv="class_panel"; 

            if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}
			else{
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById(theDiv).innerHTML=xmlhttp.responseText;

				}
			}

			xmlhttp.open('GET',theFile,true);
			xmlhttp.send();  
		}
	</script>
<body>


	<div class="container">

		<div class="header-panel">
	    		<div class="row">

	    			<div class="welcome-note col-lg-2 col-md-2 col-sm-3 col-xs-12">
	    				<p>Welcome !!!!</p>	
	    			</div>

					<div class="header-text col-lg-8 col-md-8 col-sm-6 col-xs-12">
	    				<h2>TSR.COM</h2>	
	    			</div>	    			

			        <div id="myBtn" class="admin-link col-lg-2 col-md-2 col-sm-3 col-xs-12">
			        	
                        
                         <?php
                            if(empty($_SESSION["name"])){ 
                                echo '<a href="#" class="link">Teacher\'s Log in</a>';
                            }
                            else{ 
                               echo '<a href="upload.php" class="link">Upload </a>'.'&nbsp';
                                echo '<a href="logout.php" class="link">Log out</a>';
                            }
                        ?>
                        
			        </div>
		        
		        </div>
		    </div>


		<div class="body-panel">
			<div class="admin-menu-panel">
				<button id="classes_button" class="btn btn-default" onclick="classPanelShow();">Class Panel</button>

				<button id="classes_button" class="btn btn-default" onclick="subjectPanel();">Subject Panel</button> 
			</div>

			<div id="class_panel" class="class-panel">
				
			</div>

			<div id="subject_panel" class="class-panel">
				
			</div>
		</div>
	</div>

</body>
</html>