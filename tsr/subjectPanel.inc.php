<?php 
	include_once "database.php";

	if(isset($_GET["subject"]) && isset($_GET["class_id"])){
		$subject=$_GET["subject"];
		$class_id=$_GET["class_id"];

		$querryForInsertSubject="insert into subject values('','$class_id','$subject')";
		$result1=$conn->query($querryForInsertSubject);
		if($result1){
			echo "Subject added";
		}
		else{
			echo "Problem 2";
		}
	}
 ?>

<h3>Add Subject</h3>
<label>Select Class</label>

<select id="classForSubject">

		<?php 
			$seeAllClassQuerry="select * from class order by class";
			$result2 = $conn->query($seeAllClassQuerry);

			while($row = $result2->fetch_assoc()) {
				$id=$row["id_auto"];
				$classNameSave=$row["class"];
				echo "<option value='$id'>$classNameSave</option>";
			}
		 ?>

</select>


<input type="text" id="subject_name" placeholder="subject name">
<button id="classes_button" class="btn btn-default" onclick="addSubjectClick();">Add Subject</button>

<br>
<br>
<br>

<div class="seeClassForSubject">
	<div class="classPart">
		<select id="seeClassForSubject" onchange="classChangeForSeeingSubject()">
				<option value=''>Select Class</option>
				<?php 
					$seeAllClassQuerry="select * from class order by class";
					$result2 = $conn->query($seeAllClassQuerry);

					while($row = $result2->fetch_assoc()) {
						$id=$row["id_auto"];
						$classNameSave=$row["class"];
						echo "<option value='$id'>$classNameSave</option>";
					}
				 ?>
		</select>
	</div> 
</div>

<div id="subjectsList"></div>

 



