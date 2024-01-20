<?php
  $Title='Heart Rate Home';
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
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;     }

      /* Button Centered*/
      .buttonCentered {
    text-align: center;
    position: relative;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; }

/*Button */
.btn{
  background:#c2d6d6;
  cursor: pointer;
  width:500px;
  text-align: center;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; }


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
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Heart Rate</b></span>
  </header>
<br>
<br>
<br>
<br>

<!--Heart Rate Choice-->
<div class=buttonCentered>
<button type="submit" class="btn" name="HeartRateCalculator" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:25px;border-radius:100px;background-color: #007ab3 ;color:whitesmoke">Heart Rate Calculator</button>
<br><br><br>
<button type="submit" class="btn" name="HeartRateIntro" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:25px;border-radius:100px;background-color: #007ab3 ;color:whitesmoke">Heart Rate Intro</button>
<br><br><br>
<button type="submit" class="btn" name="HeartRateHistory" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:25px;border-radius:100px;background-color: #007ab3 ;color:whitesmoke">Heart Rate History</button>
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
if(isset($_POST["HeartRateCalculator"])){ 
  echo("<script>window.location.href='(HC) Patient_HeartRateCalculator.php'; </script>"); 
}

if(isset($_POST["HeartRateIntro"])){ 
    echo("<script>window.location.href='(HC) Patient_HeartRateIntro.php'; </script>"); 
}

if(isset($_POST["HeartRateHistory"])){ 
    echo("<script>window.location.href='(HC) Patient_HeartRateHistory.php'; </script>"); 
}

?>