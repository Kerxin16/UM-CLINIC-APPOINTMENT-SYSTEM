<?php
  // Create connection
  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

  ?>
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
    /* Make whole document located at center*/
   .centered {
            position: absolute;
            left: 50%;
            transform: translate(-50%, 0%);
      }
      /*CLINICAL APPOINTMENT FORM */
      /*Input Field*/
      .inputField{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
        font-size: 16px;
         border-radius: 15px;
         border:1px ;
         height:35px;
         background-color: #e6e6e6;
         width:500px;
      }
      .inputFieldLongText{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
        font-size: 16px;
         border-radius: 15px;
         border:1px;
         height:100px;
         background-color: #e6e6e6;
         width:500px;
      }
      .inputFieldSelector{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
        font-size: 16px;
         border-radius: 15px;
         border:1px;
         height:35px;
         background-color: #e6e6e6;
         width:500px;

      }

      select{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
        font-size: 16px;
         border-radius: 15px;
         border:1px ;
         height:35px;
         background-color: #e6e6e6;
         width:100%;
      }

      /* Clinical Appointment Form Text*/
    .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
    }
  /* Table Spacing*/
  .table {
  border-spacing: 100px;
  }
/*Background of the form*/
.content {
  padding: 0 18px;
  background-color: #a3c2c2;
}

.btn{
   background:#669999;
    color:black;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
    font-size:20px;
    height:40px;
    border-radius: 100px;
    width:250px;
    cursor: pointer;
  }

  .btn:hover{
    background-color: #a8b1bd;
  color: #424b57;

  }

      /*Reminder */
.reminder{
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

/*Focus */
input[type="text"]:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;

    }
    input[type="email"]:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;
    }

    select:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;
    }

    input[type="date"]:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;
    }
    textarea:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;

    }



/*Space */
.space{
 
 height:60px;
}



</style>

<!--Nav Bar-->
<?php
  $Title='Clinic Appointment - New Appointment Submission';
  include_once("(1) NavBar(Patient).php");
?>


</head>
<body class="body">

<!--Check Avaialble Appointment Form-->
<div class="centered">

<br>
<br><br><br>
 <!--Reminder-->
<div class="centered1">
 <div class="reminder" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#b30000" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg><span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">&nbsp;&nbsp;&nbsp;Gentle Reminder: Appointment need to be created one week in advance
</span></div>
</div>
<br>

<header class=headerCentered>
<span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>New Appointment Submission</b></span>
  </header>
<br>

<!--Clinic Appointment Form-->
<div class="centered">
<br>


<div class="content headerCentered">

  <form id="form" action="(CA) Patient_Clinic_AppointmentConnect2.php" method="post" style=" width:1800px;">
 <br><br>
<div class=>
    <!--Content-->
      <table >
 
 <tr>
  <td>
  <label for="casetype" class="formbold-form-label" style=" font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:18px;width:700px;"> <span style="float:right; padding-right:30px;">Type Of Case: &nbsp; &nbsp; <span style="color:red;">*</span></span>&nbsp; </label> </td>
  <td>
  <select  name="Clinic_Appointment_Case_Type" class="inputFieldSelector" required>
    <option disabled selected value>Select Type Of Case</option> 
    <option id="New Case" value="New Case"><label for="New Case" >New Case</label></option>
    <option id="Follow Up case" value="Follow Up Case"><label for="Follow Up Case" >Follow Up Case</label></option>
  </select>
</td>
 </tr>
 
 <tr height=30px></tr>
 
  <tr>
  <td >
  <p><label for="ReasonOfAppointment" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;width:700px;"> <span style="float:right; padding-right:30px;">Reason:&nbsp;&nbsp;<span style="color:red;">*</span></span>&nbsp; </label></p> </td>
  <td colspan="2"><textarea class="inputFieldLongText" id="ReasonOfAppointment" name="Clinic_Appointment_Reason_Of_Appointment" rows="4" cols="88" placeholder="&nbsp;Please state reason of appointment." required></textarea> </td>
  </tr>
<tr height=30px></tr>


<?php
$Clinic_Appointment_Speciality=$_SESSION['Clinic_Appointment_Speciality'];

$query = "SELECT * FROM doctor 
  WHERE Doctor_Department= '$Clinic_Appointment_Speciality'";
  $run = mysqli_query($conn,$query);  

?>

<tr>
  <td>
  <label for="doctor" class="formbold-form-label" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;width:700px;"> <span style="float:right; padding-right:30px;">Select Doctor:&nbsp;&nbsp;</span></label> </td>
  <td>
  <select  name="doctor" class="inputFieldSelector">
    <option disabled selected value >Select Doctor For Follow Up Case</option> 
    <?php
  if ($num = mysqli_num_rows($run)>0) {  
    while ($result = mysqli_fetch_assoc($run)) {   ?>
    <option value="<?php echo $result['Doctor_Name']; ?>"><?php echo $result['Doctor_Name']; ?></option>
    <?php }} ?>
  </select>
</td>
 </tr>
 
 <tr height=30px></tr>

      </table>
  <hr>

 
  <div class=headerCentered>
  <button type="submit" class="btn" name="submit" id="submit" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;">Submit</button>
</div>
<br>
</div>
</form>

</div>

</body>
</html>
