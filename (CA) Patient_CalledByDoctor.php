<?php
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
session_start();
$email=$_SESSION['email'];

date_default_timezone_set("Asia/Kuala_Lumpur");
$todayDate= date("Y-m-d"); 
  
  $query = "SELECT 
  Doctor_Diagnosis_Status,
  Clinic_Appointment_Email,
  Doctor_Call_Patient,
  Room_Assignation_Doctor_ID,
  Doctor_Name,
  Clinic_Appointment_Speciality
FROM
  clinic_appointment
      JOIN
  doctor ON Room_Assignation_Doctor_ID = doctor_id
WHERE
  Doctor_Diagnosis_Status != 'DONE'
      AND Clinic_Appointment_Email = '$email'
      AND Doctor_Call_Patient = 'CALLED'
      AND Clinic_Appointment_Date = '$todayDate';";  
  $run = mysqli_query($conn,$query);  
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <style>
    /*Background Color */
    .body{
      background-color:#c2d6d6;
    }
    
    /*Make whole document center*/
    .centered {
        margin: auto;
        text-align: center;
      position: relative; 
      width: 65%;
  }
  
      /* Doctor Information Text*/
      .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }


/*Data*/
.data{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
  font-size: 16px;
}

/*Table*/
th,tr,td{  
    border:2px solid; 
    text-align: center;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
    font-size: 16px;
  height:30px;
    }

    table{
      border-collapse: collapse;
  border-spacing: 0;
    }
  

  </style>


</head>

<body class='body'>
<div class=centered>
  <br>
  <br>

<table style="width:600px">  
<thead >
      <tr >
      <th style="width:40%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Doctor Name</th> 
      <th style="width:40%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Doctor Department</th>   
           <th style="width:20%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Room Number</th>  
      </tr> 
  </thead>
      <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr >     
                               <td style='font-size:16px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>".$result['Doctor_Name']."</td>
                               <td class='data'>".$result['Clinic_Appointment_Speciality']."</td>   
                               <td class='data'>".$result['Room_Assignation_Doctor_ID']."</td>  
                               </tr>  
                     ";  
                }  
 }
               else{echo "<span style=\"color:#669999;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>Information will be showed once called by doctor. 
                Please wait for your turn.</b></span>";}
          ?>

</table>
</div>
</body>
</html>
