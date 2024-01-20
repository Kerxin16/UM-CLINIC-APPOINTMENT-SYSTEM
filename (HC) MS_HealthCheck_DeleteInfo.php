<?php
  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  
  //Delete
  if(isset($_GET['healthcheck_info_id'])){
    $healthcheck_info_id=$_GET['healthcheck_info_id'];


   $deleteQuery = "DELETE FROM healthcheck_info WHERE healthcheck_info_id='$healthcheck_info_id'";  
     $deleted = mysqli_query($conn,$deleteQuery);  
     if ($deleted) {  
         header('location:(HC) MS_HealthCheck_Home.php');  
     }else{  
          echo "Error: ".mysqli_error($conn);  
     }
  
    
  }  

?>
