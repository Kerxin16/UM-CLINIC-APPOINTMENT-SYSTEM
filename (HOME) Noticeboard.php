<?php

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
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
  

/*Word Style */
.word{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size: 18px;

}

.contentBackground{
  background-color: #e0ebeb;
  padding:16px;
}

/*pagination */

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
<div class=centered>

  <br>
      <?php   
  //define total number of results you want per page  
  $results_per_page = 1;  
  
  //find the total number of results stored in the database  
  $query = "SELECT * FROM home_info ORDER by home_info_id desc LIMIT 9";  
  $run = mysqli_query($conn, $query);  
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

  
  $query = "SELECT * FROM home_info ORDER by home_info_id desc LIMIT " . $page_first_result . ',' . $results_per_page;  
    $run = mysqli_query($conn,$query); 


    if ($num = mysqli_num_rows($run)>0) {
   while ($result = mysqli_fetch_assoc($run)){?>
       <div class="word">
       <?php
                     echo "<div class='contentBackground'> ".$result['home_info_content']."</div>
                    <br><br>
                    "
                    ?>
   </div>
   <?php } }else{echo "<span style=\"color:#669999;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>Currently No Information Has Been Posted</b></span>";}
   
   
     //display the link of the pages in URL  
     for($page = 1; $page<= $number_of_page; $page++) {  
      echo '<a  class="page" href="(HOME) Noticeboard.php?page='. $page .'">' . $page . '</a> ';

  }  

  echo"<br><br>"
   ?>
     <br>

</div>
 </div>


</body>
</html>



