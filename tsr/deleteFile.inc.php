<?php 
	session_start();
    if(empty($_SESSION["name"])){ 
   		header("Location:index.php");
    }
    else{ 
        
    }

    include "database.php";

    if(isset($_GET["id"])){
    	$id = $_GET["id"];
    	$name="";
    	$querryGetName="select name from files where id_auto='$id'";

    	$result = $conn->query($querryGetName);

		while($row = $result->fetch_assoc()) {
			$name=$row["name"];
			echo $name;
		}

    	$name="upload/".$name;

    	$query="delete from files where id_auto='$id'";
    	$result2=mysqli_query($conn , $query);

    	if($result2){
    		echo "Deleted";
    		if(file_exists($name) && unlink($name)){
    			// echo "mama";
    		}
    		else{
    			echo "Problem";
    		}
    	}
    	else{
    		echo "Not deleted";
    	}

    }
    else{
    	echo "no id";
    }
 ?>