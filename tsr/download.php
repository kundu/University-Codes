
<?php
	if(isset($_GET['fileName'])){
		$file = 'upload/'.$_GET['fileName'];

		if (file_exists($file)) {
			// echo "okay";
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename="'.basename($file).'"');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($file));
		    readfile($file);
		    exit;
		}
		else{
			echo "No such file";
		}
	}
	else{
		header("Location:index.php");
	}
?>
