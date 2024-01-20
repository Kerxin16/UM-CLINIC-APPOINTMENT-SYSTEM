<?php
  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  
  //Delete
  if(isset($_GET['img'])){
    $image=$_GET['img'];


   $deleteQuery = "DELETE FROM img WHERE img='$image'";  
    unlink("ClinicImages/$image");
    $deleted = mysqli_query($conn,$deleteQuery);  
     if ($deleted) {  
         header('location:(HOME) MS_UploadAndDeleteImage.php');  
     }else{  
          echo "Error: ".mysqli_error($conn);  
     }
  
  } 

?>

