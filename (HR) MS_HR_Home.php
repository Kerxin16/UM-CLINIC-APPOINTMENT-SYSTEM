<?php
  $Title='Health Record';
  include_once("(1) NavBar(MS).php");

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  $email=$_SESSION['email'];

  
  $query = "SELECT DISTINCT Clinic_Appointment_Name,Clinic_Appointment_Identity_Credential FROM clinic_appointment 
  JOIN health_record on clinic_appointment_id= Clinic_Appointment;";  
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
      padding: 0;  
      margin-left: 50px;  
      margin-right: 50px;  
      box-sizing: border-box;  
  }
  
      /* Clinical Appointment Text*/
      .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }



  /*Search and reset button */
  .btn{
    background:#424b57;
    color:#c2d6d6;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    font-size:18px;
    height:40px;
    border-radius: 0px;
  }

  .btn:hover{
    background-color: #a8b1bd;
  color: #424b57;

  }

/*Data*/
.data{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
  font-size: 16px;
  height:40px;
}

/*Table*/
table,th,tr,td{  
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;      
  border: 2px solid; 
    text-align: center;
    }

    .data td,tr{
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;      
      border: 2px solid; 
    text-align: center;

    }

    /*link color*/
    .blue{
    color:#007BFF;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    font-size: 16px;
    text-decoration:none;
    border: 1px solid #007BFF;
    padding: 8px;
    border-radius: 5px;
    height: 40px;
}

.blue:hover{
    border: 1px solid black;
    color:black;
}

.tdHeight{
height: 50px;
}

  </style>


</head>

<body class='body'>
<div class=centered>
  <br>
  <br>
  <header class=headerCentered>
  <br><br>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Full Health Record List</b></span>
  </header>


  <br>
   <!--Search Patient-->
   <form action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="Get">
<table style="float:right">
<tr>   
<td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;width:130px;"><label for="searchPatient">Search Record</label></td>
<td><input type="date" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;height:40px" name="Health_Record_Created_DateTime" id="Health_Record_Created_DateTime" placeholder="Select Date"required/>  </input>
</td>
<td><button type="submit" class="btn" name="searchPatient">Search</button></td>
</tr>
</table>
</form>

<form action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="Get">
<table>
<td><button type="submit" class="btn" name="Reset">Reset Search</button></td>
<table>
</form>

<br>
<br>
<br>

<?php if(!isset($_GET['searchPatient']) || isset($_GET['Reset'])){  
    echo "
<table  style='width:100%'>  
<thead>
      <tr >
        <th style='width:10%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>No</th>  
           <th style='width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>Name</th>
           <th style='width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>IC/ Passport</th>    
           <th style='width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>Health Record</th> 
      </tr> 
  </thead>
  ";
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) { 
                     echo "  
                          <tr class='data'>  
                          <td class='tdHeight' >".$i++."</td>  
                               <td class='tdHeight'>".$result['Clinic_Appointment_Name']."</td>
                               <td class='tdHeight'>".$result['Clinic_Appointment_Identity_Credential']."</td>                        
                               <td class='tdHeight'><a class='blue' href='(HR) MS_HRView.php?Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."' 
                               Clinic_Appointment_Identity_Credential ='btn' >Health Record</span></a></td>
                          </tr>  
                     ";  
                }  
 }
              else{echo "<span style=\"color:#669999;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>No health record avaialable</b></span>";}
}
else if(isset($_GET['searchPatient'])){   

  $Health_Record_Created_DateTime= $_GET['Health_Record_Created_DateTime'];
  //Display search iteams
   $searchPatient = "  SELECT DISTINCT Clinic_Appointment_Name,Clinic_Appointment_Identity_Credential FROM clinic_appointment 
   JOIN health_record on clinic_appointment_id= Clinic_Appointment
    WHERE Health_Record_Created_DateTime like '%$Health_Record_Created_DateTime%';"; 
   $run1 = mysqli_query($conn,$searchPatient); 
   echo "
   <table  style='width:100%'>  
   <thead>
         <tr >
           <th style='width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>No</th>  
              <th style='width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>Name</th>  
              <th style='width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>IC/ Passport</th>  
              <th style='width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>Health Record</th> 
         </tr> 
     </thead>
     ";
       $i=1;  
            if ($num = mysqli_num_rows($run1)>0) {  
                 while ($patient= mysqli_fetch_assoc($run1)) {  
                      echo "  
                      <tr class='data'>  
                      <td class='tdHeight' >".$i++."</td>  
                           <td class='tdHeight'>".$patient['Clinic_Appointment_Name']."</td>
                           <td class='tdHeight'>".$patient['Clinic_Appointment_Identity_Credential']."</td>             
                           <td class='tdHeight'><a  class='blue' href='(HR) MS_HRView.php?Clinic_Appointment_Identity_Credential=".$patient['Clinic_Appointment_Identity_Credential']."' 
                           Clinic_Appointment_Identity_Credential ='btn'>Health Record</span></a></td>
                      </tr> 
                      ";?>
                            
  
  <?php }}}
   ?>
  
 
 
 


  


 
</body>
</html>


