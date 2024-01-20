
<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	$conn = mysqli_connect('localhost:3307','root','1234','um_healthcare_system') or die("Could not Connect My Sql");


	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 1000000) {
			$em = "Sorry, your file is too large.";
		    header("Location:(HOME) MS_UploadAndDeleteImage.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'ClinicImages/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO img(img) 
				        VALUES('$new_img_name')";
				mysqli_query($conn, $sql);
				header("Location:(HOME) MS_UploadAndDeleteImage.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location:(HOME) MS_UploadAndDeleteImage.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("(HOME) MS_UploadAndDeleteImage.php?error=$em");
	}

}
?>