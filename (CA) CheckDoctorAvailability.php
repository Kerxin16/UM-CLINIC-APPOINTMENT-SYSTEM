<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
       /*Make whole document center*/
        .centered {
            background-color:#a3c2c2;
        position: absolute;
        left: 50%;
        transform: translate(-50%, 0%);

  }
    /*CHECK DOCTOR AVAILABILITY*/
    .backgroundColour{
      background-color:#669999;
   }

       .TableSpace{
          padding-right: 13px;
          padding-bottom: 10px;
          padding-left: 10px;
          font-weight: bold;
       
      }

      .NoOfDoctorAvailable{
         text-align: right;
         vertical-align: middle;
       
      }

      .card-body{
        background-color:#a3c2c2;
      }

      .table{
        width:100%;
        border:black;}

        select{
          font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
          font-size:16px;
          height:30px;
          width:250px;
          background:#e6e6e6;
          border:none;
        }

      </style>
  </head>


<body class="centered">
<!--Check Doctor Availability-->

<Section style="width:930px">
<div class=backgroundColour>
<form action="" method="GET">

<table>
<tr height=30px></tr>
    <tr>
      <td class=TableSpace style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px"><label for="speciality">Search Department</label></td>
      <td>
    <select name="Clinic_Appointment_Speciality" required>
    <option  disabled selected value>Select Department</option> 
    <option id="Medicine" value="Medicine"><label for="Medicine" >Medicine</label></option>
    <option id="Surgery" value="Surgery"><label for="Surgery" >Surgery</label></option>
    <option id="Orthopaedics Surgery" value="Orthopaedics Surgery"><label for="Orthopaedics Surgery" >Orthopaedics Surgery</label></option>
    <option id="Paediatrics" value="Paediatrics"><label for="Paediatrics" >Paediatrics</label></option>
    <option id="Anaesthesiology"value="Anaesthesiology"><label for="Anaesthesiology" >Anaesthesiology</label></option>
    <option id="Obstetrics & Gynaecology"value="Obstetrics & Gynaecology"><label for="Obstetrics & Gynaecology" >Obstetrics & Gynaecology</label></option>
    <option id="Otorhinolaryngology" value="Otorhinolaryngology"><label for="Otorhinolaryngology" >Otorhinolaryngology</label></option>
    <option id="Sports Medicine" value="Sports Medicine"><label for="Sports Medicine" >Sports Medicine</label></option>
    <option id="Public Health" value="Public Health"><label for="Public Health" >Public Health</label></option>
    <option id="Medical Microbiology" value="Medical Microbiology"><label for="Medical Microbiology" >Medical Microbiology</label></option>
  </select></td>
  <td><button type="submit" style="background:#424b57;color:#c2d6d6;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px">Filter</button></td>
    </tr>
  </table>

  <div class="card mt-4">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
                <th style="width:10%;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Doctor ID</th>
                 <th style="width:20%;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Doctor Name</th>
                 <th style="width:25%;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Doctor Department</th>
                 <th style="width:15%;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Patient To Be Diagnosed </th>
                 <th style="width:15%;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Total Patient Assigned</th>
                 <th style="width:15%;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Patient Set By Doctor</th>

            </tr>
          </thead>
        <tbody>                
         <?php 
           $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

              if(isset($_GET['Clinic_Appointment_Speciality']))   
                {  /*Change time zone to asia time zone and get current date */
                  date_default_timezone_set("Asia/Kuala_Lumpur");
                  $todayDate= date("Y-m-d"); 

                  /*Search the department*/
                  $SearchDepartment= $_GET['Clinic_Appointment_Speciality'];

                  $queryCount = "SELECT Doctor_Name, Doctor_Department, Room_Assignation_Doctor_ID, Doctor_Daily_Patient_Number, COUNT(Room_Assignation_Doctor_ID) as NumberOfAppointment,COUNT(case Doctor_Diagnosis_Status when 'WAITING' then 1 else null end) as NumberOfPatientWaiting 
                  FROM clinic_appointment
                  JOIN doctor on Room_Assignation_Doctor_ID= doctor_id
                  WHERE Doctor_Department ='$SearchDepartment'
                  AND Room_Assignation_Status= 'ASSIGNED'
                  AND Clinic_Appointment_Date='$todayDate'
                  GROUP BY Room_Assignation_Doctor_ID,Doctor_Department,Doctor_Name,Doctor_Daily_Patient_Number
                  Order BY Room_Assignation_Doctor_ID";
                  $query_run = mysqli_query($conn, $queryCount);

                  
              if(mysqli_num_rows($query_run) > 0){
                  foreach($query_run as $row){
                  ?>
               <tr>
               <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px"><?= $row['Room_Assignation_Doctor_ID']; ?></td>
                <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px"><?= $row['Doctor_Name']; ?></td>
                <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px"><?= $row['Doctor_Department']; ?></td> 
                <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px"><?= $row['NumberOfPatientWaiting']; ?></td> 
                <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px"><?= $row['NumberOfAppointment']; ?></td>
                <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px"><?= $row['Doctor_Daily_Patient_Number']; ?></td>

                </tr>
               <?php
                   }?>

                  <tr style="height:70px" class = NoOfDoctorAvailable>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                   <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px" colspan="2"> <b>Number Of Record Shown: </b><?= $SumOfRow= mysqli_num_rows($query_run); ?></td>
                  </tr>
                   <?php
                  }
               else{echo "No Record Shown";}
            }
          ?>
        </tbody>
      </table>
    </div>
   </div>
</form>
</div>
</Section>

</body>
</html>





