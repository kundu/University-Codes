<?php 
	session_start();
    if(empty($_SESSION["name"])){ 
//    	header("Location:index.php");
    }
    else{ 
        // header("Location:teacher.php");
    }
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<!-- base style st -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="stylesheet" type="text/css" href="css/mobile.css"> 

     
</head>
    

    <style>
		/* The Modal (background) */
		.modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    padding-top: 100px; /* Location of the box */
		    left: 0;
		    top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		   background-color: rgba(205, 216, 203, 0.95);
            margin: auto;
            padding: 42px;
            border: 1px solid #888;
            width: 40%;
            box-shadow: -1px 1px 16px #222;
		}

		/* The Close Button */
		.close {
		    color: #aaaaaa;
		    float: right;
		    font-size: 28px;
		    font-weight: bold;
		}

		.close:hover,
		.close:focus {
		    color: #000;
		    text-decoration: none;
		    cursor: pointer;
		}
	</style>



    
    <script type="text/javascript">
        
        var saveTheClass;
        
        function classClickToSeeFiles(selectedClass , className){ 
            saveTheClass=selectedClass;
            
            
        	theFile="getClassAllFIles.inc.php?getClass="+selectedClass;
        	theDiv="fileShow";

        	document.getElementById("theHeaderText").innerHTML="Class : "+className;

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

			// loadSubjects(selectedClass);
        }


        function loadSubjects(selectedClass){

        	theFile="seeClassInAjax.inc.php?classIdToSeeTheSubjectsForSeeing="+selectedClass;
			// alert(classID);
        	theDiv="subjects";
        	// alert("Deleted");

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


        function subjectSelectForSeeingChange(){
        	var selectedSubject=document.getElementById("subjectSelectedForUpload").value;
        	

        	theFile="getClassAllFIlesFilter.inc.php?getClass="+saveTheClass+"&subject="+selectedSubject;
        	theDiv="fileShow";

        	// document.getElementById("theHeaderText").innerHTML="Class : "+className;

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



        function login(){
        	var username=document.getElementById("username").value;
            var password=document.getElementById("password").value;
            
            

            theFile="login.inc.php?username="+username+"&password="+password;
        	theDiv="passwordResult"; 

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



        function deleteClick(id , name) {
			// alert("jj")
			theFile="deleteFile.inc.php?id="+id;
			// alert(theFile);
        	theDiv="deleteResult"; 

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

			classClickToSeeFiles(saveTheClass);

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

		    	<div class="class-header">
		    		<h4>Select class to see files</h4>
		    	</div>
                <hr style="width: 40%;box-shadow: 0px -1px 2px #222;"></hr>

		    	<div class="all-classes-name">
		    		

		    			<?php 
		    				include_once "database.php";
							$seeAllClassQuerry="select * from class order by class";
							$result2 = $conn->query($seeAllClassQuerry);

							while($row = $result2->fetch_assoc()) {
								$id=$row["id_auto"];
								$classNameSave=$row["class"];
								// echo "<option value='$id'>$classNameSave</option>";
						
						?>
			    		
			    			<div class="class1 classes">
			    				<button class="btn btn-default" onclick="classClickToSeeFiles(<?php echo $id; ?> , <?php echo $classNameSave; ?>);"><?php echo $classNameSave; ?></button>
			    			</div>
		    			<?php 
		    				}
		    			 ?>


		    			<!-- <div class="class1 classes">
		    				<button id="classes_button" class="btn btn-default" onclick="classClickToSeeFiles(1);">1</button>
		    			</div>

		    			<div class="class2 classes">
		    				<button id="classes_button" class="btn btn-default" onclick="classClickToSeeFiles(2);">2</button>
		    			</div>

		    			<div class="class3 classes">
		    				<button id="classes_button" class="btn btn-default" onclick="classClickToSeeFiles(3);">3</button>
		    			</div>

		    			<div class="class4 classes">
		    				<button class="btn btn-default" onclick="classClickToSeeFiles(4);">4</button>
		    			</div>

		    			<div class="class5 classes">
		    				<button class="btn btn-default" onclick="classClickToSeeFiles(5);">5</button>
		    			</div>	

		   				<div class="class6 classes">
		    				<button class="btn btn-default" onclick="classClickToSeeFiles(6);">6</button>
		    			</div>

		    			<div class="class7 classes">
		    				<button class="btn btn-default" onclick="classClickToSeeFiles(7);">7</button>
		    			</div>

		    			<div class="class8 classes">
		    				<button class="btn btn-default" onclick="classClickToSeeFiles(8);">8</button>
		    			</div>

		    			<div class="class9 classes">
		    				<button class="btn btn-default" onclick="classClickToSeeFiles(9);">9</button>
		    			</div>

		    			<div class="class10 classes">
		    				<button class="btn btn-default" onclick="classClickToSeeFiles(10);">10</button>
		    			</div> -->
		    	</div>


		    	<div class="class-header">
		    		<h1 id="theHeaderText"></h1> 
		    		<div id="subjects"></div>
		    	</div>
                <hr style="width: 40%;box-shadow: 0px -1px 2px #222;"></hr>

                <div id="deleteResult">
                	
                </div>
                <div id="fileShow">
                	
                </div>
		    </div>



		    <div class="logIn">
		    	<!-- <h2>Modal Example</h2> -->

				<!-- Trigger/Open The Modal -->
				<!-- <button id="myBtn">Open Modal</button> -->

				<!-- The Modal -->
				<div id="myModal" class="modal">

				  <!-- Modal content -->

					<div class="modal-content">
						<div class="closeMain">
					    	<span class="close">&times;</span>
					    </div>
				    	Username : <input type="text" id="username">
				  		Password : <input type="password" id="password">

				  		<button class="btn-default" style="margin-top: 5px; cursor: pointer;" onclick="login();">Log in</button>

					    <!-- <p>Some text in the Modal..</p> -->

					    <p id="passwordResult"></p>
					</div>

				</div>
			</div>	
        </div>




        <script>
// Get the modal
			var modal = document.getElementById('myModal');

			// Get the button that opens the modal
			var btn = document.getElementById("myBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			btn.onclick = function() {
			    modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			    modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modal) {
			        modal.style.display = "none";
			    }
			}
		</script>


    </body>
</html>