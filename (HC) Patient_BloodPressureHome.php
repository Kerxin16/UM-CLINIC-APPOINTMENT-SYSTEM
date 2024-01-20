<?php
  $Title='Blood Pressure Home';
  include_once("(1) NavBar(Patient).php");

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

      .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }

      /* Button Centered*/
      .buttonCentered {
    text-align: center;
    position: relative;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}

/*Button */
.btn{
  background:#c2d6d6;
  cursor: pointer;
  width:500px;
  text-align: center;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}


  </style>
</head>

<body class='body'>
<div class="centered">
<br>
<br><br>
<form class=content action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="post" enctype="multipart/form-data">
<br>
<br>
<br><br>
<br><br>
<br><br>
<br><br>
<header class=headerCentered>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Blood Pressure</b></span>
  </header>
<br>
<br>
<br>
<br>

<!--Blood Pressure Choice-->
<div class=buttonCentered>
<button type="submit" class="btn" name="BloodPressureCalculator" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:25px;border-radius:100px;background-color: #007ab3 ;color:whitesmoke">Blood Pressure Calculator</button>
<br><br><br>
<button type="submit" class="btn" name="BloodPressureIntro" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:25px;border-radius:100px;background-color: #007ab3 ;color:whitesmoke">Blood Pressure Intro</button>
<br><br><br>
<button type="submit" class="btn" name="BloodPressureHistory" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:25px;border-radius:100px;background-color: #007ab3 ;color:whitesmoke">Blood Pressure History</button>
<br><br><br>
<br><br>
<br><br>
<br><br>
<br><br>


</div>
<br>
</form>
</div>

</body>
</html>

<?php
if(isset($_POST["BloodPressureCalculator"])){ 
  echo("<script>window.location.href='(HC) Patient_BloodPressureCalculator.php'; </script>"); 
}

if(isset($_POST["BloodPressureIntro"])){ 
    echo("<script>window.location.href='(HC) Patient_BloodPressureIntro.php'; </script>"); 
}

if(isset($_POST["BloodPressureHistory"])){ 
    echo("<script>window.location.href='(HC) Patient_BloodPressureHistory.php'; </script>"); 
}

?>