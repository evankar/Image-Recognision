<?php
	$target_dir = "uploads/";
	$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
	$uploadErr = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if (isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

		if ($check !== false) {
			echo "File is an image - ".$check["mime"].".";
			$uploadErr = 1;
		} else {
			echo "File is not an image.";
			$uploadErr = 0;
		}
	}

	// Check if $uploadErr is set to 0 by an error
	if ($uploadErr == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ".basename( $_FILES["fileToUpload"]["name"])." has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
?>
