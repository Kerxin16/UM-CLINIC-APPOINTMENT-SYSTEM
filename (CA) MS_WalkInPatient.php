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
      /*Patient Walk In FORM */
      /*Input Field*/
      .inputField{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;        
        font-size: 16px;
         border-radius: 15px;
         border:1px ;
         height:35px;
         background-color: #e6e6e6;
      }
      .inputFieldLongText{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;        
        font-size: 16px;
         border-radius: 15px;
         border:1px;
         height:100px;
         background-color: #e6e6e6;
      }
      .inputFieldSelector{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;        
        font-size: 16px;
         border-radius: 15px;
         border:1px;
         height:35px;
         background-color: #e6e6e6;

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
    .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }
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
    width:150px;
    cursor: pointer;
  }

  .btn:hover{
    background-color: #a8b1bd;
  color: #424b57;

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

</style>

<!--Nav Bar-->
<?php
  $Title='Clinic Appointment - Walk In Patient';
  include_once("(1) NavBar(MS).php");
?>

</head>
<body class="body">

<div class="centered">

<!--Clinic Appointment Form-->
<br>
<br>
  <br>
<header>
<h4 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"><i>Walk In Patient Use: </i></h4></header>

<div class="content">
  <br>

  <form id="form" action="(CA) MS_WalkInPatient.connect.php" method="post" width="1000px">
    <header class="headerCentered">
    <span  style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> Clinic Appointment Form</span>
    </header>
    <hr>
        <br>
    <!--Content-->
      <table >
  <tr>
    <td><label for="Clinic_Appointment_Name" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Full Name</label></td>
    <td colspan="2"><input type="text" size="86" class="inputField"  id ="Clinic_Appointment_Name" name="Clinic_Appointment_Name" placeholder="&nbsp;Enter Full Name"required></td>
  </tr>
  <tr height=30px>
  </tr>

  <tr >
    <td ><label for="IC" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">IC/Passport</label></td>
      <td colspan="2"><input type="text" size="86" class="inputField"  id="Clinic_Appointment_Identity_Credential" name="Clinic_Appointment_Identity_Credential" placeholder="&nbsp;Enter IC Number/ Passport Number (For Foreigner)" required></td>
    </tr>
    <tr height=30px>
  </tr>

  <tr >
    <td ><label for="email" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Email</label></td>
    <td colspan=2><input type=email size=86 class=inputField  id=email name=Clinic_Appointment_Email placeholder="&nbsp;Enter Email" required></td>   
    </tr>
    <tr height=30px>
  </tr>

    <tr>
   <td ><label for="phone" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Phone</label></td>
    <td colspan="2"><input type="text" size="86" class="inputField" id="phone" name="Clinic_Appointment_Phone" placeholder="&nbsp;Enter Phone Number"required></td>
   </tr>
    <tr height=30px>
  </tr>


  <tr>
   <td ><label for="gender" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Gender</label></td>
    <td> <select class="rcornerforSelectorHalf" name="Patient_Gender" required>
  <option  disabled selected value>Select Your Gender</option>   
    <option id="Male" value="Male"><label for="Male" >Male</label></option>
    <option id="Female" value="Female" ><label for="Female" >Female</label></option>
  </select></td>
   </tr>
    <tr height=30px>
  </tr>

  <tr>
   <td ><label for="birthday" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Birthdate</label></td>
    <td >  <input type="date" class="formbold-form-input" name="Patient_Birthdate" id="Patient_Birthdate" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px;height:30px;
          width:100%;background:#e6e6e6; border-radius: 15px;border:1px ;height:35px" required/>      
</td>
   </tr>
    <tr height=30px>
  </tr>


  <tr >
   <td colspan="2"><label for="speciality" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Department That You Want To Make Appointment</label></td>
   <td>
   <select name="Clinic_Appointment_Speciality" class="inputFieldSelector" required>
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
  <tr height=30px></tr>


    <tr>
  <td>
  <label for="date" class="formbold-form-label" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Appointment Date&nbsp; </label></td>
  <td>
  <input type="date" class="formbold-form-input" name="Clinic_Appointment_Date" id="date" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px;height:30px;
          width:100%;background:#e6e6e6; border-radius: 15px;border:1px ;height:35px"required/>         
  </td>
</tr>
<tr height=30px></tr>

  <tr>
  <td>
  <label for="time" class="formbold-form-label" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px"> Time Slot &nbsp; </label> </td>
  <td>
  <select  name="Clinic_Appointment_Time" class="inputFieldSelector" required>
    <option disabled selected value>Select Appointment Time Slot</option> 
    <option id="Slot 1" value="0900 hours - 1000 hours"><label for="Slot 1" >0900 hours</label></option>
    <option id="Slot 2" value="1000 hours - 1100 hours"><label for="Slot 2" >1000 hours</label></option>
    <option id="Slot 3" value="1100 hours - 1200 hours"><label for="Slot 3" >1100 hours</label></option>
    <option id="Slot 4" value="1300 hours - 1400 hours"><label for="Slot 4" >1300 hours</label></option>
    <option id="Slot 5" value="1400 hours - 1500 hours"><label for="Slot 5" >1400 hours</label></option>
    <option id="Slot 6" value="1500 hours - 1600 hours"><label for="Slot 6" >1500 hours</label></option>
    <option id="Slot 7" value="1600 hours - 1700 hours"><label for="Slot 7" >1600 hours</label></option>
    <option id="Slot 8" value="1700 hours - 1800 hours"><label for="Slot 8" >1700 hours</label></option>
  </select>
</td>
 </tr>
 <tr height=30px></tr>

 <tr>
  <td>
  <label for="casetype" class="formbold-form-label" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px"> Type Of Case &nbsp; </label> </td>
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
  <p><label for="ReasonOfAppointment" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px">Reason Of Appointment</label></p> </td>
  <td colspan="2"><textarea class="inputFieldLongText" id="ReasonOfAppointment" name="Clinic_Appointment_Reason_Of_Appointment" rows="4" cols="88" placeholder="&nbsp;For follow up case, please specify doctor name" required></textarea> </td>
  </tr>
  
      </table>
  <hr>

 
  <div class=headerCentered>
  <button type="submit" class="btn" name="submit" id="submit" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:20px;border-radius: 100px;">Submit</button>
</div>
<br>
<br>
</div>
</form>

</div>

</body>
</html>
