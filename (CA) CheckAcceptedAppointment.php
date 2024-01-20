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
     
     body{
      background-color:#a3c2c2;
     }
   /*CHECK APPOINTMENT DATE*/
  .backgroundColour{
      background-color:#669999;
   }

   .TableSpace{
          padding-right: 13px;
          padding-bottom: 10px;
          padding-left: 10px;
          font-weight: bold;
       
      }

      .NoOfAppointment{
         text-align: right;
         vertical-align: middle;
       
      }
      .card-body{
        background-color:#a3c2c2;
      }

      .table{
        width:100%;
        border:black;}

    </style>

<body>

<!--Check Accepted Appointment-->

<Section style="width:auto">
<div class=backgroundColour>
<form action="" method="GET">

  <table>
  <tr height=30px></tr>
    <tr>
      <td class=TableSpace style="  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px"><label for="Clinic_Appointment_Date">Search Date</label></td>
       <td><input type="date" size="60" name="Clinic_Appointment_Date" style="  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px;height:30px;
          width:250px;background:#e6e6e6;border:none"value="<?php if(isset($_GET['Clinic_Appointment_Date'])){ echo $_GET['Clinic_Appointment_Date']; } ?>" required></input> 
     
       <button type="submit" style="background:#424b57;color:#c2d6d6" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button></td>
    </tr>
  </table>

  <div class="card mt-4">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
                <th style="width:30px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Name</th>
                 <th style="width:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Appointment Speciality</th>
                 <th style="width:30px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Reason Of Appointment</th>
                 <th style="width:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Appointment Time Slot</th>
            </tr>
          </thead>
        <tbody>                
         <?php 
           $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

              if(isset($_GET['Clinic_Appointment_Date']))
                {
                  $SearchDate= $_GET['Clinic_Appointment_Date'];
                  $query = "SELECT * FROM clinic_appointment
                  WHERE clinic_appointment_date= '$SearchDate'
                  AND Clinic_Appointment_Acceptance= 'ACCEPTED'";
                  $query_run = mysqli_query($conn, $query);
              if(mysqli_num_rows($query_run) > 0){
                  foreach($query_run as $row){
                  ?>
               <tr>
                <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px"><?= $row['Clinic_Appointment_Name']; ?></td>
                <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px"><?= $row['Clinic_Appointment_Speciality']; ?></td>
                <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px"><?= $row['Clinic_Appointment_Reason_Of_Appointment']; ?></td>
                <td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px"><?= $row['Clinic_Appointment_Time']; ?></td>
                </tr>
                <?php
                   }?>
                   

                  <tr style="height:70px" class = NoOfAppointment>
                  <td> </td>
                  <td> </td>
                   <td colspan="3" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px"> <b>Total Number Of Appointment: </b><?= $SumOfRow= mysqli_num_rows($query_run); ?></td>
                  </tr>
                   <?php
                  }
               else{echo "No Record Found";}
            }
          ?>
        </tbody>
      </table>
    </div>
   </div>
</form>

</div>
</Section>
<br>
<br>


</body>
</html>
