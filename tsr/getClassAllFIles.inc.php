 

<?php 
	include_once "database.php";
	session_start();
    if(empty($_SESSION["name"])){ 
//    	header("Location:index.php");
    }
    else{ 
        // header("Location:teacher.php");
    }



    if(isset($_GET["classIdToSeeTheSubjectsForSeeing"])){
		$classIdToSeeTheSubjects=$_GET["classIdToSeeTheSubjectsForSeeing"];

		$seeAllSubjectOfThatClassQuerry="select * from subject where class_id='$classIdToSeeTheSubjects'";
		$result3=$conn->query($seeAllSubjectOfThatClassQuerry);
		if($result3){
			echo " <select onchange=subjectSelectForSeeingChange() id=subjectSelectedForUpload>";
			while($row = $result3->fetch_assoc()){
				$subjectIdTemp=$row["id_auto"];
				$subjectName=$row["subject"];
				echo "<option value='$subjectName'>$subjectName</option>";
				// echo "<button class=deleteButtonSubject onclick=deleteButtonSubjectCLick('$subjectIdTemp');>X</button>"."<br>";
			}
			echo "</select>";
		}
	}
 ?>


<?php 
	
	$getClass="";
	if(isset($_GET["getClass"])){
		$getClass = $_GET["getClass"];
		

		$classIdToSeeTheSubjects=$getClass;

		$seeAllSubjectOfThatClassQuerry="select * from subject where class_id='$classIdToSeeTheSubjects'";
		$result3=$conn->query($seeAllSubjectOfThatClassQuerry);
		if($result3){
			echo " <select onchange=subjectSelectForSeeingChange() id=subjectSelectedForUpload>";
			echo "<option value=''>Select a subject</option>";
			while($row = $result3->fetch_assoc()){
				$subjectIdTemp=$row["id_auto"];
				$subjectName=$row["subject"];
				echo "<option value='$subjectName'>$subjectName</option>";
				// echo "<button class=deleteButtonSubject onclick=deleteButtonSubjectCLick('$subjectIdTemp');>X</button>"."<br>";
			}
			echo "</select>";
		}

	}
	else{
		header("Location:index.php");
	}
 ?>


<?php 
	include "database.php";
	$queryForFiles="select * from files where class='$getClass'";
	
	$result = $conn->query($queryForFiles);

	while($row = $result->fetch_assoc()) {
		$link="download.php?fileName=".$row["name"];
		$id=$row["id_auto"]; 
	
 ?>

<div class="download">
	<div class="info">
		<h4><?php echo $row["name"]; ?></h4>
		<p><?php echo $row["info"]; ?></p>
	</div>

	<div class="download-link">
		<a href="<?php echo $link; ?>" target="_blank"> <img class="download-icon"
		alt="Download" src="image/download.png"> </a>
        
        
        <?php
            if(!empty($_SESSION["name"])){ 
            	echo "<button onclick=deleteClick('$id')> <img class=download-icon
		        alt=Download src=image/delete.png> </button>";
            } 
        ?>
		
	</div>

</div>

<?php 
    }
 ?>