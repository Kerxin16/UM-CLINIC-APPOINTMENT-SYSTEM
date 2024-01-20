<?php
  $Title='Health Check';
  include_once("(1) NavBar(Patient).php");

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  $email=$_SESSION['email']; 
?>

<!DOCTYPE html>
<html lang="en">
<html>
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

     /*Header Center Text*/
     .headerCentered {
     text-align: center;
     position: relative;
     font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }

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

      input[type="number"]:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;
    }


    /*Button */
 
.btn{
   background:#669999;
    color:black;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;     
    font-size:20px;
    height:40px;
    border-radius: 100px;
    width:200px;
    cursor: pointer;
  }

  .btn:hover{
    background-color: #a8b1bd;
  color: #424b57;

  }

</style>

</head>
<body class="body">
    <div class="centered">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form class="content" action="(HC) Patient_HeartRateCalculation.php" method="post">
    <br> 
    <br> 
    <div class="headerCentered"> 
    <header class=headerCentered>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Normal Heart Rate Calculator</b></span>
  </header>     <br>
    <table>
      <tr>
       <td> <label for="age" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:18px;width:350px;"><span style="float:right; padding-right:30px;">Age:</span></label></td>
       <td> <input class="inputField"  type="number" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:18px;"name="age" required><br><br></td>
</tr>
<tr>
        <td><label for="heartrate" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:18px;width:350px;"><span style="float:right; padding-right:30px;">Heart Beat Rate When Rest:</span></label></td>
        <td><input class="inputField" type="number" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:18px;" name="heartrate"><br><br></td>
</tr>
</table>
<br>
<br>
        <input class="btn" type="submit" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:18px;border-radius: 100px;" value="Check Heart Rate"></input></div>
        <br>
    </form>
</div>
</body>
</html>