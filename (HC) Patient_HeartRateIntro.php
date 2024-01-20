<?php
  $Title='Heart Rate Intro';
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


/*Text */
.text{
  font-size: 18px;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;     
  line-height: 1.5;
}


/*Link */
.aNormal{
      text-decoration: underline;
      float:right;
      font-size: 18px;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;       
      width:5%;
    }

    .aRed{
      text-decoration: underline;
      text-decoration-color: red;
      color: red;
      float:right;
      font-size: 18px;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;     }

    
    /*pagination*/
    .page{
    color:black;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;     
    font-size: 16px;
    padding: 6px;
    border: 1px solid black;  
  }

    .page:hover{
      color:white;
    }
    a{
      text-decoration: none;
    }

  </style>
</head>

<body class='body'>
<div class="centered">
<br>
<br><br>
<form class=content action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="post" enctype="multipart/form-data">

<!--Display Info-->
<table  style="width:100%">  
<thead>
      <tr >
        <th style="width:5px;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; " colspan=2></th>  
      </tr> 
  </thead>
  <tbody>
      <?php   
       //define total number of results you want per page  
  $results_per_page = 3;  
  
  //find the total number of results stored in the database  
  $query = "SELECT * FROM healthcheck_info WHERE healthcheck_info_room= 'HeartRate'";  
  $run = mysqli_query($conn,$query);
  $number_of_result = mysqli_num_rows($run);  
  

  //determine the total number of pages available  
  $number_of_page = ceil ($number_of_result / $results_per_page);  

  //determine which page number visitor is currently on  
  if (!isset ($_GET['page']) ) {  
      $page = 1;  
  } else {  
      $page = $_GET['page'];  
  }  

  //determine the sql LIMIT starting number for the results on the displaying page  
  $page_first_result = ($page-1) * $results_per_page;  

  
  $query = "SELECT * FROM healthcheck_info WHERE healthcheck_info_room= 'HeartRate' LIMIT " . $page_first_result . ',' . $results_per_page;  
    $run = mysqli_query($conn,$query); 

      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) { 
                     echo " 
                     <tr><td colspan='3'> <input type='hidden' value=".$result['healthcheck_info_id']."></td></tr>
                     <tr> <td colspan='3'><hr><h3 class='headerCentered'><b>".$result['healthcheck_info_title']."</b></h3><hr></td></tr>
                              <tr> <td colspan='3'class='text'> ".nl2br(htmlspecialchars($result['healthcheck_info_content']))."</td> </tr> 
                     ";  
                }  
 }
              else{echo "<span style=\"color:#669999;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; \"><b>No Information is available</b></span>";}
          ?>
          </tbody>
          </table>
          <?php echo"<br><hr><br>";
     //display the link of the pages in URL  
     for($page = 1; $page<= $number_of_page; $page++) {  
      echo '<a  class="page" href="(HC) Patient_HeartRateIntro.php?page='. $page .'">' . $page . '</a> ';
    }  
?>

<br>
<br>
<!--Button-->
<div class=buttonCentered>
<input type="submit" class="btn" name="back" value="Back" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:21px;border-radius:100px;"></input>
</div>
<br><br>
</form>
</div>

</body>
</html>

<?php

if(isset($_POST["back"])){   
    echo("<script>window.location.href='(HC) Patient_HeartRateHome.php'; </script>"); 
  
}

?>

