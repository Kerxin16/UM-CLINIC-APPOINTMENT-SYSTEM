<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
      .inputFieldSelector{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
        font-size: 16px;
         border-radius: 15px;
         border:1px;
         height:35px;
         background-color: #e6e6e6;
         width:380px;

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

/*Focus */

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

  /*Checkbutton */
  .checkbtn{
    background:#424b57;
    color:#c2d6d6;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
    font-size:18px;
    height:40px;
    border-radius: 0px;
  }

  .checkbtn:hover{
    background-color: #a8b1bd;
  color: #424b57;
  }

  /*Text Size */
  .text{

    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
    font-size:18px;

  }

  .time-slot{
    width:400px;
    height:50px;
    font-family: 'Times New Roman', Times, serif;  
    font-size:18px;
  }
  .time-slot:hover{
    background-color : beige; 
      color: #424b57;
      border-color: black;
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
</svg>&nbsp;&nbsp;&nbsp;Gentle Reminder: Appointment need to be created one week in advance
</div>
</div>
<br>

<header class=headerCentered>
<span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>New Appointment Submission</b></span>
  </header>
<br>
<div class="content">

<form action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="Post" width="1800px;">
<br><br>

    <!--Content-->
      <table style="width:1800px;">
      <tr >
   <td style=" width:320px;"><label for="speciality" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;width:350px;"><span style="float:left;padding-right:30px; width:320px;">Department To Make Appointment:&nbsp;&nbsp; </span></label></td>
<td style="float:left; width:400px;">
  <select name="Clinic_Appointment_Speciality" class="inputFieldSelector" >
  <option  disabled selected value>&nbsp;Select Department</option> 
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

  <td style=" width:320px;">
  <label for="date" class="formbold-form-label" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;"><span style="width:320px; float:left; padding-left:200px;">Date: &nbsp;&nbsp; </span>&nbsp; </label></td>

  <td style=" float:left; width:400px;">
  <input type="date" class="formbold-form-input" name="Clinic_Appointment_Date" id="date" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px;height:30px;
          width:380px;background:#e6e6e6; border-radius: 15px;border:1px ;height:35px">         
  </td>

<td style="float:right; width:60px;">
  <button type="submit" class="checkbtn" name="check" id="submit" >Check</button></td>
  </tr>

</table>
</form>


<div class="headerCentered">
<form id="form" action="(CA) Patient_Clinic_AppointmentConnect1.php" method="post" style=" width:1800px;">
 <?php
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');


$Clinic_Appointment_Speciality = filter_input(INPUT_POST, 'Clinic_Appointment_Speciality');
$Clinic_Appointment_Date = filter_input(INPUT_POST, 'Clinic_Appointment_Date');

/*Today Date */
date_default_timezone_set("Asia/Kuala_Lumpur");
$todayDate=date("Y-m-d"); 
$Clinic_Appointment_Date = filter_input(INPUT_POST, 'Clinic_Appointment_Date');
$appointmentAvailableDate = date("Y-m-d", strtotime($todayDate . ' +6 days'));


if (isset($_POST['check'])&& $Clinic_Appointment_Date <= $appointmentAvailableDate) {
  echo("<script> alert('Appointment only can be made 7 days in advance'); </script>"); 

 }elseif(isset($_POST['check'])&& $Clinic_Appointment_Date > $appointmentAvailableDate) { 
?>

<input name="Clinic_Appointment_Speciality" type="hidden" value="<?php echo $Clinic_Appointment_Speciality; ?>">
<input name="Clinic_Appointment_Date" type="hidden" value="<?php echo $Clinic_Appointment_Date; ?>">


<?php
echo" <hr><br><div class='headerCentered'> <h3 style='font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; '><b>Available Time Slot: </b></h3></div><br>";
echo"<span class='text'><b>Department:&nbsp;</b>$Clinic_Appointment_Speciality <br><br>
<b>Date:&nbsp;</b> $Clinic_Appointment_Date<br><br>
<b>Available Time Slot:</b></span><br><br>
";

//0900-1000
$query = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date= '$Clinic_Appointment_Date' AND Clinic_Appointment_Time='0900 hours - 1000 hours' ";
$run = mysqli_query($conn,$query);  

if (mysqli_num_rows($run)>9){}else{
?>
<input type="button" class="time-slot" name="button" value="0900 hours - 1000 hours" ></input>&nbsp;
<?php };

//1000-1100
$query1 = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date= '$Clinic_Appointment_Date' AND Clinic_Appointment_Time='1000 hours - 1100 hours' ";
$run1 = mysqli_query($conn,$query1);  

if (mysqli_num_rows($run1)>9){}else{
?>
<input type="button" class="time-slot" name="button" value="1000 hours - 1100 hours" ></input>&nbsp;

<?php }

//1100-1200
$query2 = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date= '$Clinic_Appointment_Date' AND Clinic_Appointment_Time='1100 hours - 1200 hours' ";
$run2 = mysqli_query($conn,$query2);  

if (mysqli_num_rows($run2)>9){}else{
?>
<input type="button" class="time-slot" name="button" value="1100 hours - 1200 hours" ></input>&nbsp;
<?php }

//1300-1400
$query3 = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date= '$Clinic_Appointment_Date' AND Clinic_Appointment_Time='1300 hours - 1400 hours' ";
$run3 = mysqli_query($conn,$query3);  

if (mysqli_num_rows($run3)>9){}else{
?>
<input type="button" class="time-slot" name="button" value="1300 hours - 1400 hours"></input>&nbsp;
<?php }

//1400-1500
$query4 = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date= '$Clinic_Appointment_Date' AND Clinic_Appointment_Time='1400 hours - 1500 hours' ";
$run4 = mysqli_query($conn,$query4);  

if (mysqli_num_rows($run4)>9){}else{
?>
<input type="button" class="time-slot" name="button" value="1400 hours - 1500 hours" ></input>&nbsp;
<?php }

//1500-1600
$query5 = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date= '$Clinic_Appointment_Date' AND Clinic_Appointment_Time='1500 hours - 1600 hours' ";
$run5 = mysqli_query($conn,$query5);  

if (mysqli_num_rows($run5)>9){}else{
?>
<input type="button" class="time-slot" name="button" value="1500 hours - 1600 hours"></input>&nbsp;
<?php }

//1600-1700
$query6 = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date= '$Clinic_Appointment_Date' AND Clinic_Appointment_Time='1600 hours - 1700 hours' ";
$run6 = mysqli_query($conn,$query6);  

if (mysqli_num_rows($run6)>9){}else{
?>
<input type="button" class="time-slot" name="button" value="1600 hours - 1700 hours" ></input>&nbsp;
<?php }

//1700-1800
$query7 = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date= '$Clinic_Appointment_Date' AND Clinic_Appointment_Time='1700 hours - 1800 hours' ";
$run7 = mysqli_query($conn,$query7);  

if (mysqli_num_rows($run7)>9){}else{
?>
<input type="button" class="time-slot" name="button" value="1700 hours - 1800 hours" ></input>&nbsp;
<?php } ?>
<input type="hidden" name="selectedTimeSlots" id="selectedTimeSlots">

<br><hr> 
<div class=headerCentered>
 <button type="submit" class="btn" name="create" id="create" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;">Create Appointment</button>
</div>
<?php
}?>


<br>
</div>
</form>
</div>

<br>
<br>
</div>




</body>
</html>

<script>
    $(document).ready(function () {
        // Handle button clicks
        $(".time-slot").on("click", function () {
            var clickedButton = $(this);

            // Toggle the "selected" class
            clickedButton.toggleClass("selected");

            // Disable other buttons if the clicked button is selected
            if (clickedButton.hasClass("selected")) {
                $(".time-slot").not(clickedButton).attr("disabled", true);
            } else {
                $(".time-slot").attr("disabled", false);
            }
        });

        // Handle form submission
        $("#form").on("submit", function (event) {
            // Check if at least one time slot is selected
            if ($(".time-slot.selected").length === 0) {
                // Display an alert or any other appropriate message
                alert("Please select one time slot.");
                // Prevent form submission
                event.preventDefault();
            } else {
                // Add selected time slots to hidden input values
                var selectedTimeSlots = $(".time-slot.selected").map(function() {
                    return $(this).val();
                }).get();
                $("#selectedTimeSlots").val(selectedTimeSlots.join(','));
            }
        });
    });
</script>