<?php
  $Title='Health Check';
  include_once("(1) NavBar(Doctor).php");

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  $email=$_SESSION['email']; 
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
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
}

/*Button */
.btn{
  cursor: pointer;
  width:120px;
  text-align: center;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
}


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
<form class=content action="(HR) Doctor_AddHealthRecordConnect.php" method="post" enctype="multipart/form-data">
<br>
<header >
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:25px;"> Add Medical Information</span>
  </header>
    <hr>

    <!--Content-->
    <table >
    <tr>
 
    <td colspan="2"><textarea class="inputFieldLongText" id="diagnosis" name="diagnosis" rows="6" cols="128" placeholder="&nbsp;Diagnosis Result"></textarea> </td>
  </tr>
  <tr style="height:20px"></tr>
  <tr>
  
  <td colspan="2"><textarea class="inputFieldLongText" id="advice" name="advice" rows="6" cols="128" placeholder="&nbsp;Give Some Advice"></textarea> </td>
  </tr>
  <tr style="height:20px"></tr>


      </table>
  <hr>

    <!--Button-->
  <div class=buttonCentered>
  <button type="submit" class="btn btn-primary" name="add" id="add" style="  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;">Add </button>
  <button type="submit" class="btn btn-danger" name="cancel" id="cancel" style="  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;"><span style="color:white">Cancel<span></button>
</div>

<br>

</form>
</div>

</body>
</html>


