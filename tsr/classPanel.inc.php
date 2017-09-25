
<?php 
	include_once "database.php";
	if(isset($_GET["class"])){
		$className = $_GET["class"];

		$querry="insert into class values('','$className')";
		$result=$conn->query($querry);

		if($result){
			echo "Added";
		}
		else{
			echo "Problem";
		} 
	}


	else if(isset($_GET["id"])){
		$id = $_GET["id"];

		$querryDelete="delete from class where id_auto='$id'";
		$result3=$conn->query($querryDelete);

		if($result3){
			echo "deletes";
		}
		else{
			echo "Problem2";
		} 
	}
 ?>


<h3>Add class</h3>
<input type="text" id="className" placeholder="class name"> 
<div class="class1 classes">
	<button id="classes_button" class="btn btn-default" onclick="classSubmitClick();">Add Class</button>
</div>


<div class="deleteClass">
	<h3>Delete class</h3>

	<select id="classForDelete">

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

	 <button id="classes_button" class="btn btn-default" onclick="deleteCLassClick();">Delete Class</button>

</div>