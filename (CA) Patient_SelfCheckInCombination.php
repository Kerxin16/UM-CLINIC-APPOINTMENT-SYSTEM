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

    /*Verticle Line */
    .vl {
  border-left: 2px solid #424b57;
  height: 730px;
  text-decoration: none;
}

/*Reminder */
.reminder{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
  font-size: 20px;
  color:black;
  background-color:#d9f2e6; 
  border-radius:20px;
  border:1px solid #b30000;
  height:60px;
  display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
   width:1850px;

}

  .padding{
    padding-right: 20%;
  }

 </style>

<!--Nav Bar-->
<?php
  $Title='Clinic Appointment - SelfCheckIn';
  include_once("(1) NavBar(Patient).php");
?>
</head>


<body class='body'>
                                       
<br>
<br><br><br>
 <!--Reminder-->
<div class="centered1">
 <div class="reminder" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#b30000" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>&nbsp;&nbsp;&nbsp;Gentle Reminder: Self check-in start to available 2 days before the requested appointment date
</div>
</div>
<br><br><br>


<table style="width:100%" class="table">
<tr class="Border">
   <td class="Border" >
       
<!--Self Check In -->
<br>
<header class=headerCentered>
<span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Self Check-In</b></span>
  </header>
<div>
<iframe src="(CA) Patient_Check_In.php" width="100%" height="600"></iframe> 
</div>
   </td>
   
   <td>
   <div class="vl"></div>
</td>
   <!--Doctor Information After Self Check In-->

   <td class="Border">
   <br>
<header class=headerCentered>
<span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Doctor Information</b></span>
  </header>
<div>
<iframe src="(CA) Patient_CalledByDoctor.php" width="100%" height="600" ></iframe>
</div>
</td>
   </tr>
</table>


