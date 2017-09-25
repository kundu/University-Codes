


<?php 
	include_once "database.php";


	if(isset($_GET["deleteSubjectID"])){

		$subjectID = $_GET["deleteSubjectID"];
		
		$query="delete from subject where id_auto='$subjectID'";
    	$result2=mysqli_query($conn , $query);

    	if($result2){
    		echo "deleted";
    	}
    	else{
    		echo "not";
    	}
	}



	else if(isset($_GET["classIdToSeeTheSubjects"])){
		$classIdToSeeTheSubjects=$_GET["classIdToSeeTheSubjects"];

		$seeAllSubjectOfThatClassQuerry="select * from subject where class_id='$classIdToSeeTheSubjects'";
		$result3=$conn->query($seeAllSubjectOfThatClassQuerry);
		if($result3){
			while($row = $result3->fetch_assoc()){
				$subjectIdTemp=$row["id_auto"];
				$subjectName=$row["subject"];
				echo $subjectName;
				echo "<button class=deleteButtonSubject onclick=deleteButtonSubjectCLick('$subjectIdTemp');>X</button>"."<br>";
			}
		}
	}



	else if(isset($_GET["classIdToSeeTheSubjectsForUpload"])){
		$classIdToSeeTheSubjects=$_GET["classIdToSeeTheSubjectsForUpload"];

		$seeAllSubjectOfThatClassQuerry="select * from subject where class_id='$classIdToSeeTheSubjects'";
		$result3=$conn->query($seeAllSubjectOfThatClassQuerry);
		if($result3){
			echo " <select name=subjectSelectedForUpload>";
			while($row = $result3->fetch_assoc()){
				$subjectIdTemp=$row["id_auto"];
				$subjectName=$row["subject"];
				echo "<option value='$subjectName'>$subjectName</option>";
				// echo "<button class=deleteButtonSubject onclick=deleteButtonSubjectCLick('$subjectIdTemp');>X</button>"."<br>";
			}
			echo "</select>";
		}
	}


	else if(isset($_GET["classIdToSeeTheSubjectsForSeeing"])){
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
 

