
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

   /*Background Color */
   .body{
      background-color:#c2d6d6;
    }

    /*Make whole document center*/
    .centered1{
        position: absolute;
        left: 50%;
        transform: translate(-50%, 0%);
      }

      .centered{
        position: absolute;
       margin-left: 50%;
       margin-right:50%;
      }

      .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }

    /*Table Border */
    .Border{
        border-color:#669999;
        border: 2px #669999;
    }

    h2,h4{
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }


 </style>

<!--Nav Bar-->
<?php
  $Title='Clinic Appointment - New Appointmnet Submission';
  include_once("(1) NavBar(MS).php");
?>
</head>


<body class='body'>
                                       
<br>

<table style="width:100%" class="table">
<tr class=Border>
   <td class=Border>
<!--Check Accepted Appointment-->
<header>
   <h4>Check Accepted Appointment: </h4>
</header>
<div>
<iframe src="(CA) CheckAcceptedAppointment.php" width="100%" height="400"></iframe>
</div>
   </td>

   <td class="Border">
<!--Check Doctor Department-->
<header>
   <h4>Check Doctor Department: </h4>
</header>
<div>
<iframe src="(CA) CheckDoctorDepartment.php" width="100%" height="400"></iframe> 
</div>
   </td>
   </tr>
   </table>

<!--Appoinment Application-->
<table style="width:100%" class="table">
   <tr class="Border">
   <td class="Border">
<header class= headerCentered>
<span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> Appointments Application</span>
</header> <br>
<div>
<iframe src="(CA) AppointmentApplication.php" width="100%" height="780" ></iframe>
</div>
</td>
   </tr>
</table>

</body>
</html>