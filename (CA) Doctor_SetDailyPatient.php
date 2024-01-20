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

/*Focus */
    input[type="date"]:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;
    }


.space{
  height:60px;
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
    padding-top: 2px;
  }

  .btn:hover{
    background-color: #a8b1bd;
  color: #424b57;
  

  }
</style>



</head>
<body class="body">
<br>
<br>
  <br>
  <br>


<!--Doctor Set Daily Patient Form-->
<div class="centered">
<div class="space">
</div>
<br>

<div class="content">
  <br>

  <form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <!--Content-->
      <table width="600px">
    <tr>
  <label for="text"  style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;height:50px;">Please enter the number of patient you wish to diagnose today&nbsp; </label></tr>


  <tr>
  <input type="number" class="formbold-form-input" name="Doctor_Daily_Patient_Number" id="Doctor_Daily_Patient_Number" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:16px;height:30px;
          width:100%;background:#e6e6e6; border-radius: 15px;border:1px ;height:35px"required/>         
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

<br>
<br>



</div>

</body>
</html>


<?php

$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
session_start();
$email=$_SESSION['email'];

if (isset($_POST['submit'])) {  

$Doctor_Daily_Patient_Number = filter_input(INPUT_POST, 'Doctor_Daily_Patient_Number');

$query = "UPDATE doctor SET Doctor_Daily_Patient_Number=('$Doctor_Daily_Patient_Number')WHERE Doctor_Email='$email'";  
$run = mysqli_query($conn,$query);  
if ($run) {  
echo("<script> alert('Updated Successfully.'); window.location.href='(CA) Doctor_SetDailyPatient.php'; </script>"); 
}else{  
echo "Error: ".mysqli_error($conn);  
}  
}  


?>