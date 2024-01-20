
<?php
  $Title='Heath Record';
  include_once("(1) NavBar(Doctor).php");

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  $email=$_SESSION['email']; 

//Select specific data
if (isset($_GET['Health_Record_ID'])&& isset($_GET['Health_Record_Advice']) && isset($_GET['Health_Record_Diagnosis']) && isset($_GET['Clinic_Appointment_Speciality']) && isset($_GET['Clinic_Appointment_Identity_Credential'])) {  
  
      $Health_Record_ID=$_GET['Health_Record_ID']; 
      $Health_Record_Advice=$_GET['Health_Record_Advice']; 
      $Health_Record_Diagnosis=$_GET['Health_Record_Diagnosis'];


      $query = "SELECT * FROM health_record WHERE Health_Record_ID= '$Health_Record_ID'";  
      $run = mysqli_query($conn,$query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 

  
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
      

  
   /*Background of the form*/
   .content {
    padding: 0 18px;
    background-color: #a3c2c2;
    width:1000px;

    }

      /* Button Centered*/
      .buttonCentered {
    text-align: center;
    position: relative;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}

/*Button */
.btn{
  cursor: pointer;
  width:120px;
  text-align: center;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}


/*Text */
.inputFieldLongText{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;        
  font-size: 16px;
         border-radius: 15px;
         border:1px;
         height:100px;
         background-color: #e6e6e6;
      }

textarea:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;

    }

  </style>
</head>

<body class='body'>
<div class="centered">
<br>
<br><br>
<form class=content action="(HR) Doctor_EditHealthRecordConnect.php" method="post" enctype="multipart/form-data">
<br>
<header >
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:25px;"> Edit Infomation</span>
  </header>
    <hr>
<?php  if ($run){ 
    $result = mysqli_fetch_assoc($run); ""?>
   
    <!--Content-->
    <table >
    <tr>
  <td> <input type="hidden" name="hrID" value="<?php echo $Health_Record_ID; ?>"></td>
  <td colspan="2">
    <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:18px;">Diagnosis Result:</span>
    <textarea class="inputFieldLongText" id="diagnosis" name="diagnosis" rows="6" cols="128"><?php echo $result['Health_Record_Diagnosis']; ?></textarea>
  </td>
</tr>
<tr style="height:20px"></tr>
<tr>
  <td></td>
  <td colspan="2">
    <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:18px;">Advice:</span>
    <textarea class="inputFieldLongText" id="advice" name="advice" rows="6" cols="128"><?php echo $result['Health_Record_Advice']; ?></textarea>
  </td>
</tr>
<tr style="height:20px"></tr>


      </table>
  <hr>

    <!--Button-->
  <div class=buttonCentered>
  <button type="submit" class="btn btn-primary" name="edit" id="edit" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;">Edit</button>
  <button type="submit" class="btn btn-danger" name="cancel" id="cancel" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;"><span style="color:white">Cancel<span></button>
</div>

<br>
<?php }else{

echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}?>
</form>
</div>

</body>
</html>




