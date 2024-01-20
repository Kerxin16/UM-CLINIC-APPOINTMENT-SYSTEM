<?php
  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  
  //Delete
  if(isset($_GET['home_info_id'])){
    $home_info_id=$_GET['home_info_id'];


   $deleteQuery = "DELETE FROM home_info WHERE home_info_id='$home_info_id'";  
    $deleted = mysqli_query($conn,$deleteQuery);  
     if ($deleted) {  
         header('location:(HOME) MS_DisplayInfo.php');  
     }else{  
          echo "Error: ".mysqli_error($conn);  
     }
  
  } 

?>

