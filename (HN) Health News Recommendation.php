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

    /*Make whole document center*/
    .centered{
        position: absolute;
        left: 50%;
        transform: translate(-50%, 0%);
      }

      .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;     }
    


    h4{
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;     }

    a:hover{
      color: black;
    }


    /*pagination*/


 .page{
        color:#424b57;
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
   
    /*Background */
.content {
  padding: 0 18px;
  background-color: #a3c2c2;
}



 </style>

<!--Nav Bar-->
<?php
  $Title='Health News';
  include_once("(1) NavBar(Patient).php");
?>
</head>


<body class='body'>
<br><br><br>
<div class="centered content" style="width:1000px">
<br>
<header class=headerCentered>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Health News</b></span>
  </header>
<br>
<?php

// Number of items per page
$itemsPerPage = 10;

// Get the current page from the URL
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the starting index for the current page
$startIndex = ($currentPage - 1) * $itemsPerPage;


// Get the latest health news from Google News RSS feed
$rss = simplexml_load_file('https://news.google.com/rss/search?q=health&hl=en-US&gl=US&ceid=US:en');
$news = array();
foreach ($rss->channel->item as $item) {
$news[] = array(
    'title' => (string) $item->title,
    'link' => (string) $item->link,
    'description' => (string) $item->description,
    'pubDate' => (string) $item->pubDate,
);
}



date_default_timezone_set("Asia/Kuala_Lumpur");
$todayDate= date("F j, Y"); 
$yesterdayDate= date("F j, Y" ,strtotime("-1 days"));
$Date2= date("F j, Y" ,strtotime("-2 days")); 
$Date3= date("F j, Y" ,strtotime("-3 days")); 
$Date4= date("F j, Y" ,strtotime("-4 days"));  
$Date5= date("F j, Y" ,strtotime("-5 days")); 
$Date6= date("F j, Y" ,strtotime("-6 days"));  

// Recommend the latest health news based on the user's interests
$user_interests = array( 'health','medicine', 'nutrition','medical','disease','patient','treatment','hospital','doctor','nurse','diagnosis','prescription','medication',
'wellness','preventive','vaccination','surgery','rehabilitation','pharmacy','insurance','telemedicine');
$recommended_news = array();
foreach ($news as $item) {
foreach ($user_interests as $interest) {
    if (stripos($item['title'], $interest) !== false || stripos($item['description'], $interest) !== false) {
        $recommended_news[] = $item;
        break;
    }
}
}

// Create a chunk of elements for the current page
$chunk = array_slice($recommended_news, $startIndex, $itemsPerPage);


// Display the recommended health news
echo '<ul>';
foreach ($chunk as $item) {
if( $todayDate ==date('F j, Y', strtotime($item['pubDate'])) || $yesterdayDate == date('F j, Y', strtotime($item['pubDate'])) || $Date2 == date('F j, Y', strtotime($item['pubDate']))
|| $Date3 == date('F j, Y', strtotime($item['pubDate']))|| $Date4 == date('F j, Y', strtotime($item['pubDate']))|| $Date5 == date('F j, Y', strtotime($item['pubDate']))
|| $Date6 == date('F j, Y', strtotime($item['pubDate'])) ){
echo '<li>' .'<h3><a href="' . $item['link'] . '">' . $item['title'] . '</a></h3>';
echo '<p>' . $item['description'] . '</p>';
echo '<p>' . date('F j, Y', strtotime($item['pubDate'])) . '</p>'. '</li>';
echo'<hr">';
}
}
echo'<br>';
echo '</ul> ';



// Generate pagination links
echo '<div>';
for ($page = 1; $page <= ceil(count($recommended_news) / $itemsPerPage); $page++) {
    echo '<a  class=page href="?page='. $page .'">' . $page . '</a> ';

}
echo '</div>';
?>
<br>
<br>

</div>

</body>
</html>
