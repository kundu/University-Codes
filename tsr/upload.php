<?php 
	include_once "database.php";
	session_start();
    if(empty($_SESSION["name"])){ 
    	header("Location:index.php");
    }
    else{ 
        // header("Location:teacher.php");
    }
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teacher</title>
	<!-- base style st -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="stylesheet" type="text/css" href="css/mobile.css"> 

     
</head>
    
    <script type="text/javascript">
    	function classToUploadFile(selected_Class){  
            document.getElementById("class_hidden_input").value=selected_Class;
            document.getElementById("theHeaderText").innerHTML="Class "+selected_Class +" Upload";


            theFile="seeClassInAjax.inc.php?classIdToSeeTheSubjectsForUpload="+selected_Class;
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
    </script>
    
    <body>
    	<div class="container">
    		
    		<div class="header-panel">
	    		<div class="row">

	    			<div class="welcome-note col-lg-2 col-md-2 col-sm-3 col-xs-12">
	    				<a href="index.php" class="link">Home</a> 	
	    			</div>

					<div class="header-text col-lg-8 col-md-8 col-sm-6 col-xs-12">
	    				<h2>TSR.COM</h2>	
	    			</div>	    			

			        <div class="admin-link col-lg-2 col-md-2 col-sm-3 col-xs-12">

			        	<a href="logout.php" class="link">Log out</a>
			        </div>
		        
		        </div>
		    </div>


		    <div class="body-panel">
		    	<div class="all-classes-name">

		    		<?php 
						$seeAllClassQuerry="select * from class order by class";
						$result2 = $conn->query($seeAllClassQuerry);

						while($row = $result2->fetch_assoc()) {
							$id=$row["id_auto"];
							$classNameSave=$row["class"];
							// echo "<option value='$id'>$classNameSave</option>";
						
					?>
		    		
		    			<div class="class1 classes">
		    				<button class="btn btn-default" onclick="classToUploadFile(<?php echo $id; ?>);"><?php echo $classNameSave; ?></button>
		    			</div>
		    			<?php 
		    				}
		    			 ?>
			    			<!-- <div class="class2 classes">
			    				<button class="btn btn-default" onclick="classToUploadFile('2');">2</button>
			    			</div>

			    			<div class="class3 classes">
			    				<button class="btn btn-default" onclick="classToUploadFile('3');">3</button>
			    			</div>

			    			<div class="class4 classes">
			    				<button class="btn btn-default" onclick="classToUploadFile('4');">4</button>
			    			</div>

			    			<div class="class5 classes">
			    				<button class="btn btn-default" onclick="classToUploadFile('5');">5</button>
			    			</div>	

			   				<div class="class6 classes">
			    				<button class="btn btn-default" onclick="classToUploadFile('6');">6</button>
			    			</div>

			    			<div class="class7 classes">
			    				<button class="btn btn-default" onclick="classToUploadFile('7');">7</button>
			    			</div>

			    			<div class="class8 classes">
			    				<button class="btn btn-default" onclick="classToUploadFile('8');">8</button>
			    			</div>

			    			<div class="class9 classes">
			    				<button class="btn btn-default" onclick="classToUploadFile('9');">9</button>
			    			</div>

			    			<div class="class10 classes">
			    				<button class="btn btn-default" onclick="classToUploadFile('10');">10</button>
			    			</div> -->
		    	</div>
 

		    	<div class="class-header">
		    		<h1 id="theHeaderText">Select Class first !!!</h1>
		    	</div>

		    	

                <hr style="width: 40%;box-shadow: 0px -1px 2px #222;"></hr>

                <div class="file-upload-from">
                	<form action="upload.php" method="POST" enctype="multipart/form-data">
                		<div id="subjects"></div>
						<input class="btn" required type="file" name="file" id="image"></input>
						<label>Info</label>
						<input type="text" required name="info" placeholder="file info"></input>
						<input type="text" required name="selected_Class" hidden id="class_hidden_input"></input>
						<input class="btn" type="submit" name="fileSubmitClick" value="Upload"></input>
					</form>
                </div>
		    </div>
        </div>
    </body>
</html>



<?php
	include "database.php"; 
    if(isset($_POST["fileSubmitClick"])){
        
    	 
 
		$selected_Class = $_POST["selected_Class"]; 
		$subject=$_POST["subjectSelectedForUpload"]; 

        $size=$_FILES['file']['size'];
		// $type=$_FILES['file']['type']; 
		$name=$_FILES['file']['name'];
		$info=$_POST['info'];
		// $ext = end((explode(".", $name)));
		// echo $ext;
		// $name=microtime().".jpg";
		$temp=$_FILES['file']['tmp_name'];
		// echo "temp is ".$temp;
		$location="upload/";
		// // echo $name."<br>".$size."<br>".$type;
		// echo "<br>";
		// echo "<br>";
		$date=date("m.d.y");
		if($size !=0 ){
			// $comment=$_POST["comment"];
			if(move_uploaded_file($temp, $location.$name)){
				// echo "yes";
				$querry="INSERT INTO files VALUES('','$name','$info','$selected_Class','$subject','$date')";
				 
				if($conn->query($querry)===TRUE){
					echo "Uploaded";
				}
				else{
					echo  mysqli_error($conn);
					echo " not gone";
				}
			}
			else{
				echo "Only JPEG is allowed";
			}
		}
		else{
			echo "try to fill";
		}


    }
?>